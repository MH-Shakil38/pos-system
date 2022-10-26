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
    public function __construct(){
        $this->repositoy = new PurchaseRepository();
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
      $data['purchases'] = Purchase::query()->with(['product','supplier'])->get();
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
//        $data['statuses']  = Status::query()->orderByDesc('id')->pluck('name','id');
        $data['origins']  = Origin::query()->orderByDesc('id')->pluck('name','id');
        return view('admin.purchase.manage-purchase')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data['purchase'] = $request->validate([
            'product_id'         => 'required',
            'supplier_id'        => 'required',
            'thumbnail'          => 'image|mimes:jpg,jpeg,png,svg',
            'details'              =>'nullable',
        ]);
        $data['purchase_details'] = $request->validate([
            'qty'                 => 'nullable',
            'category_id'         => 'nullable',
            'brand_id'            => 'nullable',
            'color_id'            => 'nullable',
            'origin_id'           => 'nullable',
            'size_id'             => 'nullable',
        ]);
        $data['purchase_payment'] = $request->validate([
            'payment_type_id'     => 'required',
            'total_price'         => 'nullable',
            'selling_price'       => 'required',
        ]);


        try {
            DB::beginTransaction();
            $purchase = self::storePurhcase($data['purchase']);
            $purchase_details = self::storePurhcaseDetails($data['purchase_details'],$purchase->id);
            $purchase_payment = self::storePurhcasePayments($data['purchase_payment'],$purchase_details->id);
            if($request->hasFile("thumbnail")){
                $data["thumbnail"] = $this->FileProcessing($request->file("thumbnail"),PosService::PRODUCT_THUMBNAIL,429,500);
                $purchase->update(["thumbnail"=>$data["thumbnail"]]);
            }

            if($pictures =$request->hasFile("pictures")){
                $image = new ProductImage();
                foreach ($request['pictures'] as $file){
                    $data["picture"] = $this->FileProcessing($file,PosService::PRODUCT_IMAGE,429,500);
                    $image->create(['purchase_details_id'=>$purchase_details->id,"picture"=>$data["picture"]]);
//                    $purchase_details->update(["picture"=>$data["picture"]]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success','Category Successfully Inserted');
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


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purches  $purches
     * @return \Illuminate\Http\Response
     */
    public function show(Purches $purches)
    {
        return 'show';

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
