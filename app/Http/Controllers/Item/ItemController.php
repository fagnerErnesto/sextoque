<?php

namespace App\Http\Controllers\Item;

use App\Http\Requests\ItemRequest;
use App\Model\Brand;
use App\Services\File;
use App\Model\Item;
use App\Http\Controllers\Controller;
use App\Services\Contracts\FileInterface;

class ItemController extends Controller
{
    protected $arrLabel;
    protected $file;
    public function __construct(FileInterface $file)
    {
        $this->middleware('auth');
        $this->arrLabel = [
            'brandLabel' => __('brand.title'),
            'nameLabel' => __('general.name'),
            'imageLabel' => __('general.logo'),
            'descLabel' => __('general.description'),
        ];
        $this->file = $file;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('item.show', [
            'pageTitle' => 'Items',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrRoute = ['route' => 'item.store', 'method' => 'post', 'files' => true];

        $brand = new Brand();
        $arrDropDown = $brand->getArrDropDown();
        if (empty($arrDropDown)) {
            return redirect()->route('brand.create')->with('success', __('general.msg.newBrand'));
        }

        return view('item.create', [
            'arrRoute' => $arrRoute,
            'brands' => $brand->getArrDropDown(),
            'item' => new Item(),
            'arrLabel' => $this->arrLabel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ItemRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $request->validate([
            File::IMG => 'required'
        ]);
        $this->file->setFileType(File::IMG);
        $this->file->setFileNameFromRequest($request);

        $item = new Item([
            'name' => $request->name,
            'description' => $request->description,
            'brand_id' => $request->brand_id,
            'img_logo' => $this->file->getPublicPath() . $this->file->getFileName()
        ]);
        $item->save();
        $this->file->uploadFile();

        return redirect()->route('item.index')->with('success', __('item.create.success.msg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $arrRoute = ['route' => ['item.update', $item->id], 'method' => 'put', 'files' => true];
        $brand = new Brand();
        return view('item.create', [
            'arrRoute' => $arrRoute,
            'brands' => $brand->getArrDropDown(),
            'item' => $item,
            'arrLabel' => $this->arrLabel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ItemRequest $request
     * @param  \App\Model\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;

        if ($request->hasFile(File::IMG)) {
            $request->validate([
                File::IMG => 'required'
            ]);
            $this->file->setFileType(File::IMG);
            $this->file->setFileNameFromRequest($request);
            $item->img_logo = $this->file->getPublicPath() . $this->file->getFileName();
            $this->file->uploadFile();
        }

        $item->save();
        return redirect()->route('item.index')->with('success', __('item.edit.success.msg'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Item $item
     * @return void
     */
    public function destroy(Item $item)
    {
        //
    }
}
