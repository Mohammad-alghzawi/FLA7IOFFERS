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
                    <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data" id="signup-form" class="signup-form">
                        @csrf
                        @method('post')
                        <h2 class="form-title mb-4" style="color:black; text-align: center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Add user</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="name"/>
                            <span style="color:red">@error('name'){{ $message }} @enderror</span><br><br>
                        </div>
                     
                        <div class="form-group">	
                            <input type="text" class="form-input" name="email" id="email" placeholder="email"/>
                            <span style="color:red">@error('email'){{ $message }} @enderror</span><br><br>

                        </div>
                        <div class="form-group">	
                            <input type="text" class="form-input" name="phone" id="phone" placeholder="phone"/>
                            <span style="color:red">@error('phone'){{ $message }} @enderror</span><br><br>

                        </div>
                        
                        <div class="form-group">	
                            <input type="password" class="form-input" name="password" id="password" placeholder="password"/>
                            <span style="color:red">@error('password'){{ $message }} @enderror</span><br><br>

                        </div>
                      
                       
                        <div class="form-group mt-4">
                        
                            {{-- <input  name="avatar" type="file" class="form-control white-input" id="inputPrice"> --}}
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

