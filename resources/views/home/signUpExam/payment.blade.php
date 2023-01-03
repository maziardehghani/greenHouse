@extends('home.layouts.home')
@section('title' , 'payment')
@section('content')


    <div class="container">
        @if(session('msg'))
            {!! session('msg') !!}
        @endif
    <div class="row">
        <div class="col-xl-9 col-lg-8 mb-lg-0 mb-4">
            <!-- start of box => payment-methods -->
            <div class="ui-box bg-white payment-methods mb-5">
                <div class="ui-box-title">شیوه پرداخت</div>
                <div class="ui-box-content">
                    <!-- start of custom-radio-outline -->
                    <form action="{{route('home.payment')}}" method="post">
                        @csrf
                        <div class="custom-radio-outline">
                            <input type="radio" class="custom-radio-outline-input" name="checkoutPayment"
                                   id="checkoutPayment01">
                            <label for="checkoutPayment01">
                                        <span class="label">
                                            <span class="icon"><i class="ri-secure-payment-fill"></i></span>
                                            <span class="detail">
                                                <span class="title">پرداخت اینترنتی</span>
                                                <span class="subtitle">آنلاین با تمامی کارت‌های بانکی</span></span>
                                 </span>
                            </label>
                            <div class="checkout-bill-row checkout-bill-action">
                                <button type="submit" class="btn btn-block btn-primary">ادامه فرایند خرید</button>
                            </div>
                        </div>
                    </form>

                    <!-- end of custom-radio-outline -->
                </div>
            </div>
            <!-- end of box => payment-methods -->
        </div>
    </div>
</div>

    @endsection
