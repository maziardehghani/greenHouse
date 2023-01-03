@extends('admin.layouts.admin')
@section('title' , 'messages')
@section('script')
<script>
    $('#agreement').click(function () {
        $('#btnSignUp').toggleClass('disabled');
    });

</script>
@endsection
@section('content')
    <!-- Content Body Start -->
    <div class="content-body">

        <!-- Page Headings Start -->
        <div class="row justify-content-between align-items-center mb-10">

            <!-- Page Heading Start -->
            <div class="col-12 col-lg-auto mb-20">
                <div class="page-heading">
                    <h3>برنامه <span>/ میل</span></h3>
                </div>
            </div><!-- Page Heading End -->

        </div><!-- Page Headings End -->

        <!--Mail Wrapper Start-->
        <div class="mail-wrapper">

            <!--Mail Menu Start-->
            <div class="mail-menu">
                <button class="button-compose-mail button button-danger button-round" data-toggle="modal" data-target="#modal-compose-mail">نوشتن نامه</button>
            </div>
            <!--Mail Menu End-->

            <!--Mail List Container Start-->
            <div class="mail-container">

                <!--Mail List Start-->
                <div class="mail-list">

                    @foreach($message_user_info as $item)
                    <!--Mail Start-->
                    <div class="mail">

                        <div class="left">
                           <button class="mail-button-starred"><i class="zmdi zmdi-star-outline"></i></button>
                        </div>

                        <div class="middle">

                            <div class="top">
                                <h4 class="name"><a>{{$item->nameAndFamily}}</a></h4>
                                <span class="date">{{verta($item->created_at)->day.'  '. verta($item->created_at)->formatWord('F').'  ' .verta($item->created_at)->year}} </span>
                            </div>

                            <div class="body">
                                <p>{{$item->message}} </p>
                            </div>

                            <div class="bottom">
                                <span class="badge badge-outline badge-primary">{{$item->phone}}</span>
                            </div>

                        </div>


                    </div>
                    <!--Mail End-->
                        @endforeach
                </div>
                <!--Mail List End-->

            </div>
            <!--Mail List Container End-->

        </div>
        <!--Mail Wrapper Start-->

        <!-- Modal -->
        <div class="compose-mail-modal modal fade" id="modal-compose-mail">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">پیام جدید</h5>
                        <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close"></i></button>
                    </div>

                    <div class="form">
                        <form action="#">
                            <div class="row">
                                <div class="col-12 mb-30">
                                    <input class="form-control" type="email" placeholder="ایمیل">
                                </div>

                                <div class="col-12 mb-3 mt-3">
                                    <textarea class="col-12 summernote"></textarea>
                                </div>
                                <div class="buttons-group col-12">
                                   <button type="button" class="button button-round button-primary">ارسال پیام</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div><!-- Content Body End -->

    <!-- Footer Section Start -->
    @endsection
