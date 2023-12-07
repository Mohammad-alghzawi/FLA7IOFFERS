@extends('layouts.master')
@section('title','ContactUs')
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
<div class="breadcrumb-section-contact breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Get 24 hours Support</p>
                    <h1>Contact us</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Get in Touch with Us</h2>
                    <p>we will be so happy to communicate with us </p>
                </div>
                 <div id="form_status"></div>
                <div class="contact-form">

                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
<form method="POST" action="{{ route('contact.us.store') }}" id="contactUSForm">
                            {{ csrf_field() }}
                        <p>
                            {{-- <input type="text" placeholder="Name" name="name" id="name"> --}}
                            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            {{-- <input type="email" placeholder="Email" name="email" id="email"> --}}
                            <input type="text" name="email"  placeholder="Email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                        </p>
                        <p>
                            {{-- <input type="tel" placeholder="Phone" name="phone" id="phone"> --}}
                            <input type="text" name="phone"  placeholder="Phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                            {{-- <input type="text" placeholder="Subject" name="subject" id="subject"> --}}
                            <input type="text" name="subject"  placeholder="Subject" value="{{ old('subject') }}">
                            @if ($errors->has('subject'))
                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                            @endif
                        </p>
                        <p>
                            {{-- <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
                        <input type="hidden" name="token" value="FsWga4&@f6aw" /> --}}
                        <textarea name="message" rows="3" >{{ old('message') }}</textarea>
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                        <p><input type="submit" value="Submit"></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Shops Address</h4>
                        <p>Online shops</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Shops Hours</h4>
                        <p>sun - Thu: 8 am to 6 PM <br> Fri - Sat: 1pm to 6 PM </p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: +962 797060670 <br> Email: mohd.a.ghzawi@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact form -->



<!-- logo carousel -->
<div class="logo-carousel-section">
    
    <div class="container">
        
        <div class="row">
           
            
            
            <div class="col-lg-12">
               
                <div class="logo-carousel-inner">
                    @foreach ($vendors as $vendor ) 
                    <div class="single-logo-item">
                        <img src="{{ url('/images/' . $vendor->logo) }}" >
                    </div>
                    {{-- <div class="single-logo-item">
                        <img src="assets/img/company-logos/alghzawi-removebg-preview.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/mohammad-removebg-preview.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/the_farm-removebg-preview.png" alt="">
                    </div> --}}

                    @endforeach
                </div>
                
            </div>
            
        </div>
       
    </div>
   
</div>
<!-- end logo carousel -->
@endsection