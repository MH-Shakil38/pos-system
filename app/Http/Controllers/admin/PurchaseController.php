<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use App\Models\admin\ProductImage;
use App\Models\admin\Purchase;
use App\Models\admin\PurchaseDetails;
use App\Models\admin\Supplier;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Origin;
use App\Models\PaymentType;
use App\Models\PurchaseCard;
use App\Models\Size;
use App\Service\PosService;
use App\Traits\PosTrait;
use App\Traits\PurchaseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\admin\PurchasePayment;
use App\Repository\PurchaseRepository;

class PurchaseController extends Controller
{
    public $repositoy;
    public function __construct(PurchaseRepository $repository){
        $this->repositoy = $repository;
    }
    use PosTrait;
    use PurchaseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['purchases'] = Purchase::query()->with(['supplier','purchase_payment'])->orderBy('id','DESC')->get();

//        $data['purchases'] = Purchase::query()
//            ->join('products','products.id', '=', 'purchases.product_id')
//            ->join('purchase_details','purchase_details.purchase_id', '=', 'purchases.id')
//            ->join('colors as cl', 'purchase_details.color_id', '=', 'cl.id')
//            ->join('sizes as s', 'purchase_details.size_id', '=', 's.id')
//            ->select('cl.name as cName', 's.name as sName', 'products.*', 'purchase_details.*')
//            ->get();
      return view('admin.purchase.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products']   = Product::query()->orderByDesc('id')->pluck('name','id');
        $data['suppliers']  = Supplier::query()->orderByDesc('id')->pluck('name','id');
        $data['categories']  = Category::query()->orderByDesc('id')->pluck('name','id');
        $data['brands']  = Brand::query()->orderByDesc('id')->pluck('name','id');
        $data['sizes']  = Size::query()->orderByDesc('id')->pluck('name','id');
        $data['colors']  = Color::query()->orderByDesc('id')->pluck('name','id');
        $data['paymentTypes']  = PaymentType::query()->orderByDesc('id')->pluck('name','id');
        $data['origins']  = Origin::query()->orderByDesc('id')->pluck('name','id');
        return view('admin.purchase.manage-purchase')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

//          store purchase
            $purchaseData = $request->only(['supplier_id','status','date']);
            $purchase = Purchase::storePurchase($purchaseData ,Auth::user()->id);

//          purchase details store from purchase card, and clear card data
            $purchase_card = PurchaseCard::query()->where('supplier_id', $request->supplier_id)->get();
            foreach ($purchase_card as $key => $card) {

//              add purchase details from purchase card to purchase details
                PurchaseDetails::storePurchaseDetails($purchase, $card);

//              delete purchase card record after creating purchase details
                $card->delete();
            }

//          Store purchase payment
            $paymentData = $request->only(['paid','note','payment_type_id']);

            PurchasePayment::storePurchasePayment($purchase, $paymentData);

            DB::commit();
            return redirect()->route('admin.purchase.details', $purchase->id);
        }
        catch (\Throwable $e){
                DB::rollBack();

                dd(
                    $e->getMessage(),
                    $e->getFile(),
                    $e->getCode(),
                    $e->getLine(),
                    $e
                );
            }

//dd($request->all());
//        $data['purchase'] = $request->validate([
//            'qty'                => 'required',
//            'product_id'         => 'required',
//            'supplier_id'        => 'required',
//            'thumbnail'          => 'image|mimes:jpg,jpeg,png,svg',
//            'details'              =>'nullable',
//        ]);
//        $data['purchase_details'] = $request->validate([
//            'qty'                 => 'nullable',
//            'category_id'         => 'nullable',
//            'brand_id'            => 'nullable',
//            'color_id'            => 'nullable',
//            'origin_id'           => 'nullable',
//            'size_id'             => 'nullable',
//        ]);
//        $data['purchase_payment'] = $request->validate([
//            'payment_type_id'     => 'required',
//            'total_price'         => 'nullable',
//            'selling_price'       => 'required',
//        ]);
//
//
//        try {
//            DB::beginTransaction();
//
//            $purchase = self::storePurhcase($data['purchase']);
//            $purchase_details = self::storePurhcaseDetails($data['purchase_details'],$purchase->id);
//            $purchase_payment = self::storePurhcasePayments($data['purchase_payment'],$purchase_details->id);
//            if($request->hasFile("thumbnail")){
//                $data["thumbnail"] = $this->FileProcessing($request->file("thumbnail"),PosService::PRODUCT_THUMBNAIL,429,500);
//                $purchase->update(["thumbnail"=>$data["thumbnail"]]);
//            }
//
//            if($pictures =$request->hasFile("pictures")){
//                $image = new ProductImage();
//                foreach ($request['pictures'] as $file){
//                    $data["picture"] = $this->FileProcessing($file,PosService::PRODUCT_IMAGE,429,500);
//                    $image->create(['purchase_details_id'=>$purchase_details->id,"picture"=>$data["picture"]]);
////                    $purchase_details->update(["picture"=>$data["picture"]]);
//                }
//            }
//
//            DB::commit();
//            return redirect()->back()->with('success','Category Successfully Inserted');
//        }
//        catch (\Throwable $e){
//            DB::rollBack();
//
//            dd(
//                $e->getMessage(),
//                $e->getFile(),
//                $e->getCode(),
//                $e->getLine(),
//                $e
//            );
//        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purches  $purches
     * @return \Illuminate\Http\Response
     */

    public function purchase_details($id){
        $data['purchase'] = Purchase::query()->where('id',$id)->with(['supplier','purchase_details','purchase_payment'])->first();
        $data['total'] = PurchaseDetails::query()->where('purchase_id',$id)->sum('total');
        return view('admin.purchase.details')->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purches  $purches
     * @return \Illuminate\Http\Response
     */
    public function edit(Purches $purches)
    {
        return 'edit';

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purches  $purches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purches $purches)
    {
        return 'update';

    }
    public function purchase_card(Request $request){

//      query supplier old data from card
        if (isset($request->old_data) && isset($request->supplier)){
            $purchase = $this->repositoy::supplierOldData($request->supplier);
            $grand_total = PurchaseCard::query()->where('supplier_id',$request->supplier)->sum('total');
            return response()->json(['success'=>$purchase,'grand_total'=>$grand_total]);
        }
//      add supplier recent data and append row in front
        if (isset($request->product_id) && isset($request->supplier_id)) {
            $data['request'] = $request->all();
            $data['total'] = ['total' => $request->qty * $request->purchase_price];

//          marg request data and total for store card data at a time
            $data = array_merge($data['request'], $data['total']);

//          store purchase data in purchase card
            $purchase_card = PurchaseCard::query()->create($data);

//          query last add card data, for append row in show table row
            $card = PurchaseCard::query()->where('id',$purchase_card->id)->with(['product','brand','category','color','size','origin','supplier'])->first();

//          create table rew with last created purchase card data for append table row
            $html_data = $this->repositoy::appendSupplierRow($card);

//          query total amount this supplier
            $grand_total = PurchaseCard::query()->where('supplier_id',$request->supplier_id)->sum('total');

            return response()->json(['card_row' => $html_data,'grand_total'=>$grand_total]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purches  $purches
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purches $purches)
    {
        return 'destory';

    }
}
