<?php

namespace App\Http\Controllers\web\section;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\CompanyRequest;
use App\Repositories\Contracts\CompanyRepositoryInterface;

class CompanyController extends Controller
{

    private $company;

    public function __construct(CompanyRepositoryInterface $company)
    {
        $this->company = $company;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $company = $this->company->first();
        return view('web.sections.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request)
    {
        $this->company->update($request->name, $request->iban, $request->bic);
        return redirect(route('panel.company.edit'))->with('success', 'Company Settings Updated');
    }
}
