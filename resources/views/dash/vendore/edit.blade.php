@extends('dash.master')

@section('title')
    Dashbored
@endsection
<link rel="stylesheet" href={{ asset('assets/css/stylee.css') }}>
@section('content')

<div class="content col col-lg-6">

    <div class="main">

        <section class="signup">
           
            <div class="container">
                <div class="signup-content">
                    <form method="post" action="{{route('logo.update',$data->id)}}" enctype="multipart/form-data" id="signup-form" class="signup-form">
                        @csrf
                        @method('PUT')
                        <h2 class="form-title mb-4" style="color:black; text-align: center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Edit Vendor</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" value="{{$data->name}}" name="name" id="name" placeholder="name"/>
                            <span style="color:red">@error('title'){{ $message }} @enderror</span><br><br>
                        </div>
                     
                        <div class="form-group">	
                            <input type="text" class="form-input" value="{{$data->desciption}}" name="desciption" id="desciption" placeholder="desciption"/>
                          
                        </div>
                      
                       
                        <div class="form-group mt-4">
                        
                            <input  name="logo" type="file" class="form-control white-input" id="inputPrice">
                            <img src="/images/{{ $data->logo }}" width="200px" class="mt-4">                            <span style="color:red">@error('image'){{ $message }} @enderror</span><br><br>
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Save" style="color:black;"/>

                         </div>
                     
                        
                          
                        
                    </form>
                </div>
            </div>
        </section>
    </div>




  
    
</div>



@endsection