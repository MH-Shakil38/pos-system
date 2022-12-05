<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Customer;
use App\Models\admin\Product;
use App\Models\admin\Purchase;
use App\Models\admin\PurchaseDetails;
use App\Models\admin\Sale;
use App\Models\admin\SaleDetalis;
use App\Models\admin\SalePayment;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Origin;
use App\Models\PaymentType;
use App\Models\SaleCard;
use App\Models\Size;
use App\Repository\SaleCardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Response;

class SaleController extends Controller
{
    protected $sale_repository;

    public function __construct(SaleCardRepository $saleRepository)
    {
        $this->sale_repository = $saleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sales'] = Sale::query()->with(['customer', 'sale_details', 'sale_payment'])
//            ->join('sale_payments', 'sale_payments.sale_id', '=', 'sales.id')
//            ->join('users', 'sales.created_by', '=', 'users.id')
//            ->select('sales.*', 'sale_payments.*', 'users.name as admin')
            ->get();
        return view('admin.sales.sale_list')->with($data);
//        $data['customer'] = Customer::query()->get();
//        return view('admin.sales.add-new-sales')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['customers'] = Customer::query()->pluck('name', 'id');
        $data['colors'] = Color::query()->pluck('name', 'id');
        $data['sizes'] = Size::query()->pluck('name', 'id');
        $data['origins'] = Origin::query()->pluck('name', 'id');
        $data['categories'] = Category::query()->pluck('name', 'id');
        $data['brands'] = Brand::query()->pluck('name', 'id');
        $data['purchases'] = PurchaseDetails::query()->with('product')->get();
        $data['paymentTypes'] = PaymentType::query()->pluck('name', 'id');
        return view('admin.sales.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            if (isset($request->customer_id)) {
                $user = Auth::user()->id;
                $sale = Sale::create([
                    'customer_id' => $request->customer_id,
                    'note' => $request->note,
                    'status' => $request->status,
                    'created_by' => $user,
                    'order_date' => $request->oreder_date,
                    'deliver_date' => $request->deliver_date,
                    'ref' => $request->ref]);
                $sale_card = SaleCard::query()->where('customer_id', $request->customer_id)->get();
                $totalPrice = SaleCard::query()->where('customer_id', $request->customer_id)->sum('total_price');
                $totalDue = $totalPrice - $request->paymentType;
                foreach ($sale_card as $key => $card) {
                    $sd = new SaleDetalis();
                    $sd->sale_id = $sale->id;
                    $sd->product_id = $card->product_id;
                    $sd->qty = $card->qty;
                    $sd->color_id = $card->color_id;
                    $sd->size_id = $card->size_id;
                    $sd->category_id = $card->category_id;
                    $sd->origin_id = $card->origin_id;
                    $sd->brand_id = $card->brand_id;
                    $sd->selling_price = $card->selling_price;
                    $sd->save();
                    $card->delete();
                }
                SalePayment::create([
                    'sale_id' => $sale->id,
                    'payment_type_id' => $request->paymentType,
                    'total' => $totalPrice,
                    'paid' => $request->total_paid,
                    'due' => $totalPrice - $request->paymentType,
                ]);

                DB::commit();
                return redirect()->route('admin.sale.details',$sale->id);

            }
        } catch (\Throwable $e) {
            DB::rollBack();

            dd(
                $e->getMessage(),
                $e->getFile(),
                $e->getCode(),
                $e->getLine(),
                $e
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function addSale(Request $req)
    {
        /*product query for select product details when select product option selected a product*/
        if ($req->select_product) {
            $price = $this->sale_repository->PruductQuery($req->p_query);
            return response()->json(['price' => $price]);
        }

        /*
         * Customer old data or previews data collecte from SaleCard and previews total
         * this section work when customer name select,
         */
        if ($req->customers) {

            $totalPrice = SaleCard::query()->where('customer_id', $req->customers)->sum('total_price');
            $previews = $this->sale_repository->customer_previews_sale_card($req->customers);
            $customer_details = $this->sale_repository->customer_details($req->customers);
            return response()->json(['success' => $previews, 'customer' => $customer_details, 'total' => $totalPrice]);
        }

        /*
         * this seciton created for save temposery customer product data in SaleCard
         * when find product_id and customer_id then this section work successfully
         */
        if ($req->customer_id) {

            /*
             * when found duplicate product in sale card
             * then alert a message product already added in sale card
             */
            if (SaleCard::query()->where('product_id', $req->product_id)->where('customer_id', $req->customer_id)->first()) {
                return response()->json(['alertMessage' => "product already added"]);
            }

            /*if product not found in database
             *Model SaleCard then product add to SaleCard
            */
            $save_data = $this->sale_repository->save_product_saleCard($req->all());
            /*
             * load recent store data in blade file,
             */
            $recent = SaleCard::query()->where('id', $save_data->id)->with(['customer', 'product'])->first();
            $html_data = $this->sale_repository->load_recent_add_product($recent);
            $totalPrice = SaleCard::query()->where('customer_id', $recent->customer_id)->sum('total_price');

            return response()->json(['success' => $html_data, 'total' => $totalPrice]);
        }
    }
    public function sale_details($id){
        $data['sale'] = Sale::query()->where('id', $id)->with(['customer', 'sale_details', 'sale_payment'])->first();
        return view('admin.sales.details')->with($data);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}

