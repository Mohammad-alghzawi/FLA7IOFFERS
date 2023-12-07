<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <section class="vh-100" style="background-color: #051922;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="{{ asset('assets/img/logindash.jpg') }}"
                            alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:600px" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-3  text-black">
      
                        <form method="POST" action="{{route('dash')}}">
                            @if (Session::has('success'))
                            <div class='alert alert-success'>{{session::get('success')}}</div>   
                            @endif
                            @if (Session::has('fail'))
                            <div class='alert alert-danger'>{{session::get('fail')}}</div>   
                            @endif
                            @csrf
      
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <img src="{{ asset('assets/img/sereen-removebg-preview.png') }}" width="40%" alt="">
                            </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Admin Login</h5>
      
                        <div class="form-outline mb-4" style="font-weight: bold">
                            <label class="form-label" for="form2Example17">Email address</label>
                          <input name="email" value="{{old('email')}}" style="border-radius:5px; height:40px; " type="email" id="email" class="form-control form-control-lg" />
                          <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>
      
                        <div class="form-outline mb-4" style="font-weight: bold">
                            <label class="form-label" for="form2Example27">Password</label>
                          <input name="password" style="border-radius:5px; height:40px; " type="password" id="password" class="form-control form-control-lg" />
                          <span class="text-danger">@error('password'){{$message}}@enderror</span>
                        </div>
      
                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                        </div>
      
                       
                       
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
