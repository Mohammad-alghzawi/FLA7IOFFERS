@extends('layouts.master')
@section('title', 'shop')
@section('content')

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section-shop breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Everything are Original</p>
                        <h1>Shop</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

           @if(@isset($allcategories))
           <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        @foreach ($allcategories as $item)
                            
                            <li style="background-color: #F28123; border: #F28123;">
                                <a style="color: white; text-decoration: none;" href="{{ asset('shop/' . $item->id) }}"
                                    onmouseover="this.style.color='black'" onmouseout="this.style.color='white'">
                                    {{ $item->title }}
                                </a>
                            </li>
                        @endforeach
                      
                    </ul>
                </div>
               
            </div>
           
            
            
        </div>

           @endif
           
            

            <p style="color:black">We found <strong class="text-brand"
                    style="color: orange">{{ $products->total() }}</strong> item for you!</p><br>
                
                    <form action="{{ route('search.products', ['id' => $searchid]) }}" method="GET">
                        <div class="input-group" style="border-radius: 20px; width: 220px;">
                            <input type="search" name="query" class="form-control rounded" style="border-radius: 20px 0 0 20px;background-color:white;border:1px solid grey;color:black" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text" style="border-radius: 0 20px 20px 0;">
                                <button type="submit" style="border: none; background: none;"><i class="fas fa-search"></i></button>
                            </span>
                        </div>
                    </form><br>

                    
                    
                    
                    

            <div class="row product-lists">
                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center {{ $item->category->name }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('productdetail', ['id' => $item->id]) }}"> <img
                                        src="{{ url('/images/' . $item->product_image) }}"></a>
                            </div>
                            <h3>{{ $item->product_name }}</h3>
                            <p class="product-price">
                                <span
                                    style="text-decoration: line-through; color: rgba(255, 0, 0, 0.763); font-size: 35px; display: inline-block; margin-bottom:5px;">{{ $item->product_price }}JOD</span>
                                <span
                                    style="font-size: 25px">{{ $item->product_price - ($item->product_price * $discount) / 100 }}JOD</span>

                                <span
                                    style="margin-left: 20px;  position: relative;
                                        bottom: 400px; right:15px"
                                    class="discount-circle">{{ $discount }}%</span>
                            </p>


                            <a href="{{ route('productdetail', ['id' => $item->id]) }}" class="cart-btn"><i
                                    class="fas fa-shopping-cart"></i>Read more</a>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4 col-md-6 text-center tools ">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="single-product.html"><img src="./assets/img/tol_1-removebg-preview.png" alt=""></a>
                                </div>
                                <h3>Handle scissors</h3>
                                <p class="product-price"> 12 JOD </p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center materials">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="single-product.html"><img src="./assets/img/fer3-removebg-preview.png" alt=""></a>
                                </div>
                                <h3>Fertilizer</h3>
                                <p class="product-price"> 35 JOD </p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center materials">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="single-product.html"><img src="./assets/img/image__31_-removebg-preview.png" alt=""></a>
                                </div>
                                <h3>Fertilizer</h3>
                                <p class="product-price"> 50 JOD</p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center materials">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="single-product.html"><img src="./assets/img/fer_1-removebg-preview.png" alt=""></a>
                                </div>
                                <h3>Fertilizer</h3>
                                <p class="product-price"> 25 JOD </p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center tools">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="single-product.html"><img src="./assets/img/tol_3-removebg-preview.png" alt=""></a>
                                </div>
                                <h3>Water hose</h3>
                                <p class="product-price"> 30 JOD </p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div> --}}




            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            @if ($products->onFirstPage())
                                <li><a href="#"></i>Prev</a></li>
                            @else
                                <li><a href="{{ $products->previousPageUrl() }}">Prev</i></a></li>
                            @endif

                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                                @if ($i == $products->currentPage())
                                    <li class="active"><a href="#">{{ $i }}</a></li>
                                @else
                                    <li><a href="{{ $products->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endfor

                            @if ($products->hasMorePages())
                                <li><a href="{{ $products->nextPageUrl() }}">Next</i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">

        <div class="container">

            <div class="row">



                <div class="col-lg-12">

                    <div class="logo-carousel-inner">
                        @foreach ($vendors as $vendor)
                            <div class="single-logo-item">
                                <img src="{{ url('/images/' . $vendor->logo) }}">
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- end logo carousel -->
@endsection
