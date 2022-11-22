<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigurationRequest;
use App\Models\Category;
use App\Repository\ConfigurationRepository;
use App\Traits\PosTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Service\PosService;
use PhpParser\Node\Stmt\Return_;

class CategoryController extends Controller
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
        $data["categories"] = Category::query()->with('user')->get();
        $data["categories_orderBy"] = Category::query()->orderBy('name')->get();
        return view('admin.configuration.category')->with($data);
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
    public function store(ConfigurationRequest $request)
    {
        $data['request'] = $request->validated();
        try {
            DB::beginTransaction();
            $table_name = 'Category';
            $category = $this->repository::storeConfig($table_name, $data);

            if($request->hasFile("thumbnail")){
                $data["thumbnail"] = $this->FileProcessing($request->file("thumbnail"),PosService::CATEGORY_IMAGE,429,500,"storage/project_files /category/");
                $category->update(["thumbnail"=>$data["thumbnail"]]);
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
        $data['category'] = Category::findOrFail($id);
        $data["categories"] = Category::query()->get();
        $data["categories_orderBy"] = Category::query()->orderBy('name')->get();
        return view('admin.configuration.category')->with($data);
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
            'name'=>['required',Rule::unique('categories')->where('parent_id',$request->parent_id)->ignore($id)],
            'parent_id'=>'nullable',
            'description'=>'nullable',
        ]);
        try {
            DB::beginTransaction();
            $data['value'] = ['slug' =>  Str::slug($request->name), 'created_by' => Auth::user()->id];
            $data = array_merge($data['value'],$data['request']);
            if($request->hasFile("thumbnail")){
                $data["thumbnail"] = $this->FileProcessing($request->file("thumbnail"),PosService::CATEGORY_IMAGE,429,500,"storage/project_files /category/");
            }
            $category = Category::findOrFail($id)->update($data);
            DB::commit();
            return redirect()->route('admin.category.index')->with('success','Category Successfully Inserted');
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
        $category = Category::findOrFail($id);
        $deleteImage = $category->image;
        if (file_exists($deleteImage)){
            File::Delete($deleteImage);
        }
        $category->delete();
        return redirect()->back()->with('delete','Category Deleted Successfully');
    }
}
