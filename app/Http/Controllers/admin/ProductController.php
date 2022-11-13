<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use App\Models\admin\ProductImage;
use App\Models\Category;
use App\Traits\PosTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Service\PosService;

class ProductController extends Controller
{
    use PosTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['categories'] = Category::query()->get();
        $data['products'] = Product::query()->get();
       return view('admin.product.product-manage')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products'] = Product::query()->get();
        $data ['categories'] = Category::query()->get();
        return view('admin.product.create')->with($data);
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
            'thumbnail' =>  'image|mimes:jpg,jpeg,png,svg',
            'price'     =>  'required',
            'details'   =>  'nullable',
            'stock'     =>  'nullable',
        ]);
        try {
            DB::beginTransaction();
            $data['value'] =
                [
                    'slug'          =>  Str::slug($request->name),
                    'created_by'    =>  Auth::user()->id,
                    'sku_no'        =>  time().'-'.rand(0, 99999).'-'.$request->name,
                    'product_code'  =>  'P-'.rand(0, 99999),
                ];
            $data = array_merge($data['value'],$data['request']);
            $product = Product::query()->create($data);
            if($request->hasFile("thumbnail")){
                $data["thumbnail"] = $this->FileProcessing($request->file("thumbnail"),PosService::PRODUCT_THUMBNAIL,429,500,"storage/project_files /category/");
                $product->update(["thumbnail"=>$data["thumbnail"]]);
            }
            if($pictures =$request->hasFile("pictures")) {
                $image = new ProductImage();
                foreach ($request['pictures'] as $file) {
                    $data["picture"] = $this->FileProcessing($file, PosService::PRODUCT_IMAGE, 429, 500);
                    $image->create(['product_id' => $product->id, "picture" => $data["picture"]]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'hello';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::findOrFail($id);
        $data['products'] = Product::all();
        return view('admin.product.create')->with($data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function manageProduct($id){
        return'success';
    }
}
