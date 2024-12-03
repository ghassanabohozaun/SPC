@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('user.update')}}" method="POST"
          id="form_user_update"
          enctype="multipart/form-data">
        @csrf
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div
                class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{!! route('users') !!}" class="text-muted">
                                {{__('menu.users')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{__('users.update_users')}}
                            </a>
                        </li>

                    </ul>

                    <!--end::Actions-->
                </div>
                <!--end::Info-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">

                    <button type="submit"
                            class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                        <i class="fa fa-save"></i>
                        {{__('general.save')}}
                    </button>

                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->


        <!--begin::content-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container-fluid ">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0" id="card_settings_store">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">

                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">

                                                <!--begin::body-->
                                                <div class="my-5">

                                                    <!--begin::Group-->
                                                    <div class="d-none form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            ID
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input value="{{$user->id}}"
                                                                   class="form-control  form-control-lg"
                                                                   name="id" id="id" type="hidden"
                                                                   autocomplete="off"/>
                                                            <input type="hidden" name="hidden_photo"
                                                                   value="hidden_photo">

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{__('users.photo')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div
                                                                class="image-input image-input-outline"
                                                                id="kt_user_photo">

                                                                <div class="image-input-wrapper"
                                                                     style="background-image: url({{asset('adminBoard/uploadedImages/admin/'.$user->photo)}}"></div>
                                                                <label
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="change" data-toggle="tooltip" title=""
                                                                    data-original-title="{{__('general.change_image')}}">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="photo" id="photo"
                                                                           class="table-responsive-sm">
                                                                    <input type="hidden" name="photo_remove"/>
                                                                </label>

                                                                <span
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="cancel" data-toggle="tooltip"
                                                                    title="Cancel avatar">
                                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                 </span>
                                                            </div>
                                                            <span
                                                                class="form-text text-muted">{{__('general.image_format_allow')}}
                                                            </span>
                                                            <span class="form-text text-danger"
                                                                  id="photo_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{__('users.name')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="name" id="name" type="text"
                                                                value="{{$user->name}}"
                                                                placeholder=" {{__('users.enter_name')}}"
                                                                autocomplete="off"/>
                                                            <span class="form-text text-danger"
                                                                  id="name_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{__('users.gender')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="gender" id="gender" type="text">

                                                                <option value="">
                                                                    {{__('general.select_from_list')}}
                                                                </option>

                                                                <option
                                                                    value="male" {!! $user->gender == __('general.male')?'selected':'' !!}>
                                                                    {{__('general.male')}}
                                                                </option>

                                                                <option
                                                                    value="female" {!! $user->gender == __('general.female')?'selected':'' !!}>
                                                                    {{__('general.female')}}
                                                                </option>

                                                            </select>
                                                            <span class="form-text text-danger"
                                                                  id="gender_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{__('users.email')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg "
                                                                name="email" id="email" type="text" disabled="disabled"
                                                                value="{{$user->email}}"
                                                                placeholder=" {{__('users.enter_email')}}"
                                                                autocomplete="off"/>
                                                            <span class="form-text text-danger"
                                                                  id="email_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{__('users.password')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="password" id="password" type="password"
                                                                placeholder=" {{__('users.enter_password')}}"
                                                                autocomplete="off"/>
                                                            <span class="form-text text-danger"
                                                                  id="password_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{__('users.role_id')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="role_id" id="role_id" type="text">

                                                                <option value="">
                                                                    {{__('general.select_from_list')}}
                                                                </option>

                                                                @if($roles && $roles->count()>0)
                                                                    @foreach($roles as $role)
                                                                        <option
                                                                            value="{!! $role->id !!}"
                                                                            {{$user->role_id == old('role_id', $role->id) ?'selected':''}}>
                                                                            @if(Lang()=='ar')
                                                                                {!! $role->role_name_ar !!}
                                                                            @else
                                                                                {!! $role->role_name_en !!}
                                                                            @endif
                                                                        </option>
                                                                    @endforeach
                                                                @endif

                                                            </select>
                                                            <span class="form-text text-danger"
                                                                  id="role_id_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{__('users.mobile')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="mobile" id="mobile" type="text"
                                                                value="{{$user->mobile}}"
                                                                placeholder=" {{__('users.enter_mobile')}}"
                                                                autocomplete="off"/>
                                                            <span class="form-text text-danger"
                                                                  id="mobile_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                </div>
                                                <!--begin::body-->

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>

            </div>
        </div>
        <!--end::content-->

    </form>
@endsection

@push('js')
    <script type="text/javascript">
        //////////////////////////////////////////////////////
        var user_photo = new KTImageInput('kt_user_photo');


        /////////////////////////////////////////////////////////
        // Update User

        $('#form_user_update').on('submit', function (e) {
            e.preventDefault();
            ////////////////////////////////////////////////////
            $('#name_error').text('');
            $('#email_error').text('');
            $('#password_error').text('');
            $('#photo_error').text('');
            $('#mobile_error').text('');
            $('#gender_error').text('');

            $('#name').css('border-color', '');
            $('#email').css('border-color', '');
            $('#password').css('border-color', '');
            $('#photo').css('border-color', '');
            $('#mobile').css('border-color', '');
            $('#gender').css('border-color', '');
            ////////////////////////////////////////////////////
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'JSON',
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{__('general.please_wait')}}",
                    });
                },
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'update_user_button'}
                        });
                        $('.update_user_button').click(function () {
                            window.location.href = "{{route('users')}}";
                        });
                    }
                },
                error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');
                        $('body,html').animate({scrollTop: 30}, 200);
                    })

                },
                complete: function () {
                    KTApp.unblockPage();
                },
            })

        })


    </script>
@endpush

