<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigurationRequest;
use App\Models\Brand;
use App\Repository\ConfigurationRepository;
use App\Traits\PosTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Service\PosService;
use PhpParser\Node\Stmt\Return_;

class BrandController extends Controller
{
    use PosTrait;
    protected $repository;
    public function __construct(ConfigurationRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["brands"] = Brand::query()->get();
        return view('admin.configuration.brand')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConfigurationRequest $request)
    {
        $data['request'] = $request->validated();
        try {
            DB::beginTransaction();
            $table_name = 'Brand';
            $brand = $this->repository::storeConfig($table_name, $data);
            if($request->hasFile("thumbnail")){
                $data["thumbnail"] = $this->FileProcessing($request->file("thumbnail"),PosService::BRAND_LOGO,429,500);
                $brand->update(["thumbnail"=>$data["thumbnail"]]);
            }
            DB::commit();
            return redirect()->back()->with('success','Brand Successfully Inserted');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'hello data';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['brand'] = Brand::findOrFail($id);
        $data["brands"] = Brand::query()->get();
        return view('admin.configuration.brand')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['request'] = $request->validate([
            'name'=>['required',Rule::unique('brands')->ignore($id)],
            'description'=>'nullable'
        ]);
        try {
            DB::beginTransaction();
            $data['value'] = ['slug' =>  Str::slug($request->name), 'created_by' => Auth::user()->id];
            $data = array_merge($data['value'],$data['request']);
            if($request->hasFile("thumbnail")){
                $data["thumbnail"] = $this->FileProcessing($request->file("thumbnail"),PosService::BRAND_LOGO,429,400);
            }
            $brand = Brand::findOrFail($id)->update($data);
            DB::commit();
            return redirect()->route('admin.brand.index')->with('success','Brand Successfully Updated');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $deleteImage = $brand->image;
        if (file_exists($deleteImage)){
            File::Delete($deleteImage);
        }
        $brand->delete();
        return redirect()->back()->with('delete','Brand Deleted Successfully');
    }
}
