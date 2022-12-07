<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use App\Models\admin\ProductImage;
use App\Models\admin\Purchase;
use App\Models\admin\PurchaseDetails;
use App\Models\admin\Stock;
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
      return view('admin.purchase.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products']      = Product::getAll(true);
        $data['suppliers']     = Supplier::getAll(true);
        $data['categories']    = Category::getAll(true);
        $data['brands']        = Brand::getAll(true);
        $data['sizes']         = Size::getAll(true);
        $data['colors']        = Color::getAll(true);
        $data['paymentTypes']  = PaymentType::getAll(true);
        $data['origins']       = Origin::getAll(true);

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
            $purchase = Purchase::storePurchase($purchaseData);

            /**
             *  collect purchase details for create.blade.php purchase table
             */
            $purchase_card = PurchaseCard::query()->where('supplier_id', $request->supplier_id)->get();

            /**
             * purchase data save form PurchaseCard model
             */
            foreach ($purchase_card as $key => $card) {

                /**
                 * add purchase details from purchase card to purchase details
                */

               $details =  PurchaseDetails::storePurchaseDetails($purchase, $card);

                /**
                 * purchase stock generate
                 * param 1: $details = contain purchase details data
                 * param 2: stock_in is a stock model column name,
                 * when method get stock_in than update or  save data in stock_in column,
                 * purchase always update or insert stock_in
                 */
                $stock = Stock::stockManage($details,'stock_in');

                /**when details record save than the record will be deleted*/
                $card->delete();
            }


            /** collect Purchase payment data from request */
            $paymentData = $request->only(['paid','note','payment_type_id']);

            /**
             *  Purchase payment store method
             *  param 1: $purchase contain recently store purchase value and use payment table purchase information
             *  param 2: $paymentData pass for save payment information form request.
             */
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

        /**query supplier old data from card*/
        if (isset($request->old_data) && isset($request->supplier)){
            $purchase = $this->repositoy::supplierOldData($request->supplier);
            $grand_total = PurchaseCard::query()->where('supplier_id',$request->supplier)->sum('total');
            return response()->json(['success'=>$purchase,'grand_total'=>$grand_total]);
        }


        /**add supplier recent data and append row in front*/
        if (isset($request->product_id) && isset($request->supplier_id)) {
            $data['request'] = $request->all();
            $data['total'] = ['total' => $request->qty * $request->purchase_price];


          /** marg request data and total for store card data at a time */
            $data = array_merge($data['request'], $data['total']);


//          store purchase data in purchase card
            $purchase_card = PurchaseCard::query()->create($data);


//          query last add card data, for append row in show table row
            $card = PurchaseCard::query()
                ->where('id',$purchase_card->id)
                ->with(['product','brand','color','size','origin','supplier'])
                ->first();


//          create.blade.php table rew with last created purchase card data for append table row
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
