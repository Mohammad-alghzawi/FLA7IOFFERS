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
                <h3>Our Admins</h3>
                <a href="{{route('admin.create')}}"><button type="button" class="btn custom_btn"><i class="far fa-plus"></i> Add
                    Admins</button></a>
            </div>
            <div class="vd_shadow p-0">
                <div class="vd_table table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                {{-- <th>Password</th> --}}
                               
                              
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $item)
                                <tr>
                                    <td>{{ $item->id}}</td>
                                    <td><a href="#"><img src="{{ url('/images/' . $item->avatar) }}" width="100px"
                                        height="100px" alt="Avatar"></a></td>
                                   
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    {{-- <td>{{ $item->password}}</td> --}}
                                    
                                    
                                        {{-- <select>
                                            <option value="0">out stock</option>
                                            <option value="1">in stock</option>


                                        </select> --}}
                                    </td>

                                    <td>
                                        <ul class="btns_group ul_li">
                                            {{-- <li>
                                                <a href="{{ route('product.edit', $item->id) }}"><button type="submit"
                                                        class="bg_green">
                                                        <i class="fas fa-edit"></i>
                                                    </button></a>
                                            </li> --}}
                                            <li>
                                                <form action="{{ route('admin.destroy', $item->id) }}"
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
