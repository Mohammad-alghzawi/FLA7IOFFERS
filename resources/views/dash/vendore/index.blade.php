@extends('dash.master')

@section('title')
    Dashbored
@endsection

@section('content')
    <div>
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

        <div class="trending_products">
            <div class="vd_title_wrap">
                <h3>Our Vendors</h3>
                <a href="{{ route('logo.create') }}"><button type="button" class="btn custom_btn"><i
                            class="far fa-plus"></i> Add
                        Vendors</button></a>
            </div>
            <div class="vd_shadow p-0">
                <div class="vd_table table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                
                                <th>name</th>
                                <th>description</th>
                                
                                <th>Edit/Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $vendor)
                                <tr>
                                    <td>{{ $vendor->id }}</td>
                                    <td><a href="#"><img src="{{ url('/images/' . $vendor->logo) }}" width="100px"
                                        height="100px" alt="Avatar"></a></td>
                                   
                                    <td>{{ $vendor->name }}</td>
                                    <td>{{ $vendor->desciption }}</td>
                                    

                                 
                                    


                                    <td>
                                        <ul class="btns_group ul_li">
                                            <li>
                                                <a href="{{ route('logo.edit', $vendor->id) }}"><button type="submit"
                                                        class="bg_green">
                                                        <i class="fas fa-edit"></i>
                                                    </button></a>
                                            </li>
                                            <li>
                                                <form action="{{ route('logo.destroy', $vendor->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg_orange">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
