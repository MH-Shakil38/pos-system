<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Origin;
use App\Traits\PosTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Service\PosService;
use PhpParser\Node\Stmt\Return_;
use File;

class OriginController extends Controller
{
    use PosTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["origins"] = Origin::query()->get();
        return view('admin.configuration.origin')->with($data);
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
            'name'=>['required',Rule::unique('categories')],
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,svg',
            'description'=> 'nullable',

        ]);
        try {
            DB::beginTransaction();
            $data['value'] = ['slug' =>  Str::slug($request->name), 'created_by' => Auth::user()->id];
            $data = array_merge($data['value'],$data['request']);
            $origin = Origin::query()->create($data);
            if($request->hasFile("thumbnail")){
                $data["thumbnail"] = $this->FileProcessing($request->file("thumbnail"),PosService::ORIGIN_IMAGE,429,500);
                $origin->update(["thumbnail"=>$data["thumbnail"]]);
            }
            DB::commit();
            return redirect()->back()->with('success','Origin Successfully Inserted');
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
        $data['origin'] = Origin::findOrFail($id);
        $data["origins"] = Origin::query()->get();
        return view('admin.configuration.origin')->with($data);
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
            'name'=>['required',Rule::unique('origins')->ignore($id)],
            'description'=>'nullable',
        ]);
        try {
            DB::beginTransaction();
            $data['value'] = ['slug' =>  Str::slug($request->name), 'created_by' => Auth::user()->id];
            $data = array_merge($data['value'],$data['request']);
            if($request->hasFile("thumbnail")){
                $data["thumbnail"] = $this->FileProcessing($request->file("thumbnail"),PosService::ORIGIN_IMAGE,429,400);
            }
            $origin = Origin::findOrFail($id);
            $origin->update($data);
            DB::commit();
            return redirect()->route('admin.origin.index')->with('success','Origin Successfully Updated');
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
        $origin = Origin::findOrFail($id);
        $originImage = $origin->thumbnail;
        if (file_exists($originImage)){
            File::Delete($originImage);
        }
        $origin->delete();
        return redirect()->back()->with('delete','Origin Deleted Successfully');
    }
}
