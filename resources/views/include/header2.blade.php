<header>
    <div class="header-top-wrapper-2 border-bottom-2">
        <div class="header-info-wrapper pl-200 pr-200">
            <div class="header-contact-info header-contact-info2 ">
                <ul>
                    <li><i class="pe-7s-call"></i> +011 2231 4545</li>
                    <li><i class="pe-7s-mail"></i> <a href="#">company@domail.info</a></li>
                </ul>
            </div>
            <div class="electronics-login-register">
                <ul>
                    <li><a href="{{ route('dashboard') }}"><i class="pe-7s-users"></i>My Account</a></li>
                    @auth
                        <li><a  href="{{ route('logout') }}">
                            <i class="pe-7s-repeat"></i>Logout</a>
                        </li>
                    @else
                         <li><a  href="{{ route('logout') }}">
                            <i class="pe-7s-repeat"></i>Login</a>
                        </li>
                     @endauth
                    <li><a href="wishlist.html"><i class="pe-7s-like"></i>Wishlist</a></li>
                    <li><a href="#"><i class="pe-7s-flag"></i>US</a></li>
                    <li><a class="border-none" href="#"><span>$</span>USD</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-bottom ptb-40 clearfix">
        <div class="header-bottom-wrapper pr-200 pl-200">
            <div class="logo-3">
                <a href="{{ route('home') }}">
                    <img src="assets/img/logo/logo-3.png" alt="">
                </a>
            </div>
            <div class="categories-search-wrapper categories-search-wrapper2">
                <div class="all-categories">
                    <div class="select-wrapper">
                        <select class="select">
                            <option value="">All Categories</option>
                            @foreach ($categories as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->category_name }} </option>
                                    @foreach ($parent->children as $child)
                                        <option class="m-5" value="{{ $child->id }}">{{ $child->category_name }} </option>
                                    @endforeach
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="categories-wrapper">
                    <form action="{{ route('search') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input placeholder="Enter Your key word"  id="search" name="search" type="text">
                        <button type="submit"> Search </button>
                    </form>
                </div>
            </div>
            <div class="header-cart-3">
                <a href="{{ route('cart.list') }}">
                    <i class="ti-shopping-cart"></i>My Cart
                    <span>{{ Cart::getTotalQuantity()}}</span>
                </a>
                <ul class="cart-dropdown">
                    
                    @foreach ($cartItems as $item)
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="{{ $item->attributes->image }}" alt="" width="100px;" height="100px;"></a>
                            </div>
                            <div class="cart-title">
                                <h5><a href="#">{{ $item->name }}</a></h5>
                                <h6><a href="#"></a></h6>
                                <span> ${{ $item->price }} x {{ $item->quantity }}</span>
                            </div>
                            <div class="cart-delete">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button><i class="ti-trash"></i></button>
                                    </form>
                                
                            </div>
                        </li>
                    @endforeach
                    <li class="cart-space">
                        <div class="cart-sub">
                            <h4>Subtotal</h4>
                        </div>
                        <div class="cart-price">
                            <h4> ${{ Cart::getTotal() }}</h4>
                        </div>
                    </li>
                    <li class="cart-btn-wrapper">
                        <a class="cart-btn btn-hover" href="{{ route('cart.list') }}">view cart</a>
                        <a class="cart-btn btn-hover" href="{{ route('checkout') }}">checkout</a>
                    </li>
                </ul>
            </div>
            <div class="mobile-menu-area mobile-menu-none-block electro-2-menu">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="{{ route('home') }}">HOME</a></li>
                            <li><a href="#">shop</a></li>
                            <li><a href="#">BLOG</a> </li>
                            <li><a href="#"> Contact  </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
