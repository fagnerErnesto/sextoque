<?php

namespace App\Http\Controllers\Brand;

use App\Model\Brand;
use App\Services\Contracts\FileInterface;
use App\Services\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
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
        $brands = Brand::all();
        return view('brand.show', [
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrRoute = ['route' => 'brand.store', 'method' => 'post', 'files' => true];
        return view('brand.create', [
            'brand' => new Brand(),
            'arrRoute' => $arrRoute
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BrandRequest $request)
    {
        $request->validate([
            File::IMG => 'required'
        ]);
        $this->file->setFileType(File::IMG);
        $this->file->setFileNameFromRequest($request);

        $brand = new Brand([
            'name' => $request['name'],
            'img_logo' => $this->file->getPublicPath() . $this->file->getFileName()
        ]);
        $brand->save();
        $this->file->uploadFile();

        return redirect()->route('brand.index')->with('success', __('brand.create.success.msg'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Brand $brand
     * @return void
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $arrRoute = ['route' => ['brand.update', $brand->id], 'method' => 'put', 'files' => true];
        return view('brand.create', [
            'brand' => $brand,
            'arrRoute' => $arrRoute
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BrandRequest $request
     * @param  \App\Model\Brand $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->name = $request->name;
        if ($request->hasFile(File::IMG)) {
            $this->file->setFileType(File::IMG);
            $this->file->setFileNameFromRequest($request);
            $strOldImage = public_path($brand->img_logo);
            if (file_exists($strOldImage)) {
                unlink($strOldImage);
            }
            $brand->img_logo = $this->file->getPublicPath() . $this->file->getFileName();
            $this->file->uploadFile();
        }
        $brand->save();
        return redirect()->route('brand.index')->with('success', __('brand.edit.success.msg'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Brand $brand
     * @return void
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
