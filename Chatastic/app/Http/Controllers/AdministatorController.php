<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Excel;

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

}
