<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Purchase;
use App\Models\admin\PurchaseDetails;
use App\Models\admin\Sale;
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
}
