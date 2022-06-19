<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use Laravel\Scout\Searchable;
class ProductController extends Controller
{
    public function index(){
        $cartItems = \Cart::getContent();
        $products = Product::all();
        $categories = Category::root()->get();
        return view('index',compact('products','cartItems','categories'));
    }
   


    public function home(Request $request){
        $ads = Slider::all();

        if($request->filled('search')){
            $products = Product::search($request->search)->get();
        }else{
            $products = Product::all();
        }

        $cartItems = \Cart::getContent();
        $categories = Category::root()->get();
       
        
       
        return view('pages.home',compact('products','cartItems','categories','ads'));
    }

    public function showProduct($id){
        $cartItems = \Cart::getContent();
        $product = Product::find($id);
        return view('pages.home',compact('product','cartItems'));
    }

    public function showCate()
    {
        $categories = Category::root()->get();
        
        return view('include.header2',compact('categories'));
    }

    public function search(Request $request,$id)
    {
        $ads = Slider::all();
        $cartItems = \Cart::getContent();
        $categories = Category::root()->get();
        if($request->filled('search')){
            $products = Product::search($request->search)->get();
        }else{
            $category = Category::find($id)->products;
        }
       
        return view('pages.search',compact('ads','cartItems','categories','category'));

     
        
    }

    

    

}
