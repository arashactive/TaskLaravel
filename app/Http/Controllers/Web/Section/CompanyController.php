<?php

namespace App\Http\Controllers\Web\Section;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\CompanyRequest;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * @var CompanyRepositoryInterface
     */
    private $company;

    /**
     * CompanyController constructor.
     *
     * @param CompanyRepositoryInterface $company
     */
    public function __construct(CompanyRepositoryInterface $company)
    {
        $this->company = $company;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(): View
    {
        $company = $this->company->first();
        return view('web.sections.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyRequest $request
     * return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request)
    {
        $this->company->update($request->name, $request->iban, $request->bic);
        return redirect(route('panel.company.edit'))->with('success', 'Company Settings Updated');
    }
}