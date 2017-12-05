<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required'
            ]);

        $input = $request->all();
        $user->fill($input)->save();
        return redirect('/profile/view');
    }

    public function updatePicture($id, Request $request)
    {
        $user = User::find($id);
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $getimageName = time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('img'), $getimageName);
        return redirect()->route('profile/view');

    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('home');
    }
}
