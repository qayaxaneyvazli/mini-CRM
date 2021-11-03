<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')->paginate(10);
        return view('Companies.companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Companies.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $messages = [
            'name.required' => 'Please enter name!',
            'logo.dimensions' => 'Please upload 100x100 picture!'
        ];
        $validated = $request->validate([
            'name' => 'required',
            'logo' => 'dimensions:max_width=100,max_height=100',
        ], $messages);

        $input = $request->all();
        $file = $request->file('logo');
        $extension = $file->getClientOriginalName();
        $FileName = date('d-m-y') . '-' . $extension;
        $file->storeAs('public/images/', $FileName);
        $input['logo'] = $FileName;
        Company::create($input);
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $companies = Company::findOrFail($company->id);

        return view("companies.edit", compact('companies'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {

        $newCompany = Company::find($company->id);
        $newCompany->name = $request->name;
        $newCompany->email = $request->email;
        $newCompany->website = $request->website;

        $destination = 'storage/images/' . $newCompany->logo;
        if (File::exists($destination)) {

            File::delete($destination);
        }

        $file = $request->file('logo');
        $extension = $file->getClientOriginalName();
        $FileName = date('d-m-y') . '-' . $extension;
        $file->storeAs('public/images/', $FileName);

        $newCompany->logo = $FileName;
        $newCompany->update();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        Company::find($company->id)->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
