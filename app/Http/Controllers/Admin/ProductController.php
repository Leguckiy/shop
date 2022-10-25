<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Manufacturer;
use App\Models\Category;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        $categories = Category::all();
        return view('admin.product.create', compact('manufacturers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $product = new Product();
        $product->fill($request->validated());
        $product->save();

        $imageDates = $request->all('image');
        foreach ($imageDates['image'] as $image) {
            $product->addMedia($image)->toMediaCollection('product');
        }

        $categories = $request->validated()['categories'];
        $product->categories()->attach($categories);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $images = $product->getMedia('product')->all();
        $categories = $product->categories()->get();
        //dd($categories);
        return view('admin.product.show', compact('product', 'categories', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $images = $product->getMedia('product')->all();
        $manufacturers = Manufacturer::all();
        $categories = Category::all();
        $categories_id = $product->categories()->pluck('category_id');
        return view('admin.product.edit', compact('product', 'manufacturers', 'categories', 'categories_id', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, ProductRequest $request)
    {
        $product->fill($request->validated());
        $product->update();
        // if ($request->hasFile('image') && $request->file('image')->isValid()) {
        //     $product->clearMediaCollection('product');
        //     $product->addMediaFromRequest('image')->toMediaCollection('product');
        // }

        $product->clearMediaCollection('product');
        $imageDates = $request->all('image');
        foreach ($imageDates['image'] as $image) {
            $product->addMedia($image)->toMediaCollection('product');
        }

        $data = $request->validated();
        $categories = $data['categories'];
        $product->categories()->sync($categories);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
