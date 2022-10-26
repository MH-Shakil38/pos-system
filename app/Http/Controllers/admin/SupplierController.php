<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Supplier;
use App\Service\PosService;
use App\Traits\PosTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    use PosTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['suppliers'] = Supplier::query()->orderByDesc('id')->cursor();
        return view('admin.supplier.manage-supplier')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'      =>  ['required',Rule::unique('categories')->where('parent_id',$request->parent_id)],
            'logo' =>  'image|mimes:jpg,jpeg,png,svg',
            'email'     =>  ['email','required'],
            'contact'   =>  'required',
            'details'     =>  'nullable',
            'address'     =>  'required',
        ]);
        try {
            DB::beginTransaction();
            $data['value'] =
                [
                    'created_by'    =>  Auth::user()->id,
                    'supplier_code'  =>  'supplier-'.rand(0, 99999),
                ];
            $data = array_merge($data['value'],$data['request']);
            $supplier = Supplier::query()->create($data);
            if($request->hasFile("logo")){
                $data["logo"] = $this->FileProcessing($request->file("logo"),PosService::SUPPLIER_LOGO,200,100);
                $supplier->update(["logo"=>$data["logo"]]);
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
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
