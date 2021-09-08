<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Company $company)
    {
        $employees = $company->employees;

        return view('employees.index', compact('employees','company'));

    }

    public function create(Company $company)
    {
        return view('employees.create',compact('company'));
    }

    public function store(Company $company, EmployeeRequest $request)
    {
        $company = Company::findOrFail($company->id);

        $company->employees()->create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);

        return redirect(route('employees.index',$company));

    }

    public function edit(Company $company, Employee $employee)
    {
        return view('employees.edit',compact('company','employee'));   
    }

    public function update(EmployeeRequest $request, Company $company, Employee $employee)
    {
        $employee->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);

        return redirect(route('employees.index',$company));
    }


    public function destroy(Company $company, Employee $employee)
    {
        $employee->delete();

        return redirect(route('employees.index',$company));

    }
}
