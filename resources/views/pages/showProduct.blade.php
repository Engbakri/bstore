@extends('layouts.app')

@section('content')
<div  id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span class="pe-7s-close" aria-hidden="true"></span>
    </button>
    <div class="modal-dialog modal-quickview-width" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="qwick-view-left">
                    
                    <div class="quick-view-list nav" role="tablist">
                        <a class="active">
                            <img src="{{ $product->product_image }}" alt="" width="320;" height="380;">
                        </a>
                        <a href="#modal2" data-bs-toggle="tab" role="tab">
                            <img src="assets/img/quick-view/s2.jpg" alt="">
                        </a>
                        <a href="#modal3" data-bs-toggle="tab" role="tab">
                            <img src="assets/img/quick-view/s3.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="qwick-view-right">
                    <div class="qwick-view-content">
                        <h3>{{ $product->product_name }}</h3>
                        <div class="price">
                            <span class="new">${{ $product->product_price }}</span>
                            
                        </div>
                        <div class="rating-number">
                            <div class="quick-view-rating">
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                            </div>
                            <div class="quick-view-number">
                                <span>2 Ratting (S)</span>
                            </div>
                        </div>
                        <p>{{ $product->product_description }}</p>
                        <div class="quick-view-select">
                            <div class="select-option-part">
                                <label>Size</label>
                                <span>{{ $product->product_size }}</span>
                            </div>
                            <div class="select-option-part">
                                <label>Return Polciy</label>
                                <p>{{ $product->product_polciy }}</p>
                            </div>
                        </div>
                        <div class="quickview-plus-minus">
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->product_name }}" name="name">
                                <input type="hidden" value="{{ $product->product_price }}" name="price">
                                <input type="hidden" value="{{ $product->product_image }}"  name="image">
                                
                               
                           
                            <div class="cart-plus-minus">
                                <input type="number" value="1" name="quantity" class="cart-plus-minus-box">
                            </div>
                            <div class="quickview-btn-cart">
                                <input class="btn-hover-black"  type="submit" value="Add To Cart">
                            </div>
                            
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
