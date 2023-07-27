<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get(); 
      

        return view('product.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $name = $request->input('name'); 
        $description = $request->input('description'); 
        $price = $request->input('price'); 
        $quantity = $request->input('quantity');
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images', $image); 
    //     $category_id = $request->input('category_id');
    //     $product->category_id = $category_id;
    //   $brand_id = $request->input('brand_id');
    
    //   $product->brand_id = $brand_id;

        //tao data de luu vao db
        $data = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'description' => $description,
            'image' => $image,
            // 'brand' => $brand,
            // 'category' => $category,
        ];

        Product::create($data); //tao ban ghi co du lieu la $data
        
        return redirect()->route('product.index')
            ->with('success','Product has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct($id)
    {
        // $product = Product::find($id);
        // $categories = Category::all();
        // return view('product.index', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $name = $request->input('name'); 
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $description = $request->input('description'); //lay input description moi
        $product->fill([
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'description' => $description,
        ])->save();

        if ($request->file('image') !== null) {
            $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images', $image); 
        
            $product->fill([
                'image' => $image,
            ])->save();
        }

        return redirect()->route('product.index')
            ->with('success', 'product update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Delete product successfully');
    }
}