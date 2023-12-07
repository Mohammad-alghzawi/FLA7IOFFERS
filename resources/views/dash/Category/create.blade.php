@extends('dash.master')

@section('title')
    Dashbored
@endsection
<link rel="stylesheet" href={{ asset('assets/css/stylee.css') }}>
@section('content')

<div class="content col col-lg-6">

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data" id="signup-form" class="signup-form">
                        @csrf
                        @method('post')
                        <h2 class="form-title mb-4" style="color:black; text-align: center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Add category</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="title" id="title" placeholder="title"/>
                            <span style="color:red">@error('title'){{ $message }} @enderror</span><br><br>
                        </div>
                     
                        <div class="form-group">	
                            <input type="text" class="form-input" name="discount" id="discount" placeholder="discount"/>
                            <span style="color:red">@error('discount'){{ $message }} @enderror</span><br><br>

                        </div>
                      
                       
                        <div class="form-group mt-4">
                        
                            <input  name="image" type="file" class="form-control white-input" id="inputPrice">
                            <span style="color:red">@error('image'){{ $message }} @enderror</span><br><br>
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Add" style="color:black;"/>

                         </div>
                     
                        
                          
                        
                    </form>
                </div>
            </div>
        </section>
    </div>




  
    
</div>



@endsection

