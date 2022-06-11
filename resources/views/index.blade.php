@extends('layouts.app')


@section('content')

<div class="electro-product-wrapper wrapper-padding pt-85 pb-75 gray-bg-7">
    <div class="container">
        <div class="section-title-4 text-center mb-45">
            <h2>Top Products</h2>
        </div>
        <div class="row">
            @foreach ($products as $index=>$product)
                <div class="col-lg-3 col-md-6">
                    <div class="product-wrapper mb-30">
                        <div class="product-img-3">
                            <a href="product-details-9.html">
                                <img src="{{ $product->product_image }}" alt="">
                            </a>
                            <div class="hanicraft-action-position">
                                <div class="hanicraft-action">
                                    
                                
                                    <a class="action-like" title="Wishlist" href="#">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                    <a class="action-repeat" title="Compare" href="#" data-bs-toggle="modal" data-target="#exampleCompare" >
                                        <i class="pe-7s-repeat"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content-electro2 text-center">
                            <h3><a href="#">{{ $product->product_name }}</a></h3>
                            <span>Black</span>
                            <h5>{{ $product->product_price }}</h5>
                        </div>
                    </div>
                </div>

                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <input type="hidden" value="{{ $product->product_name }}" name="name">
                    <input type="hidden" value="{{ $product->product_price }}" name="price">
                    <input type="hidden" value="{{ $product->product_image }}"  name="image">
                    <input type="hidden" value="1" name="quantity">
                    <button class="action-cart" type="submit">Add To Cart</button>
                </form>
            @endforeach
        </div>
    </div>
</div>
    
@endsection