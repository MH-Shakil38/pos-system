<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\admin\Employee;
use App\Models\admin\ProductImage;
use App\Models\User;
use App\Service\PosService;
use App\Traits\PosTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    use PosTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = Employee::getAll(true);
        return view('admin.employee.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        try {
            DB::beginTransaction();
            $userData = $request->only(['name','email','password']);
            $user = User::store($userData);
            $employeeData = $request->only([
                'phone',
                'nid',
                'present_address',
                'permanent_address',
                'joining_date',
                'joining_salary'
            ]);
            $employee = Employee::store($employeeData, $user);

            if($request->hasFile("image")){
                $data["image"] = $this->FileProcessing($request->file("image"),PosService::EMPLOYEE_IMAGE,429,500);
                $employee->update(["image"=>$data["image"]]);
            }
            DB::commit();

            return redirect()->back()->with('success','Data successfully inserted');
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
     * @param  \App\Models\admin\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
