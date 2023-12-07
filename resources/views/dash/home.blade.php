@extends('dash.master')

@section('title')
    Dashbored
@endsection

@section('content')
    
            <div class="tab-pane fade show active" id="tab_dashboard" role="tabpanel">
                <div class="row">
                    <div class="col col-lg-4">
                        <div class="funfact_item" style="background-image: url('assets/images/funfact/funfact_bg_1.png');"
                            data-aos="fade-up" data-aos-duration="1000">
                            <div class="item_content">
                                <h3>Total Products</h3>
                                <span>{{$productCount}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4">
                        <div class="funfact_item" style="background-image: url('assets/images/funfact/funfact_bg_2.png');"
                            data-aos="fade-up" data-aos-duration="1500">
                            <div class="item_content">
                                <h3>Total Orders</h3>
                                <span>{{$salesCount}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4">
                        <div class="funfact_item" style="background-image: url('assets/images/funfact/funfact_bg_3.png');"
                            data-aos="fade-up" data-aos-duration="2000">
                            <div class="item_content">
                                <h3>Order Money</h3>
                                <span>{{$totalMoney}}JOD</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="total_revenue" data-aos="fade-up" data-aos-duration="2000">
                    <div class="vd_title_wrap">
                        <h3>Total Revenue</h3>
                        {{-- <form action="#">
                                    <div class="select_option clearfix m-0">
                                       <select>
                                          <option data-display="Select">Nothing</option>
                                          <option value="1" selected>Last 1 Year</option>
                                          <option value="2">Last 2 Year</option>
                                          <option value="3">Last 3 Year</option>
                                          <option value="4">Last 4 Year</option>
                                       </select>
                                    </div>
                                 </form> --}}
                    </div>
                    <div class="vd_shadow">
                        <canvas id="revenue_chart"></canvas>
                    </div>
                </div>

                <div class="row">



                </div>


            </div>

         
        
      
@endsection
