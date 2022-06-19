@extends('layouts.app')


@section('content')
@include('include.slider')
<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-sidebar mr-50">
                    <div class="sidebar-widget mb-50">
                        <h3 class="sidebar-title">Search Products</h3>
                        <div class="sidebar-search">
                            <form action="#">
                                <input placeholder="Search Products..." type="text">
                                <button><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">Filter by Price</h3>
                        <div class="price_filter">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <label>price : </label>
                                    <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button> 
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-45">
                        <h3 class="sidebar-title">Categories <span>{{ $categories->count() }}</span> </h3>
                        <div class="sidebar-categories">
                            <ul>
                            @foreach ($categories as $index=>$category)

                                <li><a href="{{ route('searchWithCategory',$category->id) }}">{{ $category->category_name }}</a></li>
                                @foreach ($category->children as $child)
                                     <li class="mx-5"><a href="{{ route('searchWithCategory',$child->id) }}">{{ $child->category_name }}</a></li>
                                @endforeach
                            @endforeach
                              
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-overflow mb-45">
                        <h3 class="sidebar-title">color</h3>
                        <div class="product-color">
                            <ul>
                                <li class="red">b</li>
                                <li class="pink">p</li>
                                <li class="blue">b</li>
                                <li class="sky">b</li>
                                <li class="green">y</li>
                                <li class="purple">g</li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">size</h3>
                        <div class="product-size">
                            <ul>
                                <li><a href="#">xl</a></li>
                                <li><a href="#">m</a></li>
                                <li><a href="#">l</a></li>
                                <li><a href="#">ml</a></li>
                                <li><a href="#">lm</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">tag</h3>
                        <div class="product-tags">
                            <ul>
                                <li><a href="#">Clothing</a></li>
                                <li><a href="#">Bag</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Tie</a></li>
                                <li><a href="#">Women</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop-product-wrapper res-xl res-xl-btn">
                    <div class="shop-bar-area">
                        <div class="shop-bar pb-60">
                            <div class="shop-found-selector">
                                <div class="shop-found">
                                    <p><span>15</span> Product Found of <span>{{ $category->count() }}</span></p>
                                </div>
                                <div class="shop-selector">
                                    <label>Sort By : </label>
                                    <select name="select">
                                        <option value="">Default</option>
                                        <option value="">A to Z</option>
                                        <option value=""> Z to A</option>
                                        <option value="">In stock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="shop-filter-tab">
                                <div class="shop-tab nav" role=tablist>
                                    <a class="active" href="#grid-sidebar1" data-bs-toggle="tab" role="tab" aria-selected="false">
                                        <i class="ti-layout-grid4-alt"></i>
                                    </a>
                                    <a href="#grid-sidebar2" data-bs-toggle="tab" role="tab" aria-selected="true">
                                        <i class="ti-menu"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-content tab-content">
                            <div id="grid-sidebar1" class="tab-pane fade active show">
                                <div class="row">
                                @foreach ($category->products as $index=>$product)
                                    <div class="col-lg-6 col-md-6 col-xl-3">
                                        <div class="product-wrapper mb-30">
                                            <div class="product-img">
                                                
                                                    <img src="{{ asset($product->product_image) }}" alt="" width="200;" height="200;">
                                                
                                                
                                                <div class="product-action">
                                                    
                                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                                        <input type="hidden" value="{{ $product->product_name }}" name="name">
                                                        <input type="hidden" value="{{ $product->product_price }}" name="price">
                                                        <input type="hidden" value="{{ $product->product_image }}"  name="image">
                                                        <input type="hidden" value="1" name="quantity">
                                                        <input class="animate-top m-2"  type="submit" value="Add To Cart" >
                                                    </form>
                                                    <a class="animate-right" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="{{ route('showproduct',$product->id) }}">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                    
                            
                                                    
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="#">{{ $product->product_name }}</a></h4>
                                                <span>{{ $product->product_price }}</span>
                                            </div>
                                        </div>
                                   </div>
                                @endforeach
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="pagination-style mt-30 text-center">
                    <ul>
                        <li><a href="#"><i class="ti-angle-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">19</a></li>
                        <li class="active"><a href="#"><i class="ti-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

 