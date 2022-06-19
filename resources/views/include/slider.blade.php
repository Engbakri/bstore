<div class="categori-menu-wrapper2 clearfix">
    <div class="pl-200 pr-200">
        <div class="categori-style-2">
            <div class="category-heading-2">
                <h3>All Categories</h3>
                <div class="category-menu-list">
                    <ul>
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('searchWithCategory',$category->id) }}"><img alt="" src="{{ asset('assets/img/icon-img/15.png') }}">{{ $category->category_name }} <i class="pe-7s-angle-right"></i></a>
                            <div class="category-menu-dropdown">
                            @foreach ($category->children as $child)
                            <div class="category-dropdown-style category-common4">
                                <ul>
                                    <li><a href="{{ route('searchWithCategory',$child->id) }}"> {{ $child->category_name }} </a></li>
                                </ul>
                                
                            </div>
                            @endforeach
                            </div>    
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="menu-style-4 menu-hover">
            <nav>
                <ul>
                    <li><a href="#">home </a></li>
                    <li><a href="#">shop </a></li>
                    <li><a href="#">blog </a> </li>
                    <li><a href="#">contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="slider-area">
    <div class="slider-active owl-carousel">
    @foreach ($ads as $ads)
        <div class="single-slider-4 slider-height-4 bg-img" style="background-image: url({{ $ads->slider_image }})">
            <div class="container">
                <div class="slider-content-4 fadeinup-animated">
                    <h2 class="animated">{{ $ads->slider_title }} <br>future.</h2>
                    <h4 class="animated">{{ $ads->slider_description }} </h4>
                    <a class="electro-slider-btn btn-hover animated" href="product-details.html">buy now</a>
                </div>
            </div>
        </div>
    @endforeach
       
   
    </div>
</div>