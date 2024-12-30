<!-- begin Modal-->
<div class="modal fade" id="model_admin_update" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('general.update') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data"
                id="form_admin_update">
                <div class="modal-body">


                    <!--begin::Card-->
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <!--begin::Body-->
                        <div class="card-body p-0">

                            <div class="col-xl-12 col-xxl-10">

                                <div class="row justify-content-center">
                                    <div class="col-xl-12">

                                        <!--begin::Group-->
                                        <div class="d-none form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                ID
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control form-control-lg" name="id"
                                                    id="id" type="hidden" autocomplete="off" />
                                            </div>

                                        </div>
                                        <!--end::Group-->

                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                {{ __('login.photo') }}
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="image-input image-input-outline" id="kt_admin_photo">

                                                    <div class="image-input-wrapper"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="{{ __('general.change_image') }}">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="photo" id="photo"
                                                            class="table-responsive-sm">
                                                        <input type="hidden" name="photo_remove" />
                                                    </label>

                                                    <span
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="cancel" data-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                </div>
                                                <span
                                                    class="form-text text-muted">{{ __('general.image_format_allow') }}
                                                </span>
                                                <span class="form-text text-danger" id="photo_error"></span>
                                            </div>
                                        </div>
                                        <!--end::Group-->





                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                {{ __('login.name') }}
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control form-control-solid form-control-lg"
                                                    name="name" id="name" type="text"
                                                    placeholder=" {{ __('login.enter_name') }}" autocomplete="off" />
                                                <span class="form-text text-danger" id="name_error"></span>
                                            </div>
                                        </div>
                                        <!--end::Group-->


                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                {{ __('login.email') }}
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control form-control-solid form-control-lg "
                                                    name="email" id="email" type="email" disabled="disabled"
                                                    placeholder=" {{ __('login.enter_email') }}" autocomplete="off" />
                                                <span class="form-text text-danger" id="email_error"></span>

                                            </div>

                                        </div>
                                        <!--end::Group-->


                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                {{ __('login.password') }}
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control form-control-solid form-control-lg"
                                                    name="password" id="password" type="password"
                                                    placeholder=" {{ __('login.enter_password') }}"
                                                    autocomplete="off" />
                                                <span class="form-text text-danger" id="password_error"></span>

                                            </div>

                                        </div>
                                        <!--end::Group-->


                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                {{ __('login.confirm_password') }}
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control form-control-solid form-control-lg"
                                                    name="confirm_password" id="confirm_password" type="password"
                                                    placeholder=" {{ __('login.enter_confirm_password') }}"
                                                    autocomplete="off" />
                                                <span class="form-text text-danger" id="confirm_password_error">
                                                </span>
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                        {{ __('general.cancel') }}
                    </button>

                    <button type="submit" class="btn btn-primary font-weight-bold">
                        {{ __('general.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Modal-->
@push('js')
    <script type="text/javascript">
        var admin_photo = new KTImageInput('kt_admin_photo');


        $('body').on('click', '#admin_update_modal', function(e) {
            e.preventDefault();
            $.notifyClose();

            var id = $(this).data('id');
            $.get("{{ route('get.admin.by.id') }}", {
                id,
                id
            }, function(data) {
                console.log(data)
                if (data.status == true) {
                    $('#id').val(data.data.id);
                    $('#name').val(data.data.name);
                    $('#email').val(data.data.email);

                    $('#kt_admin_photo').css("background-image", "");
                    var photo = data.data.photo;
                    var url = '{{ asset('adminBoard/uploadedImages/admin/') }}/' + photo;
                    $('#kt_admin_photo').css("background-image", "url(" + url + ")");
                    $('#model_admin_update').modal('show');
                }
            }); //end get ajax
        }); //end click

        $('#form_admin_update').on('submit', function(e) {
            e.preventDefault();
            $.notifyClose();

            /////////////////////////////////////////////////////////////////
            $('#name_error').text('');
            $('#email_error').text('');
            $('#password_error').text('');
            $('#confirm_password_error').text('');

            $('#name').css('border-color', '');
            $('#email').css('border-color', '');
            $('#password').css('border-color', '');
            $('#confirm_password').css('border-color', '');
            /////////////////////////////////////////////////////////////////

            var data = new FormData(this);
            var url = $(this).attr('action');
            var type = $(this).attr('method');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    KTApp.block('#model_admin_update .modal-content', {
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{ __('general.please_wait') }}",
                    });
                }, //end beforeSend
                success: function(data) {
                    KTApp.unblock('#model_admin_update .modal-content');
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'update_admin_button'
                            }
                        });
                        $('.update_admin_button').click(function() {
                            $('.card_admin_id').load(location.href + ' .card_admin_id');
                            $('.admin_offcanvas').load(location.href + ' .admin_offcanvas');
                            $('.admin_topbar_item').load(location.href + ' .admin_topbar_item');

                            $('#model_admin_update').modal('hide');
                        });
                    }

                }, //end success


                error: function(reject) {
                    KTApp.unblock('#model_admin_update .modal-content');
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                    });
                }
            });
        })
    </script>
@endpush
