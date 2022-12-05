<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Customer;
use App\Models\Category;
use App\Service\PosService;
use App\Traits\PosTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    use PosTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customers'] = Customer::getAll();
       return view('admin.people.customer-list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.people.add-customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['request'] = $request->validate([
            'name'          =>'required',
            'email'         =>'required',
            'phone'         =>'nullable',
            'country_id'    =>'nullable',
            'city_id'       =>'nullable',
            'address'       =>'nullable',
            'description'   =>'nullable',
            'picture'      =>'nullable',
        ]);
        try {
            DB::beginTransaction();
            $data['value'] = ['customer_code' => 'c-'.rand(0,9999), 'created_by' => Auth::user()->id];
            $data = array_merge($data['value'],$data['request']);
            $customer = Customer::query()->create($data);
            if($request->hasFile("picture")){
                $data["picture"] = $this->FileProcessing($request->file("picture"),PosService::CUSTOMER_IMAGE,429,500);
                $customer->update(["pictures"=>$data["picture"]]);
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
     * @param  \App\Models\admin\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
