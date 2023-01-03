@extends('admin.layouts.admin')
@section('title' , 'employments items create')
@section('script')
    <script>

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
                    ویرایش استخدام({{$employment_item->title}})
                </h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{route('admin.employmentConditions.update',$employment_item->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="">

                    @foreach($conditions as $item)
                        <div>شرط استخدام(
                            {{$loop->index+1}})
                            <div class="form-group mt-5">
                                <input type="hidden" name="id_conditions[]" value="{{$item->id}}">

                                <input class="form-control" type="text" name="conditions[]" id="conditions" value="{{$item->title}}" />
                            </div>
                        </div>
                        <div class="form-group col-md-3 mt-4">
                           بخش شرایط:
                            <select class="form-control" id="part_condition" name="part_condition[]" >
                                @if($item->getRawOriginal('part_condition') == 1)
                                <option value="1" selected>شرایط کلی</option>
                                <option value="2" >شرایط مورد نیاز</option>
                                    @else
                                    <option value="1" >شرایط کلی</option>
                                    <option value="2" selected>شرایط مورد نیاز</option>
                                @endif


                            </select>

                        </div>
                        <hr class="border border-dark">
                    @endforeach

                    <button class="btn btn btn-outline-primary mt-5" type="submit"> ثبت </button>
                    <a href="{{route('admin.employmentConditions.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
                </div>
            </form>
        </div>
    </div>
@endsection
