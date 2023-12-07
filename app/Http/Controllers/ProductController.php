<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

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
        return view('dash.Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('dash.Product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'product_name' => ['required', 'string', 'max:255'],
        //     'product_image' => ['required'],
        //     'product_price' => ['required'],
        //     'product_description' => ['required'],
        //     'product_quantity' => ['required'],
        //     'product_status' => ['required'],
        //     'category_id' => ['required'],
           
        // ]);

        $product = new Product();

        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_status = $request->product_status;
        $product->category_id = $request->categories;

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Upload the image to the public/images directory
            $product->product_image = $imageName;
        }

        $product->save();
        // return redirect('dash.home', compact('categories'));
        return redirect()->route('product.index')->with('status', 'Add product successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $categories = Category::all();

        return view('dash.Product.edit', compact('data', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {


        $input = $request->all();

        if ($product_image = $request->file('product_image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $product_image->getClientOriginalExtension();
            $product_image->move($destinationPath, $profileImage);
            $input['product_image'] = "$profileImage";
        } else {
            $input['product_image'] = $product->product_image;
        }

        $product->update($input);
        // return redirect('dash.home', compact('categories'));
        return redirect()->route('product.index')->with('status', 'Edit product successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index')->with('status', 'Delete product successfully');
    }
}