@extends('layouts.master')
@section('title', 'home')
@section('content')
    <x-app-layout>
        <div class="hero overlay"
            style="  background-image: url('{{ asset('assets/img/cart1.jpg') }}'); height: 400px; background-size: cover; background-repeat: no-repeat;">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 text-center ">
                        <h1 class="heading mt-6 mb-2"
                            style="margin-top:200px; font-weight: bolder;font-size:50px; color:white" data-aos="fade-up">Your
                            Profile</h1>
                    </div>
                </div>
            </div>
        </div>

        {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div>
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w">
                        {{-- @include('profile.partials.update-password-form') --}}
                        <h3 style="text-align:center">My Orders</h3>
                        <div style="margin: 40px 20%;">
                            <table class="table table-active">
                                <thead>
                                    <tr>
                                        <th scope="col">Order Number</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Order Products</th>
                                        <th scope="col">Order Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($checkouts as $checkout)
                                        <tr>
                                            <th scope="row">{{ $checkout->id }}</th>
                                            <td>{{ $checkout->created_at }}</td>
                                            <td>
                                                @foreach ($products as $product)
                                                    @foreach ($product as $index => $value)
                                                        @if ($checkout->id == $index)
                                                            {{ $value }} <br/>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            <td>{{ $checkout['total price'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
