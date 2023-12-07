{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/HELPZ icon.png') }}">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100" style="background-color: #051922">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('assets/img/single.jpg') }}"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 667px" />
                            </div>
                            
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-2  text-black">

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <img src="{{ asset('assets/img/sereen-removebg-preview.png') }}" width="30%" alt="">
                                        </div>

                                        <h5 class="fw-normal mb-1 pb-1" style="letter-spacing: 1px;">Sign Up Now</h5>

                                        <div style="font-weight: bold">
                                            <x-input-label for="name" :value="__('Name')" /><br>
                                            <x-text-input id="name" class="block mt-1 w-full w-100" type="text"
                                                name="name" :value="old('name')" required autofocus
                                                autocomplete="name" style="border-radius:5px; height:35px; " />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: red; background-color:#ffe6e6"  />
                                        </div>

                                        <!-- Email Address -->
                                        <div style="font-weight: bold">
                                            <x-input-label for="email" :value="__('Email')" /><br>
                                            <x-text-input id="email" class="block mt-1 w-full w-100" type="email"
                                                name="email" :value="old('email')" required autocomplete="username" style="border-radius:5px; height:35px; " />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red; background-color:#ffe6e6"  />
                                        </div>
                                        <!-- phone -->
                                        <div style="font-weight: bold">
                                            <x-input-label for="phone" :value="__('phone')" /><br>
                                            <x-text-input id="phone" class="block mt-1 w-full w-100" type="phone"
                                                name="phone" :value="old('phone')" required autocomplete="username" style="border-radius:5px; height:35px; " />
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2" style="color: red; background-color:#ffe6e6"  />
                                        </div>

                                        <!-- Password -->
                                        <div style="font-weight: bold">
                                            <x-input-label for="password" :value="__('Password')" /><br>

                                            <x-text-input id="password" class="block mt-1 w-full w-100" type="password"
                                                name="password" required autocomplete="new-password" style="border-radius:5px; height:35px; "  />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red; background-color:#ffe6e6"  />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div style="font-weight: bold">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" /><br>

                                            <x-text-input id="password_confirmation" class="block mt-1 w-full w-100"
                                                type="password" name="password_confirmation" required
                                                autocomplete="new-password" style="border-radius:5px; height:35px; " />

                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red; background-color:#ffe6e6"  />
                                        </div><br>

                                        <div class="pt-1 mb-4 w-75 mx-auto text-center">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">SIGN UP</button>
                                        </div>

                                        <div class="flex items-center justify-end mt-4 mx-auto text-center">
                                            <a style="color: #393f81;" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                                {{ __('Already registered?') }}
                                            </a>
                                
                            
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>