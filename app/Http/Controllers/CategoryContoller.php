<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('dash.Category.index', compact('categories'));
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required'],
            'discount' => ['required'],
           
        ]);



        $imageCategory = new Category;

        $imageCategory->title = $request->title;
        $imageCategory->discount = $request->discount;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Upload the image to the public/images directory
            $imageCategory->image = $imageName;
        }

        $imageCategory->save();
        // return redirect('dash.home', compact('categories'));
        return redirect()->route('category.index')->with('status','Add category successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view('dash.Category.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the category by ID
        $category = Category::find($id);

        // Update category attributes based on form data
        $category->title = $request->input('title');
        $category->discount = $request->input('discount');

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Upload the image to the public/images directory
            $category->image = $imageName;
        }

        // Save the updated category
        $category->save();

        // Redirect back to the category index or wherever you want
        return redirect()->route('category.index')->with('status','Edit category successfully');






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('status','Delete category successfully');
    }
}