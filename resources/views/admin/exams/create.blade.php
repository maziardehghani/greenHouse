@extends('admin.layouts.admin')
@section('title' , 'employments items create')
@section('script')
    <script>
        $('#image').change(function () {

            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        });

        $("#czContainer").czMore();

    </script>
    @endsection
@section('content')
<!-- Content Row -->
@if(session('msg'))
    {!! session('msg') !!}
@endif
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 ">
        <div class="mb-4">
            <h5 class="font-weight-bold">
               طراحی سوالات آزمون
            </h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{route('admin.exams.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-3 mt-4">
                <label for="employment_item_id">استخدام مورد نظر </label>
                <select class="form-control" id="employment_item_id" name="employment_item_id" >
                    @foreach($employment_item_parents as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
                </select>
            </div>
            <div id="czContainer">
                <div id="first">
                    <div class="form-group col-md-12 mt-4">
                            <div class="recordset">
                                <small class="form-text ">سوال:</small>
                                <input class=" form-control border border-dark " type="text" name="questions[]" id="questions" />
                                <div class="form-row col-md-3">
                                    <small class="form-text ">گزینه یک:</small>
                                    <input class="form-control mt-2 border border-dark" type="text" name="option1[]" id="option1" />
                                    <small class="form-text ">گزینه دو:</small>
                                    <input class="form-control mt-2 border border-dark" type="text" name="option2[]" id="option2" />
                                    <small class="form-text ">گزینه سه:</small>
                                    <input class="form-control mt-2 border border-dark" type="text" name="option3[]" id="option3" />
                                    <small class="form-text text-success ">گزینه صحیح:</small>
                                    <input class="form-control mt-2 border border-success text-dark" type="text" name="true_option[]" id="true_option" />
                                </div>
                             </div>
                        <div class="col-md-12 mt-1">
                            <hr>
                            <p>تصویر سوال</p>
                        </div>
                        <div class="form-group col-md-3 mt-4">
                            <label for="image"> انتخاب تصویر :</label>
                            <div class="custom-file">
                                <input type="file" name="image[]" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="image"> انتخاب فایل </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn btn-outline-primary mt-5" type="submit"> ثبت </button>
            <a href="{{route('admin.exams.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>
</div>
    @endsection
