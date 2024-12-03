@extends('layouts.admin')
@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div
            class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                <!--begin::Page Title-->
                <span class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    {{__('menu.dashboard')}}
                </span>
                <!--end::Page Title-->

                <!--begin::Actions-->

            </div>
            <!--end::Info-->

        </div>
    </div>
    <!--end::Subheader-->



    <!--begin::content-->
    <div class="d-flex flex-column-fluid" style="margin-bottom: 5px">
        <!--begin::Container-->
        <div class=" container-fluid ">

            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom" id="card_posts">
                        <div class="card-body">

                            <div class="row justify-content-center px-2   px-lg-10">
                                <div class="col-xl-12 col-xxl-10">

                                    <h2 style="font-weight: 600"> {!! __('dashboard.welcome_message_title') !!}
                                        @if(LaravelLocalization::getCurrentLocale() =='ar')
                                            {{setting()->site_name_ar}}
                                        @else
                                            {{setting()->site_name_en}}
                                        @endif
                                        </h2>
                                    <hr/>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">

                                            <!--begin::body-->
                                            <div class="my-5">
                                                <h5 style="line-height: 2rem">
                                                    {{__('dashboard.dear_user')}}
                                                    &nbsp;
                                                    <span class="text-warning">{{admin()->user()->name}}</span>&nbsp;,
                                                    &nbsp;
                                                    {!! __('dashboard.welcome_message_details') !!}
                                                </h5>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 20px">

                                        <div class="col-lg-2">

                                            @if(empty(Admin()->user()->photo))
                                                <img
                                                    src="{{asset('adminBoard/images/user.jpg')}}"
                                                    class="img-fluid img-thumbnail rounded-circle"
                                                    style="width: 120px;height: 120px;">
                                            @else
                                                <img
                                                    src="{{\Illuminate\Support\Facades\Storage::url(admin()->user()->photo)}}"
                                                    class="img-fluid img-thumbnail rounded-circle"
                                                    style="width: 120px;height: 120px;">
                                            @endif

                                        </div>
                                        <div class="col-lg-6 " style=" margin-top: 10px; font-weight: bolder;font-size: 15px">
                                            <p style="">{{__('dashboard.name')}}
                                                : {{admin()->user()->name}}</p>
                                            <p>{{__('dashboard.email')}} : {{admin()->user()->email}}</p>
                                            <p>{{__('users.last_login_at')}} : {{admin()->user()->last_login_at}}</p>
                                            <p>{{__('users.last_login_ip')}} : {{admin()->user()->last_login_ip}}</p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->

    </div>
    <!--end::content-->


@endsection
