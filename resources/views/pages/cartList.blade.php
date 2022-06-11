@extends('layouts.app')


@section('content')
<div class="cart-main-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading">Cart</h1>
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>remove</th>
                                    <th>images</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td class="product-remove">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button><i class="pe-7s-close"></i></button>
                                    </form>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="{{ $item->attributes->image }}" alt="" width="85px;" height="101px;"></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{ $item->name }} </a></td>
                                    <td class="product-price-cart"><span class="amount">${{ $item->price }}</span></td>
                                    <td class="product-quantity">
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id}}" >
                                          <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                          class="w-6 text-center bg-gray-300" />
                                          <button type="submit" class="button btn-succes">update</button>
                                          </form>
                                    </td>
                                    <td class="product-subtotal"> ${{ $item->price }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
<input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                                <div class="coupon2">
                                    <form action="{{ route('cart.clear') }}" method="POST">
                                        @csrf
                                        <input type="submit" class="button" value="Remove All Cart">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ms-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal<span>${{ Cart::getTotal() }}</span></li>
                                    <li>Total<span>${{ Cart::getTotal() }}</span></li>
                                </ul>
                                <a href="{{ route('checkout') }}">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection