@extends('home.layouts.home')
@section('title' , 'conditions')

@section('content')
        <div id="conditions" class="container bg-light">
            <main class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <!-- start of product-comments -->
                            <div class="product-tab-content product-comments tab-content pb-2 mb-4">
                                <div class="product-tab-title mb-0">
                                    <h2>شرایط و مهارت مورد نیاز</h2>
                                    <h3 class="subtitle">{{$employment_item->title}}</h3>
                                    <hr>
                                </div>
                                <div class="row mb-5">
                                    <div class="pt-1">
                                        <div class="fa-num">
                                            <!-- start of params-list -->
                                            <div>
                                                <h6 class="params-list-title mt-3">مهارت مورد نیاز :</h6>
                                                <ul class="mt-5">
                                                    @foreach($conditions as $condition)
                                                        @if($condition->getRawOriginal('part_condition')==2)
                                                    <li class="text-muted mb-2 mr-5">
                                                        {{$condition->title}}
                                                    </li>
                                                        @endif
                                                        @endforeach
                                                </ul>
                                            </div>
                                            <div>
                                                <h6 class="params-list-title mt-3">شرایط کلی :</h6>
                                                <ul class="mt-5">
                                                    @foreach($conditions as $condition)
                                                        @if($condition->getRawOriginal('part_condition')==1)
                                                    <li class="text-muted mb-2 mr-5">
                                                        {{$condition->title}}
                                                    </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <!-- end of params-list -->
                                        </div>
                                        <!-- end of params-list -->

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end of product-comments -->
                    </div>
                </div>
            </main>
            <a href="{{route('home.signUp', ['attitude'=>$employment_item->slug , 'empItem'=>$employment_item->parent->slug])}}"  class="btn btn-primary btn-block" >ادامه</a>
        </div>




@endsection
