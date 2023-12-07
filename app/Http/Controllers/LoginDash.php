<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use Hash;

class LoginDash extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('dash.login');
    }
    public function logindash(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:5|max:12'

        ]);
        $admin = Admin::Where('email', "=", $request->email)->first();
        if ($admin) {
            if ($request->password == $admin->password) {
                $request->Session()->put('loginId', $admin->id);
                
                return redirect('dash');
            } else {
                return back()->with('fail', 'password not matches ');

            }

        } else {
            return back()->with('fail', 'This email is not registered');
        }

    }
    public function dashboard()
    {

        return view('dash.home');
    }
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect()->route('logindash');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
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