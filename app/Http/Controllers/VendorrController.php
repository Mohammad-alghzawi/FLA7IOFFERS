<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors=Vendor::all();
        return view('dash.vendore.index',compact('vendors'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.vendore.create');
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
            'name' => ['required', 'string', 'max:255'],
            'desciption' => ['required'],
            'logo' => ['required'],
           
        ]);



        
        $imageVendor = new Vendor;

        $imageVendor->name = $request->name;
        $imageVendor->desciption = $request->desciption;
        

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Upload the image to the public/images directory
            $imageVendor->logo = $imageName;
        }

        $imageVendor->save();
        // return redirect('dash.home', compact('categories'));
        return redirect()->route('logo.index')->with('status','Add vendor successfully');
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
        $data = Vendor::find($id);
        return view('dash.vendore.edit')->with('data', $data);
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
        $vendor = Vendor::find($id);

        // Update category attributes based on form data
        $vendor->name = $request->input('name');
        $vendor->desciption = $request->input('desciption');
      

        // Handle image upload if a new image is provided
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Upload the image to the public/images directory
            $vendor->logo = $imageName;
        }

        // Save the updated category
        $vendor->save();

        // Redirect back to the category index or wherever you want
        return redirect()->route('logo.index')->with('status','Edit vendor successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vendor::destroy($id);
        return redirect()->route('logo.index')->with('status','Delete vendor successfully');
    }
}
