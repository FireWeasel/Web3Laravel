<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function show($name)
  {
      return view('home', ['name' => $name]);
  }
}
