<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

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

    public function update($id){
        //$user = User::find($id);

        $rules = array(
            'name'       => 'required',
            'gender'      => 'required',
            'age' => 'required|numeric',
        );

        $validator = Validator::make(Input::all(), $rules);
        $getimageName = time().'.'.Input::file('image')->extension();
        Input::file('image')->move(base_path().'/public/img', $getimageName);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator);
        } else {
            // store
            $user = User::find($id);
            $user->name = Input::get('name');
            $user->gender = Input::get('gender');
            $user->age = Input::get('age');
            $user->avatar = $getimageName;
            $user->save();

            // redirect
            //Session::flash('message', 'Successfully updated profile!');
            return redirect('/profile/view');
        }

        //return redirect('/profile/view');
    }

    public function updatePicture($id, Request $request)
    {
        $user = User::find($id);
        $this->validate($request, [

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
