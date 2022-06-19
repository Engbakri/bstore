<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Image;
use Illuminate\Support\Carbon;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::root()->get();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'product_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'product_price' => 'required',
            'product_description' => 'required',
           ],
           [
            'product_name.required' => 'Product name is required',
            'product_image.required' => 'Product Image is required',
            'product_price.required' => 'Product Price is required',
            'product_description.required' => 'Product Description is required',
           ]); 

           $product_image =  $request->file('product_image');

           $name_gen = hexdec(uniqid());
           $img_ext = strtolower($product_image->getClientOriginalExtension());
           $img_name = $name_gen.'.'.$img_ext;
           $up_location = 'images/products/';
           $last_img = $up_location.$img_name;
           $product_image->move($up_location,$img_name);
   
    

            $product =  Product::create([
                'product_name' => $request->input('product_name'),
                'product_price' => $request->input('product_price'),
                'product_image' => $last_img,
                'product_description' => $request->input('product_description'),
                'product_size' => $request->input('product_size'),
                'product_polciy' => $request->input('product_polciy'),
                'created_at' => Carbon::now()
            ]);
        
            $category = Category::find($request->category);
            $product->categories()->attach($category);

            return redirect()->route('product')->with('message','Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::root()->get();
        
        return view('admin.product.edit',compact('product','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'product_price' => 'required',
            'product_description' => 'required',
           ],
           [
            'product_name.required' => 'Product name is required',
            'product_image.required' => 'Product Image is required',
            'product_price.required' => 'Product Price is required',
            'product_description.required' => 'Product Description is required',
           ]); 

           $old_image = $request->input('old_image');

           $product_image =  $request->file('product_image');

           $name_gen = hexdec(uniqid());
           $img_ext = strtolower($product_image->getClientOriginalExtension());
           $img_name = $name_gen.'.'.$img_ext;
           $up_location = 'images/products/';
           $last_img = $up_location.$img_name;
           $product_image->move($up_location,$img_name);
   
           unlink($old_image);
            $product =  Product::find($id)->update([
                'product_name' => $request->input('product_name'),
                'product_price' => $request->input('product_price'),
                'product_image' => $last_img,
                'product_description' => $request->input('product_description'),
                'product_size' => $request->input('product_size'),
                'product_polciy' => $request->input('product_polciy'),
                'updated_at' => Carbon::now()
            ]);
        
            $category = Category::find($request->category);
        
            $product->categories()->attach($category);

            return redirect()->route('product')->with('message','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = Product::find($id);

        return view('admin.product.delete', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product')->with('error','Product Deleted Successfully');
    }
}
