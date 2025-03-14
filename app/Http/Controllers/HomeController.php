<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function nosotros(){
        return view('nosotros');
    }

    public function contact(){
        return view('contact');
    }

    public function catalogo(){
        return view('catalogo');
    }

}
