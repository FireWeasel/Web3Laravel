<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile/view');
    }


    public function edit()
    {
        return view('profile/edit');
    }

    public function update($id, Request $request){
        $user = User::find($id);

        $this -> validate($request, [
            'name' => 'required'
            ]);

        $input = $request->input('name');
        $user->name = $input;
        $user->save();
        return redirect('/profile/view');
    }
}
