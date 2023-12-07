@extends('layouts.master')
@section('title', 'cart')
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
    <!-- end search arewa -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section-cart breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>

                                </tr>
                            </thead>
                            <tbody>
                              
                                
                                @foreach ($cart as $item)
                                    @php
                                        if (isset($item->product)) {
                                            $discount = App\Models\Category::where('id', $item->product->category_id)
                                                ->get()
                                                ->first()->discount;
                                        } else {
                                            $discount = App\Models\Category::where('id', $item['product_category_id'])
                                                ->get()
                                                ->first()->discount;
                                        }
                                    @endphp
                                    <tr class="table-body-row">
                                        <td>
                                            <form method="POST"
                                                action="{{ route('deletecart', isset($item->product) ? $item->product->id : $item['id']) }}">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <button type="submit" class="btn btn-danger delete-product">Delete</button> --}}
                                                <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>

                                        {{-- <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a>
                                        </td> --}}
                                        <td class="product-image"><img width="200px" height="200px"
                                                src="{{ asset('images/' . (isset($item->product) ? $item->product->product_image : $item['image1'])) }}"
                                                alt=""></td>
                                        <td class="product-name">
                                            {{ isset($item->product) ? $item->product->product_name : $item['Name'] }}</td>
                                        <td class="product-price">JOD 
                                            {{ isset($item->product) ? $item->product->product_price * $item->quantity - ($item->product->product_price * ($discount / 100)) : $item['price'] * $item['quantity'] }}
                                        </td>
                                        <td class="product-quantity">
                                            <form method="POST"
                                                action="{{ route('updatecart', isset($item->product) ? $item->product->id : $item['id']) }}">
                                                @csrf
                                                @method('PATCH')



                                                <input type="number" name="quantity" id="actionInput"
                                                    value="{{ isset($item->product) ? $item->quantity : $item['quantity'] }}" />

                                                <button type="submit" class="btn btn-primary update-product"
                                                    hidden>Update</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>{{ $total_price }} JOD</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">

                            <a href="{{ route('showcheckout') }}" class="boxed-btn black">Check Out</a>
                        </div>
                    </div>

                    {{-- <div class="coupon-section">
                        <h3>Apply Coupon</h3>
                        <div class="coupon-form-wrap">
                            <form action="index.html">
                                <p><input type="text" placeholder="Coupon"></p>
                                <p><input type="submit" value="Apply"></p>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/hamad-removebg-preview.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/alghzawi-removebg-preview.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/mohammad-removebg-preview.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/the_farm-removebg-preview.png" alt="">
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->
@endsection
