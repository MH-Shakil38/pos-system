<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\admin\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'employee list';
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
                'image',
                'present_address',
                'permanent_address',
                'joining_date',
                'joining_salary'
            ]);
            $employee = Employee::store($employeeData, $user);
            dd($employee);
            DB::commit();
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
