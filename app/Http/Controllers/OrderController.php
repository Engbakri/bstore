<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\ShippingInfo;
use Monarobase\CountryList\CountryListFacade;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userOrders = Order::where('user_id',auth()->user()->id)->paginate(15);

        return view('customer.orders.index',compact('userOrders'));
    }

    public function indexAdmin()
    {
        $userOrders = Order::paginate(15);

        return view('admin.orders.index',compact('userOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = CountryListFacade::getList('en');
      
        $cartItems = \Cart::getContent();
        return view('pages.checkout',compact('cartItems','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           =>   auth()->user()->id,
            'status'            =>  'Processing',
            'grand_total'       =>  \Cart::getSubTotal(),
            'item_count'        =>  \Cart::getTotalQuantity(),
            
        ]);
    
        if ($order) {
    
            $items = \Cart::getContent();
    
            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('product_name', $item->name)->first();
    
                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceSum()
                ]);
    
                $order->items()->save($orderItem);
            }

            ShippingInfo::create([
                'user_id'           =>  auth()->user()->id,
                'address_line1'     =>  $request->addr1,
                'address_line2'     =>  $request->addr2,
                'city'              =>  $request->city,
                'state'             =>  $request->state,
                'country'           =>  $request->country,
                'postal_code'       =>  $request->postcode,
                
            ]);

        }
        \Cart::clear();
        return  redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        return view('customer.orders.show',compact('order'));
    }

    public function showAdmin($id)
    {
        $order = Order::find($id);

        return view('admin.orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
      
        return view('admin.orders.status',compact('order'));
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
        DB::table('orders')
              ->where('id', $request->order_id)
              ->update(['status' => $request->status]);


              return redirect()->route('orders.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
