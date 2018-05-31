<?php

namespace App\Http\Controllers\Company;

use App\Model\Company;
use App\Services\Contracts\FileInterface;
use App\Services\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    protected $file;
    public function __construct(FileInterface $file)
    {
        $this->middleware('auth');
        $this->file = $file;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrRoute = ['route' => 'company.store', 'method' => 'post', 'files' => true];
        return view('company.create', [
            'company' => new Company(),
            'arrRoute' => $arrRoute
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompanyRequest $request)
    {
        $this->file->setFileType(File::IMG);
        $this->file->setFileNameFromRequest($request);
        $company = new Company([
            'name' => $request['name'],
            'img_logo' => $this->file->getPublicPath() . $this->file->getFileName()
        ]);
        $company->save();
        $this->file->uploadFile();

        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Company $company
     * @return void
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Company $company
     * @return void
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Company $company
     * @return void
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Company $company
     * @return void
     */
    public function destroy(Company $company)
    {
        //
    }
}
