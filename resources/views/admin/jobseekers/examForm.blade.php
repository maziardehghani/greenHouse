@extends('admin.layouts.admin')
@section('title' , 'jobseekers')
@section('script')
    @endsection
@section('content')
    <!-- Content Row -->
    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5">
            <div class="mb-4">
                <h5 class="font-weight-bold">
                    نمایش آزمون
                </h5>
            </div>
            <div>
                <table class="table table-bordered table-striped text-center">

                    <thead>
                    <tr>
                        <th>عدد</th>
                        <th>سوال</th>
                        <th>گزینه یک</th>
                        <th>گزینه دو</th>
                        <th>گزینه سه</th>
                        <th class="text-success font-weight-bold">گزینه صحیح</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exam as $item)

                        <tr>
                            <th>
                                {{$loop->index+1}}
                            </th>
                            <th>
                                {{$item->Question}}
                            </th>
                            <th>
                                @if( $item->Option1 == $answers[$loop->index+1])
                                    <p class="text-white bg-danger border border-danger">{{$item->Option1}}</p>
                                    @else

                                    <p class="text-dark border border-dark"> {{$item->Option1}}</p>
                                @endif

                            </th>
                            <th>
                                @if( $item->Option2 == $answers[$loop->index+1])
                                    <p class="text-white bg-danger border border-danger">{{$item->Option2}}</p>
                                @else

                                    <p class="text-dark border border-dark">{{$item->Option2}}</p>
                                @endif
                            </th>
                            <th>
                                @if( $item->Option3 == $answers[$loop->index+1])
                                    <p class="text-white bg-danger border border-danger">{{$item->Option3}}</p>
                                @else

                                    <p class="text-dark border border-dark"> {{$item->Option3}}</p>
                                @endif
                            </th>
                            <th>
                                @if($item->true_Option == $answers[$loop->index+1])
                                    <p class="text-white bg-success border border-success">{{$item->true_Option}}</p>
                                @else
                                    <p class="text-dark border border-dark">{{$item->true_Option}}</p>
                                @endif

                            </th>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a href="{{route('admin.jobseekers.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </div>
            <div class="row">
                <form action="{{route('admin.jobseekers.update' , $jobseeker_id )}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <input class="form-control" type="number" name="grade" value="{{}}" >
                        <button type="submit" class="btn btn-primary mt-1 mr-5">ثبت</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
