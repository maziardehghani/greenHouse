@extends('admin.layouts.admin')
@section('title' , 'employments items index')
@section('content')
    {{--    --}}
    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5">
            <div class="mb-4">
                <h5 class="font-weight-bold">
                    ویرایش آزمون {{$employment_items->title}}
                </h5>
            </div>
            <div>
                @include('admin.sections.errors')
                <form action="{{route('admin.exams.update',$employment_item_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')


                    <table class="table table-bordered table-striped text-center">

                    <thead>
                    <tr>
                        <th>عدد</th>
                        <th>سوال</th>
                        <th>گزینه یک</th>
                        <th>گزینه دو</th>
                        <th>گزینه سه</th>
                        <th>گزینه صحیح</th>
                        <th>تصویر</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exam as $item)

                        <input type="hidden" name="id_questions[]" value="{{$item->id}}">
                        <tr>
                            <th>
                                {{$loop->index+1}}
                            </th>
                            <th>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="question[{{$loop->index+1}}]" id="Question" value="{{$item->Question}}" />
                                </div>

                            </th>
                            <th>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="option1[{{$loop->index+1}}]" id="option1" value="{{$item->Option1}}" />
                                </div>
                            </th>
                            <th>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="option2[{{$loop->index+1}}]" id="option2" value="{{$item->Option2}}" />
                                </div>
                            </th>
                            <th>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="option3[{{$loop->index+1}}]" id="option3" value="{{$item->Option3}}" />
                                </div>
                            </th>

                            <th>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="optionT[{{$loop->index+1}}]" id="optionT" value="{{$item->true_Option}}" />
                                </div>
                            </th>
                            <th>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="image[{{$loop->index+1}}]" class="custom-file-input" id="image" value="{{$item->image}}">
                                        <label class="custom-file-label text-truncate" for="image">{{$item->image}}</label>
                                    </div>
                                </div>

                            </th>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn btn-outline-primary mt-5" type="submit"> ثبت </button>
                </form>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a href="{{route('admin.exams.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>

            </div>
        </div>
    </div>


@endsection
