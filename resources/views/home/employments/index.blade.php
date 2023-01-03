@extends('home.layouts.home')
@section('title' , 'employments')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="alert alert-success" role="alert">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">شرکت همتا کشت سپاهان</h4>
                            <p>تولید کننده انواع محصولات گلخانه ای به منظور تکمیل نیروی انسانی مجرب و ماهر در صدد جذب نیرو در رشته های زیر به صورت آزمون وروودی میباشد</p>

                            <p class="mb-0">قبولی در آزمون صرفا ملزم به استخدام نمیباشد استخدام بعد از مصاحبه و تعیین سطح و ارزیابی جهت همکاری دعوت به عمل می آید</p>
                        </div>
                    </div>
                    <div class="listing-products">
                        <div class="listing-products-content">
                            <!-- start of tab-content -->
                            <div class="tab-content" id="sort-tabContent">
                                <!-- start of tab-pane -->
                                <div class="tab-pane fade show active" id="most-visited" role="tabpanel"
                                     aria-labelledby="most-visited-tab">
                                    <div class="ui-box pt-3 pb-0 px-0 mb-4">
                                        <div class="ui-box-content">
                                            <div class="row mx-0">
                                                @foreach($employment_items as $item)
                                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                    <!-- start of product-card -->
                                                    <div class="product-card">
                                                        <div class="product-thumbnail">
                                                            <a href="#">
                                                                <img style="width: 300px" src="{{url(env('Image_employment_items_path').$item->image)}}" alt="item">
                                                            </a>
                                                        </div>
                                                        <div class="product-card-body">
                                                            <div class="card-title text-center">{{$item->title}}</div>
                                                            <p class="card-text text-center">{{$item->explain}}</p>
                                                        </div>
                                                        <div class="product-card-footer">
                                                            <div class="d-flex align-items-center justify-content-between border-top mt-2 py-2">
                                                                <div class="product-actions">
                                                                    <div class="btn-group mb-3">
                                                                        <button type="button" class="btn btn-dark">گرایشات</button>
                                                                        <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false"></button>
                                                                        <div class="dropdown-menu">
                                                                            @foreach($attitudes as $attitude)
                                                                                @if($attitude->parent_id == $item->id)
                                                                                    <a class="dropdown-item" href="{{route('home.conditions' , ['empItem'=>$item->slug ,'attitude' => $attitude->slug])}}">{{$attitude->title}}</a>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of product-card -->
                                                </div>
                                                    @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of tab-content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
