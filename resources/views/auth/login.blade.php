@extends('layouts.sign_up_layout')

@section('content')

<!--begin::Body-->
<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
    <!--begin::Form-->
    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
        <!--begin::Wrapper-->
        <div class="w-lg-500px p-10">
            <!--begin::Form-->
            <form class="form w-100" novalidate="novalidate"
                id="kt_sign_in_form" data-kt-redirect-url="#" method="POST" action="{{ route('login') }}">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-11">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                    <!--end::Title-->

                </div>
                <!--begin::Heading-->
                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                    <!--begin::Email-->
                    <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                    <!--end::Email-->
                </div>
                <!--end::Input group=-->
                <div class="fv-row mb-3">
                    <!--begin::Password-->
                    <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
                    <!--end::Password-->
                </div>
                <!--end::Input group=-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                    <div></div>
                    <!--begin::Link-->
                    <a href="#" class="link-primary">Forgot Password ?</a>
                    <!--end::Link-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Submit button-->
                <div class="d-grid mb-10">
                    <!-- <button type="submit" id="kt_sign_in_submit" class="btn btn-primary"> -->
                    <button type="submit" id="" class="btn btn-primary">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">Sign In</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator progress-->
                    </button>
                </div>
                <!--end::Submit button-->
                {{-- <!--begin::Sign up-->
                <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                <a href="{{ route('register') }}" class="link-primary">Sign up</a></div>
                <!--end::Sign up--> --}}
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Form-->
    <!--begin::Footer-->
    <div class="d-flex flex-center flex-wrap px-5">
        <!--begin::Links-->
        <div class="d-flex fw-semibold text-primary fs-base">
            <a href="#" class="px-5" target="_blank">Terms</a>
            <a href="#" class="px-5" target="_blank">Plans</a>
            <a href="#" class="px-5" target="_blank">Contact Us</a>
        </div>
        <!--end::Links-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Body-->

@endsection
