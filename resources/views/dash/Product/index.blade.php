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
                <h3>Our Products</h3>
                <a href="{{route('product.create')}}"><button type="button" class="btn custom_btn"><i class="far fa-plus"></i> Add
                    Products</button></a>
            </div>
            <div class="vd_shadow p-0">
                <div class="vd_table table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    
                                   
                                    <td><a href="#"><img src="{{ url('/images/' . $item->product_image) }}" width="100px"
                                                height="100px" alt="Avatar"></a></td>

                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->product_description }}</td>
                                    <td>{{ $item->product_price }}</td>
                                    <td>{{ $item->category_id }}</td>
                                    <td>{{ $item->product_quantity }}</td>


                                    <td>{{ $item->product_status }}
                                        {{-- <select>
                                            <option value="0">out stock</option>
                                            <option value="1">in stock</option>


                                        </select> --}}
                                    </td>

                                    <td>
                                        <ul class="btns_group ul_li">
                                            <li>
                                                <a href="{{ route('product.edit', $item->id) }}"><button type="submit"
                                                        class="bg_green">
                                                        <i class="fas fa-edit"></i>
                                                    </button></a>
                                            </li>
                                            <li>
                                                <form action="{{ route('product.destroy', $item->id) }}"
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
