<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Excel;
use PDF;

class AdministatorController extends Controller
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
        return view('/getUser');
    }

    public function getDataView(){

        return view('getData');
    }

    public function getData(){
        $data = User::get()->toArray();
        Excel::create('List of Users', function($excel) use ($data){
            $excel->sheet('Sheet 1', function($sheet) use ($data){

                $sheet->fromArray($data);

            });
        })->download('xlsx');

        return view('getData');
    }


    public function getPDF($id){
        return view('getPDFData', compact($id));
    }

    public function getPDFData($id){
        $user = UserDetail::find($id);
        $pdf = PDF::loadView('pdf', compact('user'));
        return $pdf->download('invoice.pdf');
    }

    public function AllProfiles(){
        $allUsers = User::all();
        $allConvo = Conversation::all();

        return view('/admin/view',['users'=>$allUsers, 'conversations' => $allConvo]);
    }

    public function ViewProfile($id){
        $user = User::find($id);
        return view('/profile/overview')->with('user',$user);
    }

    public function EditProfile($id){
        $user = User::find($id);
        return view ('/profile/edit')-> with('user', $user);
    }

    public function UpdateProfile($id){

        $rules = array(
            'name'       => 'required',
            'gender'      => 'required',
            'age' => 'required|numeric',
        );

        $validator = Validator::make(Input::all(), $rules);

        if(Input::hasFile('image'))
        {
            $getimageName = time().'.'.Input::file('image')->extension();
            Input::file('image')->move(base_path().'/public/img', $getimageName);

        }else {
            $user = User::find($id);
            $getimageName = $user->avatar;
        }

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
            return redirect('/admin/view');
        }
    }

    public function RemoveUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect ('/admin/view');

    }
}
