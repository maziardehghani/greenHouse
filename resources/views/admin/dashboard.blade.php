@extends('admin.layouts.admin')
@section('title')
dashboard
@endsection
@section('content')
    @php
    $v = verta();

    @endphp
    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>داشبورد <span>/  </span></h3>
            </div>
        </div><!-- Page Heading End -->
        <!-- Page Button Group Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-date-range">
                <input type="text" class="form-control text-center bg-gray" value="{{$v->day.'  '. $v->formatWord('F').'  ' .$v->year}}" readonly>
            </div>
        </div><!-- Page Button Group End -->




    </div>
    <!-- Page Headings End -->
    @endsection
