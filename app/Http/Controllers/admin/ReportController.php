<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Sale;
use App\Models\admin\SaleDetalis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
   public function customer_report(){
//       $report = Sale::query()->orderBy('customer_id','DESC')->get();
       $data['customer_reports'] = Sale::orderBy('customer_id', 'desc')
           ->with('customer', 'sale_details', 'sale_payment')
           ->get()
           ->groupBy('customer_id');
//       dd($data['customer_reports'][3][0]->customer->name);
       return view('admin.report.customer')->with($data);
//       dd($reports[3]->sum('sale_payment.total'),$reports[3]->sum('sale_payment.paid'));
//       return view('admin.report.customer');
   }
    public function supplier_report(){
        return view('admin.report.supplier');
    }
    public function sale_report(){
        return view('admin.report.sale');
    }
}
