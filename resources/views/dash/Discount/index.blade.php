@extends('dash.master')

@section('title')
    Dashbored
@endsection

@section('content')
    <div>
        @if (session('status'))
        <h6 class='alert alert-success'>{{session('status')}}</h6>
            
        @endif
        <div class="trending_products">
            <div class="vd_title_wrap">
                <h3>Our Discount</h3>
                <a href="{{ route('discount.create') }}"><button type="button" class="btn custom_btn"><i
                            class="far fa-plus"></i> Add
                        Discount</button></a>
            </div>
            <div class="vd_shadow p-0">
                <div class="vd_table table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                
                                <th>discount_code</th>
                                <th>percentage</th>
                                <th>expire_date</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($discounts as $item)
                                <tr>

                                    <td>{{ $item->discount_code }}</td>
                                    <td>{{ $item->percentage }}</td>
                                    <td>{{ $item->expire_date }}</td>


                                    <td>
                                        <ul class="btns_group ul_li">
                                            <li>
                                                <a href="{{ route('discount.edit', $item->id) }}"><button type="submit"
                                                        class="bg_green">
                                                        <i class="fas fa-edit"></i>
                                                    </button></a>
                                            </li>
                                            <li>
                                                <form action="{{ route('discount.destroy', $item->id) }}"
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
