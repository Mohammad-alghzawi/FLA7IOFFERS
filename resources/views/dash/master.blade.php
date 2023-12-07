<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- favicon icon -->
    <link rel="shortcut icon" href={{ asset('assets/images/icons/favicon.ico') }} type="image/x-icon">

    <!-- Include fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Include bootstrap CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/bootstrap.min.css') }}>

    <!-- Include aos CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/aos.css') }}>

    <!-- Include magnific-popup CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/magnific-popup.css') }}>

    <!-- Include nice-select CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/nice-select.css') }}>

    <!-- Include slick-theme CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/slick-theme.css') }}>

    <!-- Include slick CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/slick.css') }}>

    <!-- Include stylesheet CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }}>






</head>

<body>
    <!-- body wrap start -->
    <div class="body-wrap overflow-hidden">
        <!-- back-to-top start -->
        <div class="backtotop">
            <a href="#!" class="scroll">
                <i class="fas fa-arrow-up fw-bold"></i>
            </a>
        </div>
        <!-- back-to-top end -->

       

        <!-- main body start -->
        <main>
            <!-- sidebar section start -->
            <section class="sidebar_section">
                <div class="sidebar_content_wrap">
                    <div class="container">
                        <div class="row">
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                                aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header align-items-center">
                                    <h5 class="mb-0">Organic Products</h5>
                                    <button type="button" class="btn-close text-reset text-end"
                                        data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <div class="prdc_ctg_product_content mt-1 d-flex align-items-center">
                                        <div
                                            class="prdc_ctg_product_img d-flex justify-content-center align-items-center me-3">
                                            <img src={{ asset('assets/images/category/cat6.png') }}
                                                alt="image_not_found">
                                        </div>
                                        <div class="prdc_ctg_product_text">
                                            <div class="prdc_ctg_product_title my-2">
                                                <h5>Organic Cabbage</h5>
                                            </div>
                                            <div class="prdc_ctg_product_price mt-1 product_price">
                                                <span class="sale_price pe-1">$50.00</span>
                                                <del>$70.00</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prdc_ctg_product_content mt-1 d-flex align-items-center">
                                        <div
                                            class="prdc_ctg_product_img d-flex justify-content-center align-items-center me-3">
                                            <img src={{ asset('assets/images/category/cat7.png') }}
                                                alt="image_not_found">
                                        </div>
                                        <div class="prdc_ctg_product_text">
                                            <div class="prdc_ctg_product_title my-2">
                                                <h5>Organic Cabbage</h5>
                                            </div>
                                            <div class="prdc_ctg_product_price mt-1 product_price">
                                                <span class="sale_price pe-1">$40.00</span>
                                                <del>$60.00</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prdc_ctg_product_content mt-1 d-flex align-items-center">
                                        <div
                                            class="prdc_ctg_product_img d-flex justify-content-center align-items-center me-3">
                                            <img src={{ asset('assets/images/category/cat8.png') }}
                                                alt="image_not_found">
                                        </div>
                                        <div class="prdc_ctg_product_text">
                                            <div class="prdc_ctg_product_title my-2">
                                                <h5>Organic Cabbage</h5>
                                            </div>
                                            <div class="prdc_ctg_product_price mt-1 product_price">
                                                <span class="sale_price pe-1">$70.00</span>
                                                <del>$90.00</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="total_price">
                                        <ul class="ul_li_block mb_30 clearfix">
                                            <li>
                                                <span>Subtotal:</span>
                                                <span>$215</span>
                                            </li>
                                            <li>
                                                <span>Vat 5%:</span>
                                                <span>$10.75</span>
                                            </li>
                                            <li>
                                                <span>Discount 15%:</span>
                                                <span>- $32.25</span>
                                            </li>
                                            <li>
                                                <span>Total:</span>
                                                <span>$191.8875</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sidebar_btns">
                                        <ul class="btns_group ul_li_block clearfix">
                                            <li><a href="cart.html">View Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- sidebar section end -->

            <!-- Breadcrumb section start -->
            <section class="breadcrumb_sec_1 position-relative">
                <div class="breadcrumb_wrap sec_space_mid_small"
                    style="background-image: url('{{ asset('assets/images/breadcrumb/breadcrumb1.png') }}');">
                    <div class="breadcrumb_cont text-center">
                        <div class="breadcrumb_title">
                            <h2 class="text-white text-uppercase">Dashboard</h2>
                        </div>
                        <ul
                            class="list-unstyled breadcrumb_item d-flex justify-content-center align-items-center text-white">
                            <li><a href="{{route('home')}}"><i class="fas fa-home active"></i>Home</a></li>
                            <li><i class="fas fa-chevron-right"></i>Vendor Dashboard</li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb section end -->

            <!-- vendor_dashboard_section - start
                  ================================================== -->
            <section class="vendor_dashboard_section bg_gray" data-aos="fade-up" data-aos-duration="2000">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-3">
                            <div class="vd_tab_area">
                                
                                <div class="vd_space">
                                    <div class="vd_info_wrap text-center">
                                        <div class="vd_image">
                                            <div class="image_wrap">
                                                <img style="height:160px" src={{ asset('assets/img/sereen-removebg-preview.png') }}
                                                    alt="image_not_found">
                                            </div>
                                           
                                        </div>
                                        {{-- <h2 class="vd_mane">mohammad</h2>
                                        <span class="vd_mail"><a href="#!">vicentgeorg@gmail.com</a></span> --}}
                                      
                                    </div>
                                </div>

                                <ul class="vd_tab_nav nav ul_li_block" role="tablist">
                                    <li>
                                        <button class="{{ request()->is('dash*') ? 'active' : '' }}" >
                                            <a href="{{route('dash.index')}}" style="color: rgb(25, 24, 24) ;">Dashboard</a>
                                        </button>
                                    </li>
                                    {{-- <li>
                                        <button data-bs-toggle="tab" data-bs-target="#tab_products" type="button"
                                            role="tab" aria-selected="false">
                                            Products
                                        </button>
                                    </li> --}}

                                    <li>
                                        {{-- <button data-bs-toggle="tab" data-bs-target="#tab_categories" type="button"
                                            role="tab" aria-selected="false">
                                            categories
                                        </button> --}}
                                        <button class="{{ request()->is('category*') ? 'active' : '' }}" >
                                            <a href="{{route('category.index')}}"style="color: rgb(25, 24, 24) ;">Category</a>
                                        </button>
                                        
                                    </li>
                                    <li>
                                        {{-- <button data-bs-toggle="tab" data-bs-target="#tab_orders" type="button"
                                            role="tab" aria-selected="false">
                                            Orders
                                        </button> --}}
                                        <button class="{{ request()->is('product*') ? 'active' : '' }}" >
                                            <a href="{{route('product.index')}}"style="color: rgb(25, 24, 24) ;">Product</a>
                                        </button>
                                        
                                    </li>
                                    <li>
                                        <button class="{{ request()->is('users*') ? 'active' : '' }}" >
                                            <a href="{{route('users.index')}}"style="color: rgb(25, 24, 24) ;">User</a>
                                        </button>
                                      
                                    </li>
                                    <li>
                                        <button class="{{ request()->is('admin*') ? 'active' : '' }}" >
                                            <a href="{{route('admin.index')}}"style="color: rgb(25, 24, 24) ;">Admin</a>
                                        </button>
                                       
                                    </li>
                                    <li>
                                        <button class="{{ request()->is('logo') ? 'active' : '' }}" >
                                            <a href="{{route('logo.index')}}"style="color: rgb(25, 24, 24) ;">Vendor</a>
                                        </button>
                                       
                                    </li>
                                    {{-- <li>
                                        <button class="{{ request()->is('discount*') ? 'active' : '' }}" >
                                            <a href="{{route('discount.index')}}"style="color: rgb(25, 24, 24) ;">Discount</a>
                                        </button>
                                       
                                    </li> --}}

                                    <li>
                                        {{-- <button data-bs-toggle="tab" data-bs-target="#tab_profile" type="button"
                                            role="tab" aria-selected="false">
                                            Profile
                                        </button> --}}
                                        <button class="{{ request()->is('profileAdmin*') ? 'active' : '' }}" >
                                            <a href="{{route('profileAdmin.index')}}"style="color: rgb(25, 24, 24) ;">Profile</a>
                                        </button>
                                        
                                    </li>
                                    
                                    <li>
                                        <a href="{{route('logoutt')}}">Logout</a>
                                    </li>
                                </ul>

                               
                            </div>
                        </div>




                        
                        <div class="col col-lg-9">
                            <div class="tab-content">


                                @yield('content')





                            </div>
                        </div>
                        <!-- Include jquery js -->
                        <script src={{ asset('assets/js/jquery.min.js') }}></script>

                        <!-- Include bootstrap-bundle js -->
                        <script src={{ asset('assets/js/bootstrap.bundle.min.js') }}></script>

                        <!-- Include aos js -->
                        <script src={{ asset('assets/js/aos.js') }}></script>

                        <!-- Include chart js -->
                        <script src={{ asset('assets/js/chart.js') }}></script>

                        <!-- Include jquery-magnific-popup js -->
                        <script src={{ asset('assets/js/magnific-popup.min.js') }}></script>

                        <!-- Include nice-select js -->
                        <script src={{ asset('assets/js/nice-select.min.js') }}></script>

                        <!-- Include jquery-countdown js -->
                        <script src={{ asset('assets/js/countdown.min.js') }}></script>

                        <!-- Include slick js -->
                        <script src={{ asset('assets/js/slick.min.js') }}></script>

                        <!-- Include custom js -->
                        <script src={{ asset('assets/js/custom.js') }}></script>

                        

</body>

</html>
