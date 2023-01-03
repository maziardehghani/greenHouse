@extends('admin.layouts.admin')
@section('title' , 'employments conditions show')
@section('script')
    <script>
    </script>
@endsection
@section('content')
    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <!-- Content Row -->
    <div>
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 ">
            <div class="mb-4">
                <h5 class="font-weight-bold">
                    شرایط استخدام    ({{$employment_item_id->title}})
                </h5>
            </div>
            <hr>
            <div>
                <table class="table table-bordered table-striped text-center">

                    <thead>
                    <tr>
                        <th>عدد</th>
                        <th>عنوان</th>
                        <th>بخش شرایط</th>
                        <th>عملیات</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($conditions as $item)

                        <tr>
                            <th>
                                {{$loop->index+1}}
                            </th>
                            <th>
                                {{$item->title}}
                            </th>
                            <th>
                                {{$item->part_condition}}
                            </th>
                            <th>
                                <form action="{{route('admin.employmentConditions.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger"> حذف </button>
                                </form>
                            </th>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a href="{{route('admin.employmentConditions.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>

            </div>
        </div>
    </div>

@endsection
