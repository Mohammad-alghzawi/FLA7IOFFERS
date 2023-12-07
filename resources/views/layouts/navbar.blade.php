<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>@yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="../fla7i offers/assets/img/MMMMMM-removebg-preview.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href={{ asset('assetassets/css/all.min.css') }}>
    <!-- bootstrap -->
    <link rel="stylesheet" href={{ asset('assets/bootstrap/css/bootstrap.min.css') }}>
    <!-- owl carousel -->
    <link rel="stylesheet" href={{ asset('assets/css/owl.carousel.css') }}>
    <!-- magnific popup -->
    <link rel="stylesheet" href={{ asset('assets/css/magnific-popup.css') }}>
    <!-- animate css -->
    <link rel="stylesheet" href={{ asset('assets/css/animate.css') }}>
    <!-- mean menu css -->
    <link rel="stylesheet" href={{ asset('assets/css/meanmenu.min.css') }}>
    <!-- main style -->
    <link rel="stylesheet" href={{ asset('assets/css/main.css') }}>
    <!-- responsive -->
    <link rel="stylesheet" href={{ asset('assets/css/responsive.css') }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.html">
                                <img id="logom" src={{ asset('assets/img/sereen-removebg-preview.png') }}
                                    alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="{{ route('home') }}">Home</a>

                                </li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>

                                <li><a href="#">Shop</a>

                                    <ul class="sub-menu">
                                        @foreach ($categories as $item)
                                            <li><a href="{{ route('allproduct', $item->id) }}">{{ $item->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </li>

                                </li>
                                {{-- <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="cart.html"><i
                                                class="fas fa-shopping-cart"></i></a>

                                        <a href="./userprofile1.html"><i class="fa-solid fa-user"></i></a>
                                        <a href="/login"><button class="button-nav">Login</button></a>
                                        <a href="./login-signup.html"><button class="button-nav">Register</button></a>
                                        <a href="./login-signup.html"><button class="button-nav">Logout</button></a>
                                    </div>
                                </li> --}}
                                <li>
                                    @if (Auth::check())
                                        @php
                                            $cartCount = App\Models\Cart::where('user_id', Auth::user()->id)
                                                ->where('checkout_id', 1)
                                                ->count();
                                        @endphp
                                        <div style="display: flex; align-items: center;">
                                            <a href="{{ route('profile.edit', [Auth::user()]) }}"
                                                style="margin-right: 10px;"
                                                class="nav-item nav-link nav-sticky profilee ">{{ Auth::user()->name }}</a>
                                            <form method="POST" style="margin-right: 10px;"
                                                class="nav-item nav-link nav-sticky header-icons"
                                                action="{{ route('logout') }}">
                                                @csrf
                                                <a href="./login-signup.html"
                                                    onclick="event.preventDefault(); this.closest('form').submit();"><button
                                                        class="button-nav">Logout</button></a>
                                                <a class="shopping-cart" href="{{ route('cartt') }}"><i
                                                        class="fas fa-shopping-cart"></i><span class="ml-1"
                                                        style="font-size: 15px; vertical-align: middle;  color:white;">({{ $cartCount }})</span></a>

                                            </form>
                                        </div>
                                    @else
                                        @php
                                            $cart = session('cart');
                                            $cartCount = is_array($cart) ? count($cart) : 0;
                                        @endphp
                                        {{-- <a href="/login" class="nav-item nav-link nav-sticky">Login</a> --}}
                                        <a href="/login"><button class="button-nav">Login</button></a>
                                        <a href="/register"><button class="button-nav">Register</button></a>
                                        {{-- <a href="/register" class="nav-item nav-link nav-sticky">Register</a> --}}
                                        <a class="shopping-cart" href="{{ route('cartt') }}"><i
                                                class="fas fa-shopping-cart"></i><span class="ml-1"
                                                style="font-size: 15px; vertical-align: middle;  color:white;">({{ $cartCount }})</span></a>
                                    @endif
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
