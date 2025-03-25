<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        $sproducts = Product::whereNotNull('sale_price')->where('sale_price','<>','')->inRandomOrder()->get()->take(4);
        return view('index', compact('categories','sproducts'));
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
