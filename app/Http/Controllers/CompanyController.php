<?php

namespace App\Http\Controllers;

use App\Events\NewCompanyEvent;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyRequest $request)
    {
        if (isset($request->logo)) {

            $imageOriginalName = $request->logo->getClientOriginalName();
            $request->logo->storeAs('logos', $imageOriginalName, 'public');
        }


        Company::create([
            'name'=>$request->name,
            'website'=>$request->website,
            'email'=>$request->email,
            'logo'=>isset($request->logo) ? $imageOriginalName : null,
        ]);

        event(new NewCompanyEvent());

        return redirect(route('companies.index'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));   
    }


    public function update(CompanyRequest $request, Company $company)
    {
        if (isset($request->logo)) {

            $imageOriginalName = $request->logo->getClientOriginalName();
            $request->logo->storeAs('logos', $imageOriginalName, 'public');
        }

        $company->update([
            'name'=>$request->name,
            'website'=>$request->website,
            'email'=>$request->email,
            'logo'=>isset($request->logo) ? $imageOriginalName : null,
        ]);

        return redirect(route('companies.index'));

    }

    public function destroy(Company $company)
    {
        $company->employees()->delete();

        $company->delete();

        return redirect(route('companies.index'));

    }
}
