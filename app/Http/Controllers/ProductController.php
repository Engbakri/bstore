<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $cartItems = \Cart::getContent();
        $products = Product::all();
        return view('index',compact('products','cartItems'));
    }


    public function home(){
        $cartItems = \Cart::getContent();
        $products = Product::all();
        $categories = Category::root()->get();
        
        

        return view('pages.home',compact('products','cartItems','categories'));
    }

    public function showProduct($id){
        $cartItems = \Cart::getContent();
        $product = Product::find($id);
        return view('pages.showProduct',compact('product','cartItems'));
    }

}
