<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

class ProfileDashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value = Session::get('loginId');
        if((Session::has('loginId')) ){
            $profiledash = Admin::find( $value);
            return view('dash.profile.index', compact('profiledash'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function image()
    {
        // $value = Session::get('loginId');
        // if((Session::has('loginId')) ){
        //     $image = Admin::find( $value);
        //     return view('dash.master', compact('image'));
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = Admin::find($id);
        return view('dash.profile.edit')->with('data', $data);
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
        $profile = Admin::find($id);

        // Update profile attributes based on form data
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->password = $request->input('password');


        // Handle image upload if a new image is provided
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Upload the image to the public/images directory
            $profile->avatar = $imageName;
        }

        // Save the updated profile
        $profile->save();

        // Redirect back to the category index or wherever you want
        return redirect()->route('profileAdmin.index')->with('status', 'Edit profile successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}