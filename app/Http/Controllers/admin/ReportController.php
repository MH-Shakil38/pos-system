<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Customer;
use App\Models\admin\Purchase;
use App\Models\admin\Sale;
use App\Models\admin\SaleDetalis;
use App\Models\admin\SalePayment;
use App\Models\admin\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
/*
* customer Report method start
*/

    //    total sale report method
    public function sale_report(Request $request){

        if (isset($request->from) && !empty($request->from)){

            $data['sales'] = Sale::getSearcheData($request->only(['from',"to","customer_id"]));
            $data['customers'] = Customer::getAll(false,true);
        }else{
            $data['sales'] = Sale::getAll('Desc');
            $data['customers'] = Customer::getAll(false,true);
        }

        return view('admin.report.sale_report')->with($data);
    }

    /**
     * Bla bla bla bla
     *
     * @incomingParams $from
     *
     * */
    public function sale_report_search(Request $request){

        $data['sales'] = Sale::getSearcheData($request->all());
        $data['customers'] = Customer::getAll(false,true);

        return view('admin.report.sale_report')->with($data);
    }
    //customers order list
   public function customer_report()
   {
       $data['customers'] = Customer::getAll('true');
       return view('admin.report.customer')->with($data);
   }


    /* customer order list*/
    public function customer_report_order_list($customer_id)
    {
        $data['customer'] = Customer::getById($customer_id, true);

        return view('admin.report.customer.order_list')->with($data);
    }


    /* customer order details start*/
    public function customer_order_details($sale_id)
    {
        $data['order_details'] = Sale::getById($sale_id,true);
        return view('admin.report.customer.order_details')->with($data);
    }
/* customer order details end*/
/*
 * customer Report method start
*/



/*
 * supplier report method start
 * */
//purchase all report
public function report_purchases(){
    return 'report purchases';
}

//  suppliers purchase list report
    public function suppliers_purchase_list(){
        $data['suppliers'] = Supplier::getAll(false,false,true);
        return view('admin.report.supplier.suppliers_purchases_list')->with($data);
    }
//    single supplier purchases list
    public function supplier_purchases_list($supplier_id){
        $data['supplier'] = Supplier::findById($supplier_id,true);
        return view('admin.report.supplier.supplier_purchases_list')->with($data);
    }
// supplier purchase details
public function supplier_purchases_details($purchase_id){
        $data['purchases'] = Purchase::query()
            ->with(['supplier','purchase_details','purchase_payment'])
            ->where('id','=',$purchase_id)
            ->first();
        return view('admin.report.supplier.supplier_purchases_details')->with($data);
}
/*
 * supplier Report method end
*/

    //supplier All time total purchase report
    public function supplier_report(){
        return view('admin.report.supplier');
    }
/*
 * supplier report end
 */

    //    show customer all due list
    public function customer_due_list($customer_id){
        $data['customer_sales'] = Sale::query()->where('customer_id', $customer_id)->with(['customer', 'sale_details', 'sale_payment'])->get();
        dd($customer_id);
    }
    public function customer_due_payment($customer_id,$sale_id="null"){
       if (isset($customer_id)){
           $data['customer_dues'] = Sale::query()
                                            ->where('customer_id', $customer_id)
                                            ->with(['customer', 'sale_details', 'sale_payment'])
                                            ->get();
       }
       if (isset($sale_id)){
           $data['payment'] = Sale::query()->where('id',$sale_id)->with(['customer', 'sale_details', 'sale_payment'])->first();
       }
        dd($data);
        return view('admin.payment.customer')->with($data);
    }
    public function customer_due_payment_update($id){
       dd($id);
    }

    /*
     * Supplier Report Start
     */


//    single supplier purchase list details
    public function supplier_purchase_details(){
        return 'purchase details';
    }
}
