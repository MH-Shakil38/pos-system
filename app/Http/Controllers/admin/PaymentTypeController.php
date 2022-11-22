<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigurationRequest;
use App\Models\PaymentType;
use App\Repository\ConfigurationRepository;
use App\Traits\PosTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Service\PosService;
use PhpParser\Node\Stmt\Return_;

class PaymentTypeController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data["paymentTypes"] = PaymentType::query()->get();
        return view('admin.configuration.paymentType')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ConfigurationRequest $request)
    {
        $data['request'] = $request->validated();
        try {
            DB::beginTransaction();
            $table_name = 'PaymentType';
            $this->repository::storeConfig($table_name, $data);
            DB::commit();
            return redirect()->back()->with('success','PaymentType Successfully Inserted');
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
        $data['paymentType'] = PaymentType::findOrFail($id);
        $data["paymentTypes"] = PaymentType::query()->get();
        dd($data);
        return view('admin.configuration.paymentType')->with($data);
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
        $data['request'] = $request->validated();
        try {
            DB::beginTransaction();
            $table_name = 'PaymentType';
            $origin = $this->repository::storeConfig($table_name, $data);
            $paymentType = PaymentType::findOrFail($id)->update($data);
            DB::commit();
            return redirect()->route('admin.paymentType.index')->with('success','PaymentType Successfully Updated');
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
        $paymentType = PaymentType::findOrFail($id);
        $paymentTypeImage = $paymentType->thumbnail;
        if (file_exists($paymentTypeImage)){
            File::Delete($paymentTypeImage);
        }
        $paymentType->delete();
        return redirect()->back()->with('delete','PaymentType Deleted Successfully');
    }
}
