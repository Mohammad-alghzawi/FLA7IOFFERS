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
                    <form method="post" action="{{route('discount.store')}}" enctype="multipart/form-data" id="signup-form" class="signup-form">
                        @csrf
                        @method('post')
                        <h2 class="form-title mb-4" style="color:black; text-align: center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Add discount</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="discount_code" id="discount_code" placeholder="discount_code"/>
                            <span style="color:red">@error('title'){{ $message }} @enderror</span><br><br>
                        </div>
                     
                        <div class="form-group">	
                            <input type="text" class="form-input" name="percentage" id="percentage" placeholder="percentage"/>
                          
                        </div>
                        <div class="form-group">	
                            <input type="date" class="form-input" name="expire_date" id="expire_date" placeholder="expire_date"/>
                          
                        </div>
                      
                       
                        <div class="form-group mt-4">
                        
                            
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Add" style="color:black;"/>

                         </div>
                     
                        
                          
                        
                    </form>
                </div>
            </div>
        </section>
    </div>




  
    
</div>



@endsection

