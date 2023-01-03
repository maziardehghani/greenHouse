
@extends('home.layouts.home')
@section('title' , 'exam')

@section('script')
    <script>


    </script>
    @endsection
@section('content')

    <div class="container bg-light mt-5">
        <div id="countdown" class="countdown-timer fa-num sticky-top text-dark rounded text-center" data-countdown='{{$finish_time}}'></div>
        <form action="{{route('home.exam.sendQuestion' , $finish_time)}}" method="post">
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <input type="hidden" name="finish_time" value="{{$finish_time}}">
            @csrf
            @foreach($exams as $item)
            <div class="form-group ">
                <label class="text-muted">سوال : {{$loop->index+1}} </label>
                <input type="text"  class="form-control" readonly value="{{$item->Question}}">
                @if(!is_null($item->image))
                <img src="{{url(env('Image_exams_path').$examSlug.'/'.$examDate.'/'.$item->image)}}"  width="400" height="200" class="rounded">
                @endif
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$loop->index+1}}" id="Option1" value="{{$opt[$loop->index][0]}}">
                        <label class="form-check-label" for="gridRadios1">
                            {{$opt[$loop->index][0]}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$loop->index+1}}" id="Option2" value="{{$opt[$loop->index][1]}}">
                        <label class="form-check-label" for="gridRadios2">
                            {{$opt[$loop->index][1]}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$loop->index+1}}" id="Option3" value="{{$opt[$loop->index][2]}}">
                        <label class="form-check-label" for="gridRadios2">
                            {{$opt[$loop->index][2]}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$loop->index+1}}" id="Option4" value="{{$opt[$loop->index][3]}}">
                        <label class="form-check-label" for="gridRadios2">
                            {{$opt[$loop->index][3]}}
                        </label>
                    </div>
                </div>
            </div>
            @endforeach
            <input type="submit" class="btn btn-lg btn-primary" value="پایان آزمون">
        </form>
    </div>
    @endsection
