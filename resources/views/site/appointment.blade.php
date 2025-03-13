@extends('layouts.site')
@section('title')
    {!! $title !!}
@endsection
@section('metaTags')
    <meta name="description" content="{!! setting()->{'site_description_' . Lang()} !!}">
    <meta name="keywords" content="{!! setting()->{'site_keywords_' . Lang()} !!}">
    <meta name="application-name" content="{!! setting()->{'site_name_' . Lang()} !!}" />
    <meta name="author" content="{!! setting()->{'site_name_' . Lang()} !!}" />
@endsection

@section('content')
    <!-------------------------------------- Start Top Title Section  ------------------------------------->
    <div class="clearfix"></div>
    <div class="bradcam_area appointment-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h1>{!! $title !!}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------- End Top Title Section  ------------------------------------->

    <!-------------------------------------- Start Appointment ---------------------------------->

    <div class="appointment-page form-section grey-bg  ">

        <div class="grid-container grid-x grid-padding-x  ">

            <div class="col-lg-10  col-md-10  col-sm-12   offset-2">
                <div class="form ">
                    <p class="appointment_hint">{!! trans('site.want_book_an_appointment') !!}</p>
                    <div class="appointment-form">
                        <form action="{!! route('booking.appointment') !!}" method="post" id="form_book_appointment"
                            class="form_book_appointment">
                            @csrf
                            <div class="grid-container grid-x grid-padding-x">
                                <div class="medium-6 small-12 cell">
                                    <label>
                                        <input type="text" name="full_name" id="full_name" autocomplete="off"
                                            placeholder="{!! trans('site.your_full_name') !!}">
                                    </label>
                                </div>
                                <div class="medium-6 small-12 cell">
                                    <label>
                                        <input type="text" name="phone" id="phone" autocomplete="off"
                                            placeholder="{!! trans('site.your_phone') !!}">
                                    </label>
                                </div>
                                <div class="medium-6 small-12 cell">
                                    <label>
                                        <input type="text" name="email" id="email" autocomplete="off"
                                            placeholder="{!! trans('site.your_email') !!}">
                                    </label>
                                </div>
                                <div class="medium-6 small-12 cell">
                                    <label>
                                        <input type="date" name="preferred_date" id="preferred_date"
                                            class="preferred_date" autocomplete="off"
                                            placeholder="{!! trans('site.preferred_date') !!}">
                                    </label>
                                </div>
                                <div class="medium-12 cell">
                                    <label>
                                        <textarea name="details" id="details" autocomplete="off" placeholder="{!! trans('site.your_message') !!}" rows="6"></textarea>
                                    </label>
                                </div>

                                <div class="medium-12 cell">
                                    <div class="captcha">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-primary" class="reload" id="reload">
                                            &#x21bb;
                                        </button>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input id="captcha" type="text" class="form-control"
                                            placeholder="{!! trans('site.enter_captcha') !!}" name="captcha">
                                        <span class="form-text text-danger" id="captcha_error"></span>
                                    </div>
                                </div>

                                <div class="medium-12 cell">
                                    <input type="hidden" name="appointment_form" value="YES">
                                    <button class="primary button" type="submit">{!! trans('site.book_an_appointment') !!} &nbsp;
                                        <div class="spinner-border  text-info d-none loading_spinner" id="loading_spinner">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><!-- contact Form ends here. -->
                </div><!-- Form/-->
                <div class="clearfix"></div>
            </div><!-- cell /-->

        </div><!-- Grid Container /-->

    </div>
    <!-------------------------------------- End Appointment ------------------------------------>

    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.includes.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->
@endsection
@push('js')
    <script src="{{ asset('adminBoard/assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        /////////////////////////////////////////////////////////////////////
        // reload captcha
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });


        function reloadCaptcha() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        }

        /////////////////////////////////////////////////////////////////////
        // Validation
        $('#form_book_appointment').validate({
            rules: {
                full_name: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                preferred_date: {
                    required: true,
                },
                details: {
                    required: true,
                },
                captcha: {
                    required: true,
                },
            },
            messages: {
                full_name: {
                    required: '{{ trans('site.full_name_required') }}',
                },
                phone: {
                    required: '{{ trans('site.phone_required') }}',
                },
                email: {
                    required: '{{ trans('site.email_required') }}',
                    email: '{{ trans('site.email_email') }}',
                },
                preferred_date: {
                    required: '{{ trans('site.preferred_date_required') }}',
                },
                details: {
                    required: '{{ trans('site.message_required') }}',
                },
                captcha: {
                    required: '{{ trans('site.captcha_required') }}',
                },
            },
        });

        ////////////////////////////////////////////////////////////////////////////////////
        // Booking Appointment
        $(document).on('submit', 'form', function(e) {
            e.preventDefault();
            /////////////////////////////////////////////////////////////////////////////////
            $('#captcha_error').text('');
            $('#captcha').css('border-color', '');
            /////////////////////////////////////////////////////////////////////////////////
            $('#loading_spinner').removeClass('d-none')
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                dataType: 'JSON',
                type: type,
                contentType: false,
                processData: false,
                cache: false,

                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        $('#loading_spinner').addClass('d-none')
                        swal({
                            icon: "success",
                            text: "{!! trans('site.success_booking_message') !!}",
                            buttons: false,
                            timer: 3000,
                        });
                        $('#form_book_appointment')[0].reset();
                        reloadCaptcha();
                    }
                    if (data == false) {
                        $('#loading_spinner').addClass('d-none')
                        swal({
                            icon: "success",
                            text: "{!! trans('site.failed_booking_message') !!}",
                            buttons: false,
                            timer: 3000,
                        });
                    }

                },
                error: function(reject) {
                    $('#loading_spinner').addClass('d-none')
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                    });
                }, //end error

            });
        });
    </script>
@endpush
