 @extends('frontend.master')
 @section('website_content')

<!-- start of wpo-hero-section -->
<div class="wpo-hero-slider">
    <div class="container container-fluid-sm">
        <div class="hero-slider">
            <div class="hero-slider-item">
                <div class="slider-bg">
                    <img src="{{ asset('frontend') }}/assets/images/slider/slide-1.jpg" alt="">
                </div>
                <div class="slider-content">
                    <div class="slide-title">
                        <h2>Trendy & Unique
                            Collection</h2>
                    </div>
                    <a class="theme-btn" href="product.html">Shop Now</a>
                </div>
            </div>
            <div class="hero-slider-item">
                <div class="slider-bg">
                    <img src="{{ asset('frontend') }}/assets/images/slider/slide-2.jpg" alt="">
                </div>
                <div class="slider-content">
                    <div class="slide-title">
                        <h2>Trendy & Unique
                            Collection</h2>
                    </div>
                    <a class="theme-btn" href="product.html">Shop Now</a>
                </div>
            </div>
            <div class="hero-slider-item">
                <div class="slider-bg">
                    <img src="assets/images/slider/slide-3.jpg" alt="">
                </div>
                <div class="slider-content">
                    <div class="slide-title">
                        <h2>Trendy & Unique
                            Collection</h2>
                    </div>
                    <a class="theme-btn" href="product.html">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <ul class="hero-social">
        <li>
            <a href="#"><i class="ti-facebook"></i></a>
        </li>
        <li>
            <a href="#"><i class="ti-instagram"></i></a>
        </li>
        <li>
            <a href="#"><i class="ti-linkedin"></i></a>
        </li>
        <li>
            <a href="#"><i class="ti-twitter-alt"></i></a>
        </li>
    </ul>
</div>
<!-- end of wpo-hero-section -->

<!-- start of themart-featured-section -->
<section class="themart-featured-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="wpo-section-title">
                    <h2>Featured Categories</h2>
                </div>
            </div>
        </div>
        <div class="featured-categorie-slider owl-carousel">
           @foreach ($categories as $category)
           <div class="featured-item">
            <div class="images">
                <img style="width: 60px; margin:auto;" src="{{ asset('uploads/category') }}/{{ $category->category_photo }}" alt="">
            </div>
            <div class="text">
                <h2><a href="product.html">{{ Str::limit($category->category_name, 10) }}</a></h2>
            </div>
        </div>
           @endforeach

        </div>
    </div>
</section>
<!-- end of themart-featured-section -->

<!-- start of themart-offer-section -->
<section class="themart-offer-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="wpo-section-title">
                    <h2>Exciting Offers</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                @foreach ($upcommingOffer->take(1) as $offers)
                <div class="offer-wrap" style="background-image:url({{ asset('uploads/offer_image/iphone-15pro-max.jpg') }})">
                    <div class="content">
                        <h2 style="color: #fff;">{{ $offers->product_name }}</h2>
                        <span class="offer-price">{{ $offers->after_disscount }}</span>
                        <del>{{ $offers->product_price }}</del>

                        <div class="count-up">
                            <div id="clock"></div>
                        </div>
                        <a class="theme-btn-s2" href="product.html">Shop Now</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="banner-two-wrap" style="background-image:url({{ asset('uploads/newyear_image') }}/{{ $newyearoffer_70->first()->image }})">
                    <div class="text">
                        <h2>{{ $newyearoffer_70->first()->title }}</h2>
                        <h4>{{ $newyearoffer_70->first()->sub_title }}</h4>
                        <a class="theme-btn-s2" href="product.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of themart-offer-section -->

<!-- start of themart-interestproduct-section -->
<section class="themart-interestproduct-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="wpo-section-title">
                    <h2>Products Of Your Interest</h2>
                </div>
            </div>
        </div>
        <div class="product-wrap">
            <div class="row">
                        {{-- @php
                            $current_month = date('m');
                            $abc = DB::table('products')
                            ->selectRaw('MONTH(created_at) as month')
                            ->get();
                            echo $abc[1],['month'];
                            @endphp --}}
                @foreach ($products->take(6) as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="product-item">
                        <div class="image">

                            <img src="{{ asset('uploads/products') }}/{{ $product->preview_image }}" alt="">
                            @if ($product->created_at->diffInDays(\Carbon\Carbon::now()) <= 40)
                                <div class="tag new">New</div>
                            @else
                                <div class="tag sale">Sale</div>
                            @endif
                        </div>
                        <div class="text">
                            <h2><a href="{{ route('product.details',$product->slug) }}">
                                @if (strlen($product->product_name) > 25)
                                {{ substr($product->product_name, 0,25) }}...</a>
                                @else
                                    {{ $product->product_name }}
                                @endif
                            </h2>
                            <div class="rating-product">
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <span>130</span>
                            </div>
                            <div class="price">
                                @if ($product->discount == '')
                                <span class="present-price">&#x9F3;{{ $product->product_price }}</span>
                                @else
                                <span class="present-price">&#x9F3;{{ $product->after_disscount }}</span>
                                <del class="old-price">&#x9F3;{{ $product->product_price }}</del>
                                @endif

                            </div>
                            <div class="shop-btn">
                                <a class="theme-btn-s2" href="">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



                <div class="more-btn">
                    <a class="theme-btn-s2" href="product.html">View All</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of themart-interestproduct-section -->

<!-- start of themart-upcoming-offer-section -->
<section class="themart-upcoming-offer-section section-padding">
    <div class="container">
        <div class="upcoming-offer">
            <div class="left-shape">
                <svg width="448" height="448" viewBox="0 0 448 448" fill="none">
                    <path
                        d="M448 224C448 347.712 347.712 448 224 448C100.288 448 0 347.712 0 224C0 100.288 100.288 0 224 0C347.712 0 448 100.288 448 224ZM13.8949 224C13.8949 340.038 107.962 434.105 224 434.105C340.038 434.105 434.105 340.038 434.105 224C434.105 107.962 340.038 13.8949 224 13.8949C107.962 13.8949 13.8949 107.962 13.8949 224Z"
                        fill="#F1E2CC" />
                    <path
                        d="M405 224C405 323.964 323.964 405 224 405C124.036 405 43 323.964 43 224C43 124.036 124.036 43 224 43C323.964 43 405 124.036 405 224ZM56.2246 224C56.2246 316.66 131.34 391.775 224 391.775C316.66 391.775 391.775 316.66 391.775 224C391.775 131.34 316.66 56.2246 224 56.2246C131.34 56.2246 56.2246 131.34 56.2246 224Z"
                        fill="#F1E2CC" />
                    <path
                        d="M360 224C360 299.111 299.111 360 224 360C148.889 360 88 299.111 88 224C88 148.889 148.889 88 224 88C299.111 88 360 148.889 360 224ZM100.433 224C100.433 292.244 155.756 347.567 224 347.567C292.244 347.567 347.567 292.244 347.567 224C347.567 155.756 292.244 100.433 224 100.433C155.756 100.433 100.433 155.756 100.433 224Z"
                        fill="#F1E2CC" />
                </svg>
            </div>
            <div class="left-image">
                <img src="{{ asset('frontend') }}/assets/images/upcomming-left.png" alt="">
            </div>
            <div class="right-shape">
                <svg width="448" height="448" viewBox="0 0 448 448" fill="none">
                    <path
                        d="M448 224C448 347.712 347.712 448 224 448C100.288 448 0 347.712 0 224C0 100.288 100.288 0 224 0C347.712 0 448 100.288 448 224ZM13.8949 224C13.8949 340.038 107.962 434.105 224 434.105C340.038 434.105 434.105 340.038 434.105 224C434.105 107.962 340.038 13.8949 224 13.8949C107.962 13.8949 13.8949 107.962 13.8949 224Z"
                        fill="#F1E2CC" />
                    <path
                        d="M405 224C405 323.964 323.964 405 224 405C124.036 405 43 323.964 43 224C43 124.036 124.036 43 224 43C323.964 43 405 124.036 405 224ZM56.2246 224C56.2246 316.66 131.34 391.775 224 391.775C316.66 391.775 391.775 316.66 391.775 224C391.775 131.34 316.66 56.2246 224 56.2246C131.34 56.2246 56.2246 131.34 56.2246 224Z"
                        fill="#F1E2CC" />
                    <path
                        d="M360 224C360 299.111 299.111 360 224 360C148.889 360 88 299.111 88 224C88 148.889 148.889 88 224 88C299.111 88 360 148.889 360 224ZM100.433 224C100.433 292.244 155.756 347.567 224 347.567C292.244 347.567 347.567 292.244 347.567 224C347.567 155.756 292.244 100.433 224 100.433C155.756 100.433 100.433 155.756 100.433 224Z"
                        fill="#F1E2CC" />
                </svg>
            </div>
            <div class="right-image">
                <img src="{{ asset('uploads/newyear_image') }}/{{ $newyearoffer_50->first()->image }}" alt="">
            </div>
            <div class="section-title-text">
                <h2>{{ $newyearoffer_50->first()->title }}</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text">
                        <div class="shape-text">{{ $newyearoffer_50->first()->sub_title }}<div class="shape-single">
                                <div class="shape">
                                    <svg width="158" height="159" viewBox="0 0 158 159" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M156.059 58C146.681 24.5386 115.956 0 79.5 0C35.5934 0 0 35.5934 0 79.5C0 123.407 35.5934 159 79.5 159C117.749 159 149.689 131.988 157.285 96H147.228C139.817 126.526 112.306 149.193 79.5 149.193C41.0096 149.193 9.80698 117.99 9.80698 79.5C9.80698 41.0096 41.0096 9.80698 79.5 9.80698C110.488 9.80698 136.752 30.031 145.814 58H156.059Z"
                                            fill="url(#paint0_linear_62_180)" />

                                        <defs>
                                            <linearGradient id="paint0_linear_62_180" x1="78.6428" y1="0"
                                                x2="78.6428" y2="159" gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-color="#95CD2F" />
                                                <stop offset="1" stop-color="#63911F" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                {{ $newyearoffer_50->first()->persentage }}
                            </div>% Off</div>
                        <a class="upcoming-btn" href="product.html">Shop Now</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- end of themart-upcoming-offer-section -->
<!-- start of themart-special-product-section -->
<section class="themart-special-product-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="wpo-section-title">
                    <h2>Deals Of The Day</h2>
                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-6 col-12">
                <ul class="special-product">
                    <li>
                        <div class="product-item">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/assets/images/special-product-1.jpg" alt="">
                            </div>
                            <div class="text">
                                <h2><a href="product-single.html">Jewelry Sets</a></h2>
                                <div class="rating-product">
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <span>130</span>
                                </div>
                                <div class="price">
                                    <span class="present-price">$120.00</span>
                                    <del class="old-price">$200.00</del>
                                </div>
                                <div class="shop-btn">
                                    <a class="theme-btn-s2" href="product.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-12">
                <ul class="special-product">
                    <li>
                        <div class="product-item">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/assets/images/special-product-2.jpg" alt="">
                            </div>
                            <div class="text">
                                <h2><a href="product-single.html">White Shoe</a></h2>
                                <div class="rating-product">
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <span>150</span>
                                </div>
                                <div class="price">
                                    <span class="present-price">$100.00</span>
                                    <del class="old-price">$150.00</del>
                                </div>
                                <div class="shop-btn">
                                    <a class="theme-btn-s2" href="product.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end of themart-special-product-section -->

<!-- start of themart-trendingproduct-section -->
<section class="themart-trendingproduct-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="wpo-section-title">
                    <h2>Trending Products</h2>
                </div>
            </div>
        </div>
        <div class="trendin-slider owl-carousel">
            <div class="product-item">
                <div class="image">
                    <img src="{{ asset('frontend') }}/assets/images/trending-product/1.png" alt="">
                    <div class="tag new">New</div>
                </div>
                <div class="text">
                    <h2><a href="product-single.html">Pink Baby Shoes</a></h2>
                    <div class="rating-product">
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <span>130</span>
                    </div>
                    <div class="price">
                        <span class="present-price">$120.00</span>
                        <del class="old-price">$200.00</del>
                    </div>
                    <div class="shop-btn">
                        <a class="theme-btn-s2" href="product.html">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="product-item">
                <div class="image">
                    <img src="{{ asset('frontend') }}/assets/images/trending-product/2.png" alt="">
                    <div class="tag sale">Sale</div>
                </div>
                <div class="text">
                    <h2><a href="product-single.html">Earrings</a></h2>
                    <div class="rating-product">
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <span>120</span>
                    </div>
                    <div class="price">
                        <span class="present-price">$120.00</span>
                        <del class="old-price">$160.00</del>
                    </div>
                    <div class="shop-btn">
                        <a class="theme-btn-s2" href="product.html">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="product-item">
                <div class="image">
                    <img src="{{ asset('frontend') }}/assets/images/trending-product/3.png" alt="">
                    <div class="tag new">New</div>
                </div>
                <div class="text">
                    <h2><a href="product-single.html">Stylish Pink Bag</a></h2>
                    <div class="rating-product">
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <span>201</span>
                    </div>
                    <div class="price">
                        <span class="present-price">$130.00</span>
                        <del class="old-price">$180.00</del>
                    </div>
                    <div class="shop-btn">
                        <a class="theme-btn-s2" href="product.html">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="product-item">
                <div class="image">
                    <img src="{{ asset('frontend') }}/assets/images/trending-product/4.png" alt="">
                    <div class="tag sale">Sale</div>
                </div>
                <div class="text">
                    <h2><a href="product-single.html">Orange Top</a></h2>
                    <div class="rating-product">
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <span>310</span>
                    </div>
                    <div class="price">
                        <span class="present-price">$200.00</span>
                        <del class="old-price">$350.00</del>
                    </div>
                    <div class="shop-btn">
                        <a class="theme-btn-s2" href="product.html">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="product-item">
                <div class="image">
                    <img src="{{ asset('frontend') }}/assets/images/trending-product/5.png" alt="">
                    <div class="tag new">New</div>

                </div>
                <div class="text">
                    <h2><a href="product-single.html">Wireless Headphones</a></h2>
                    <div class="rating-product">
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <span>130</span>
                    </div>
                    <div class="price">
                        <span class="present-price">$120.00</span>
                        <del class="old-price">$200.00</del>
                    </div>
                    <div class="shop-btn">
                        <a class="theme-btn-s2" href="product.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of themart-trendingproduct-section -->

<!-- start of themart-highlight-product-section -->
<section class="themart-highlight-product-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="highlight-wrap">
                    <h2>Top Selling</h2>
                    <div class="product-card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/assets/images/top-selling/1.png" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="product.html">Yellow Ladies Bag </a></h3>
                            <div class="rating-product">
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <span>130</span>
                            </div>
                            <div class="price">
                                <span class="present-price">$120.00</span>
                                <del class="old-price">$200.00</del>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/assets/images/top-selling/2.png" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="product.html">Pink Shoes</a></h3>
                            <div class="rating-product">
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <span>130</span>
                            </div>
                            <div class="price">
                                <span class="present-price">$120.00</span>
                                <del class="old-price">$200.00</del>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/assets/images/top-selling/3.png" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="product.html">Parple Pant</a></h3>
                            <div class="rating-product">
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <span>130</span>
                            </div>
                            <div class="price">
                                <span class="present-price">$120.00</span>
                                <del class="old-price">$200.00</del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="highlight-wrap">
                    <h2>Recently added</h2>
                    @foreach ($products->take(3) as $product)
                    <div class="product-card">
                        <div class="card-image">
                            <div class="image">
                                <img height="111 " src="{{ asset('uploads/products') }}/{{ $product->preview_image }}" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="{{ route('product.details',$product->slug) }}">
                                @if (strlen($product->product_name) > 20)

                                {{ substr($product->product_name,'0','20') }}..</a>
                                @else
                                    {{ $product->product_name }}
                                @endif
                            </h3>
                            <div class="rating-product">
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <span>120</span>
                            </div>
                            <div class="price">
                                <span class="present-price"> {{ $product->after_disscount }}</span>
                                <del class="old-price">{{ $product->product_price }}</del>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="highlight-wrap">
                    <h2>Top Rated</h2>
                    <div class="product-card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/assets/images/top-rated/1.png" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="product.html">Kids Shoes</a></h3>
                            <div class="rating-product">
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <span>120</span>
                            </div>
                            <div class="price">
                                <span class="present-price">$120.00</span>
                                <del class="old-price">$150.00</del>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/assets/images/top-rated/2.png" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="product.html">Stylish Earrings</a></h3>
                            <div class="rating-product">
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <span>230</span>
                            </div>
                            <div class="price">
                                <span class="present-price">$150.00</span>
                                <del class="old-price">$200.00</del>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="card-image">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/assets/images/top-rated/3.png" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="product.html">Yellow Hats</a></h3>
                            <div class="rating-product">
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <span>130</span>
                            </div>
                            <div class="price">
                                <span class="present-price">$170.00</span>
                                <del class="old-price">$250.00</del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of themart-highlight-product-section -->
@php
    $subs = App\Models\Subscriber::all();
@endphp
<!-- start of themart-cta-section -->
<section class="themart-cta-section section-padding">
    <div class="container">
        <div class="cta-wrap" style="background-image: url({{ asset('uploads/subcribe') }}/{{ $subs->first()->image }})">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="cta-content">
                        <h2>{{ $subs->first()->title }}</h2>
                        <form method="POST" action="{{ route('newsletter.store') }}">
                            @csrf
                            <div class="input-1">
                                <input type="email" name="email" class="form-control" placeholder="Your Email...">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="submit clearfix">
                                    <button class="theme-btn-s2" type="submit">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of themart-cta-section -->
@endsection
