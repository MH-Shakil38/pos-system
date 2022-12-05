<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Purchase;
use App\Models\admin\PurchaseDetails;
use App\Models\admin\Sale;
use App\Models\admin\SalePayment;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
   public function purchase_invoice($id){
       $purchase = Purchase::query()->where('id',$id)->with(['supplier','purchase_details','purchase_payment'])->first();
       $total = PurchaseDetails::query()->where('purchase_id',$id)->sum('total');
       return view('admin.purchase.invoice',compact('purchase','total'));
//       $pdf = Pdf::loadView('admin.purchase.invoice',compact('purchase','total'));
//       return $pdf->download('invoice.pdf');
   }
   public function sale_invoice($id){
       $sale_invoice= Sale::query()->where('id', $id)->with(['customer', 'sale_details', 'sale_payment'])->first();
       $pdf = Pdf::loadView('admin.sales.invoice',compact('sale_invoice'));
       return $pdf->download('invoice.pdf');
//       return view('admin.sales.details')->with($data);
   }
   public function total_customer_sale(){
//       $sale_invoice= Sale::query()->where('id', $id)->with(['customer', 'sale_details', 'sale_payment'])->first();
       $customer_reports = Sale::orderBy('customer_id', 'desc')
           ->with('customer', 'sale_details', 'sale_payment')
           ->get()
           ->groupBy('customer_id');
       $total_sale_amount = SalePayment::query()->sum('total');
       $total_paid_amount = SalePayment::query()->sum('paid');
//       return view('admin.report.pdf.customer.all_customer_sale',compact('customer_reports','total_sale_amount','total_paid_amount'));
       $pdf = Pdf::loadView('admin.report.pdf.customer.all_customer_sale',compact('customer_reports','total_sale_amount','total_paid_amount'));
       return $pdf->download('Customer all time Sale.pdf');
   }

   public function single_customer_order_list($customer_id){
      $sale_list = Sale::query()->where('customer_id',$customer_id) ->with('customer', 'sale_details', 'sale_payment')->first();
      return view('admin.report.pdf.customer.all_customer_sale',compact('sale_list'));
   }
}
