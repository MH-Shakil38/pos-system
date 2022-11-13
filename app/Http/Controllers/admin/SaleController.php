<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Customer;
use App\Models\admin\Product;
use App\Models\admin\Purchase;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Response;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sales'] = Sale::query()->with(['customer','sale_details','sale_payment'])
            ->join('sale_payments', 'sale_payments.sale_id', '=', 'sales.id')
            ->join('users', 'sales.created_by', '=', 'users.id')
            ->select('sales.*','sale_payments.*','users.name as admin')
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
        $data['purchases'] = Purchase::query()->with(['purchase_detail', 'product'])->get();
        $data['paymentTypes'] = PaymentType::query()->pluck('name','id');
//        dd($data['paymentTypes']);
//        dd($data);
//        return view('admin.sales.add-new-sales')->with($data);
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
//        dd($request->all());
        if (isset($request->customer)){
            $user = Auth::user()->id;
            $sale = Sale::create(['customer_id'=>$request->customer,'note'=>$request->note,'status'=>$request->status,'created_by'=>$user]);
//            dd($sale);
            $sale_card = SaleCard::query()->where('customer_id',$request->customer)->get();
            $totalPrice = SaleCard::query()->where('customer_id',$request->customer)->sum('total_price');

//              dd($sale_card);
              foreach ($sale_card as $key => $card){
                $sd = New SaleDetalis();
                $sd->sale_id =$sale->id;
                $sd->product_id = $card->product_id;
                $sd->qty = $card->qty;
                $sd->color_id = $card->color_id;
                $sd->size_id = $card->size_id;
                $sd->category_id = $card->category_id;
                $sd->origin_id = $card->origin_id;
                $sd->brand_id = $card->brand_id;
                $sd->save();
                $card->delete();
              }
              SalePayment::create(['sale_id'=>$sale->id,'payment_type_id' => $request->paymentType,'total_paid'=> $totalPrice,
                                                ]);
            return redirect()->route('admin.sale.invoice',$sale->id);

       }
        return view('admin.sales.invoice');
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
        if ($req->select_product) {
            $product = Product::query()->where('id', $req->p_query)->first();
            $price = $product->price;
            return response()->json(['price' => $price]);
        }
        if ($req->customers){
            $totalPrice = SaleCard::query()->where('customer_id',$req->customers)->sum('total_price');
            $customer = Customer::query()->where('id',$req->customers)->first();
            $html_data = '';
            $old_customers = SaleCard::query()->where('customer_id',$req->customers)->with('customer','product')->get();
            foreach ($old_customers as $val){
            $html_data .= '<fomr>
                            <div class="row">
                                <div class="col-lg-4 col-sm-2 col-md-2 col-12 ps-0">
                                    <div class="form-group">
                                        <input type="text" disabled name="product_id" value="'.$val->product->name.'">
                                        <input type="hidden" name="product_id" value="'.$val->product->name.'">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                                    <div class="form-group">
                                        <input id="disable_price" class="form-control" disabled type="number" value="'.$val->product->price.'">
                                        <input id="price" name="price" class="form-control" type="hidden" value="'.$val->product->price.'">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                                    <div class="form-group">
                                        <input id="qty" name="qty" type="text" value="'.$val->qty.'">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                                    <div class="form-group">
                                        <input value="'.$val->product->price*$val->qty.'" id="disablesubtotal" disabled="true" class="form-control">
                                        <input type="hidden" value="'.$val->product->price*$val->qty.'" id="subtotal" disabled="true">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                                    <div class="form-group">
                                        <div class="add-icon" id="add-product">
                                            <a class="btn p-0" id="add-product">
                                                <span>
                                                    <i class="fa fa-pen-fancy"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </fomr>';
            }
            $customer_html = '';
            $customer_html.='
                        <h3>'.$customer->name.'</h3>
                        <input class="form-control" type="hidden" value="'.$customer->id.'" name="customer">
                        <span>'.$customer->phone.'</span>
                        <br>
                        <span>'.$customer->email.'</span><br>
                        <span>'.$customer->address.'</span><br>
                        ';

            return response()->json(['success' =>$html_data ,'customer'=>$customer_html,'total'=>$totalPrice]);
        }
        if ($req->customer_id) {
            $s = new SaleCard();
            if (SaleCard::query()->where('product_id',$req->product_id)->where('customer_id',$req->customer_id)->first()){
                return response()->json(['alertMessage' => "product already added"]);
            }
            $product = Product::query()->where('id',$req->product_id)->first();
            $s->total_price = $product->price*$req->qty;
            $s->customer_id = $req->customer_id;
            $s->product_id = $req->product_id;
            $s->qty = $req->qty;
            $s->save();
            $s = SaleCard::query()->where('id',$s->id)->with(['customer','product'])->first();

            $html_data = '';
            $html_data .= '<fomr>
                            <div class="row">
                                <div class="col-lg-4 col-sm-2 col-md-2 col-12 ps-0">
                                    <div class="form-group">
                                        <input type="text" disabled name="product_id" value="'.$s->product->name.'">
                                        <input type="hidden" name="product_id" value="">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                                    <div class="form-group">
                                        <input id="disable_price" class="form-control" disabled type="number" value="'.$s->product->price.'">
                                        <input id="price" name="price" class="form-control" type="hidden" value="'.$s->product->price.'">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                                    <div class="form-group">
                                        <input id="qty" name="qty" type="text" value="'.$s->qty.'">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                                    <div class="form-group">
                                        <input value="'.$s->product->price*$s->qty.'" id="disablesubtotal" disabled="true" class="form-control">
                                        <input type="hidden" value="" id="subtotal" disabled="true">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-12 ps-0">
                                    <div class="form-group">
                                        <div class="add-icon" id="add-product">
                                            <a class="btn p-0" id="add-product">
                                                <span>
                                                    <i class="fa fa-pen-fancy"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </fomr>';
            $totalPrice = SaleCard::query()->where('customer_id',$s->customer_id)->sum('total_price');
            return response()->json(['success' => $html_data,'total'=>$totalPrice]);
        }
    }
    public function invoice($id){
        $data['sale_invoice'] = Sale::query()->where('id',$id)->with(['customer','sale_details','sale_payment'])->first();
        return view('admin.sales.invoice')->with($data);
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

