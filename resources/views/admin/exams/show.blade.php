@extends('admin.layouts.admin')
@section('title' , 'exam show')
@section('content')

    {{--    --}}
    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <div class="row">
        @php
            $exam_date = $employment_items->exam_date;
                    $exam_date = verta($exam_date);
                    $exam_date = explode(' ' , $exam_date);
                    $exam_date = $exam_date[0];
        @endphp
        <div class="col-xl-12 col-md-12 mb-4 p-md-5">
            <div class="mb-4">
                <h5 class="font-weight-bold">
                    نمایش آزمون {{$employment_items->title}}
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
                        <th>تصویر</th>
                        <th>عملیات</th>


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
                                {{$item->Option1}}
                            </th>
                            <th>
                                {{$item->Option2}}
                            </th>
                            <th>
                                {{$item->Option3}}
                            </th>
                            <th>
                                {{$item->true_Option}}
                            </th>
                            <th class="col-md-1">
                                <div class="col-md-12">
                                    <div class="card align-items-center">
                                        <a href="{{url(env('Image_exams_path').$employment_items->slug.'/'.$exam_date.'/'.$item->image)}}">
                                            <img class="card-img" src="{{url(env('Image_exams_path').$employment_items->slug.'/'.$exam_date.'/'.$item->image)}}">
                                        </a>
                                    </div>
                                </div>
                            </th>
                            <th class="col-md-1">
                                <form action="{{route('admin.exams.destroy', $item->id)}}" method="post" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger col-md-12"> حذف </button>
                                </form>
                            </th>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a href="{{route('admin.exams.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>

            </div>
        </div>
    </div>


@endsection
