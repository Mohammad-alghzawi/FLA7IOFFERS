@extends('dash.master')

@section('title')
    Dashbored
@endsection
<link rel="stylesheet" href={{ asset('assets/css/stylee.css') }}>
@section('content')

    <div class="row gutters-sm userprofile">
        {{-- @if (session('status'))
        <h6 class='alert alert-success'>{{session('status')}}</h6>
            
        @endif --}}
        <div class="volunteer-form">
            @if (Session::has('status'))
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            title: 'Message',
                            text: "{{ Session::get('status') }}",
                            icon: 'success',
                            showConfirmButton: true,
                            confirmButtonText: "OK",
                        });
                    });
                </script>
            @endif
        </div>
        <div class="col-md-8 userprofile-two">
            {{-- @foreach($profiledash as $profile) --}}
                <div class="card mb-3">
                    <div class="card-body">
                        <div>
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <a href="#">
                                        <img src="{{ url('/images/' . $profiledash->avatar) }}" 
                                             width="100px" height="100px" alt="Avatar" 
                                             style="border-radius: 50%;">
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $profiledash->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $profiledash->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $profiledash->phone }}
                            </div>
                        </div>
                        <hr>
                        {{-- <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $profiledash->password }}
                            </div>
                        </div> --}}
                        {{-- <hr> --}}
                        <div>
                            <ul class="btns_group ul_li">
                                <li>
                                  <a href="{{route('profileAdmin.edit', $profiledash->id) }}"><button type="submit" class="bg_green">
                                        <i class="fas fa-edit"></i>
                                    </button></a>  
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            {{-- @endforeach --}}
        </div>
    </div>
    
   
@endsection
