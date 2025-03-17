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
    <div class="bradcam_area my_contact_us_bg">
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

    <!-------------------------------------- Start Content  ---------------------------------->
    <div class="content-section module">
        <div class="grid-container grid-x grid-padding-x my_contact_section">

            <div class="medium-3 small-12 cell contact-sidebar">
                <img src="{!! asset('site/assets/images/doctor7.png') !!}" alt="">
                <h4 class="padding-top-zero">{!! __('site.meet_our_psychotherapist') !!}</h4>
                <p>
                    {!! setting()->{'site_address_' . Lang()} !!}
                </p>
                <h4>{!! __('site.customer_service') !!}</h4>
                <p>
                    {!! __('site.phone') !!} : {!! setting()->site_mobile !!}
                    <br />
                    {!! __('site.email') !!} : {!! setting()->site_email !!}
                </p>
                <h4>{!! __('site.follow_us') !!}</h4>
                <div class="social-icons">
                    <a onclick="return {!! setting()->site_facebook ? 'true' : 'false' !!};" href="{!! setting()->site_facebook !!}" target="__blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a onclick="return {!! setting()->site_twitter ? 'true' : 'false' !!};" href="{!! setting()->site_twitter !!}" target="__blank">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a onclick="return {!! setting()->site_instagram ? 'true' : 'false' !!};" href="{!! setting()->site_instagram !!}" target="__blank">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a onclick="return {!! setting()->site_linkedin ? 'true' : 'false' !!};" href="{!! setting()->site_linkedin !!}" target="__blank">
                        <i class="fab fa-linkedin"></i>
                    </a>

                    <a onclick="return {!! setting()->site_youtube ? 'true' : 'false' !!};" href="{!! setting()->site_youtube !!}" target="__blank">
                        <i class="fab fa-youtube"></i>
                    </a>

                    <a onclick="return {!! setting()->site_email ? 'true' : 'false' !!};" href="{!! setting()->site_email !!}" target="__blank">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
            </div> <!-- Left Side Ends /-->

            <div class="medium-9 small-12 cell">

                <!-- Start map  -->
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2022.798041295959!2d-0.2370503847749049!3d51.754844150402505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48763c88504a2d83%3A0x3fe9a82b6f428ea!2sBishops%20Rise%2C%20Hatfield%20AL10%209HH%2C%20UK!5e1!3m2!1sen!2s!4v1618872108918!5m2!1sen!2s"
                        height="270" allowfullscreen=""></iframe>

                </div>
                <!-- End map  -->


                <!-- Start contact form  -->
                <div class="content-section-form">
                    <h3>{!! __('site.fill_the_form_below_to_contact_us') !!}</h3>
                    <form id="contact_form" enctype="multipart/form-data" method="POST" action="{!! route('send.contact') !!}">
                        @csrf
                        <div class="grid-container grid-x grid-padding-x">

                            <div class="medium-4 cell">
                                <input type="text" placeholder="{!! __('site.enter_Name') !!}" id="name" name="name"
                                    autocomplete="off">
                                <span id="name_error" class="form-text text-danger"></span>
                            </div>

                            <div class="medium-4 cell">
                                <input type="text" placeholder="{!! __('site.enter_mobile') !!}" id="mobile" name="mobile"
                                    autocomplete="off">
                                <span id="mobile_error" class="form-text text-danger"></span>
                            </div>

                            <div class="medium-4 cell">
                                <input type="text" placeholder="{!! __('site.enter_email') !!}" id="email" name="email"
                                    autocomplete="off">
                                <span id="email_error" class="form-text text-danger"></span>
                            </div>
                            <div class="medium-12 cell">
                                <input type="text" placeholder="{!! __('site.enter_message_title') !!}" id="title" name="title"
                                    autocomplete="off">
                                <span id="title_error" class="form-text text-danger"></span>
                            </div>
                            <div class="medium-12 cell">
                                <textarea placeholder="{!! __('site.enter_your_message') !!}" rows="5" id="message" name="message" autocomplete="off"></textarea>
                                <span id="message_error" class="form-text text-danger"></span>
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
                                        placeholder="{!! __('site.enter_captcha') !!}" name="captcha">
                                    <span class="form-text text-danger" id="captcha_error"></span>
                                </div>
                            </div>

                            <div class="medium-12 cell">
                                <button class="primary button" type="submit">{!! __('site.send') !!} &nbsp;
                                    <div class="spinner-border  text-info d-none loading_spinner" id="loading_spinner">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </button>
                            </div>
                        </div><!-- Grid Container /-->
                    </form>
                </div>
                <!-- End contact form  -->

            </div> <!-- Right Side Ends /-->

        </div><!-- Grid Container /-->
    </div>
    <!-------------------------------------- End Content ------------------------------------->

    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.includes.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->
@endsection

@push('js')
    <script src="{{ asset('adminBoard/assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
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
        $('#contact_form').validate({
            rules: {
                name: {
                    required: true,
                },
                mobile: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                title: {
                    required: true,
                },
                message: {
                    required: true,
                },
                captcha: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: '{{ __('site.sender_required') }}',
                },
                mobile: {
                    required: '{{ __('site.mobile_required') }}',
                },
                email: {
                    required: '{{ __('site.email_required') }}',
                    email: '{{ __('site.email_email') }}',
                },
                title: {
                    required: '{{ __('site.title_required') }}',
                },
                message: {
                    required: '{{ __('site.details_required') }}',
                },
                captcha: {
                    required: '{{ __('site.captcha_required') }}',
                },
            },
        });

        $(document).on('submit', 'form', function(e) {
            e.preventDefault();
            /////////////////////////////////////////////////////////////////////////////////
            $('#captcha_error').text('');
            $('#captcha').css('border-color', '');
            /////////////////////////////////////////////////////////////////////////////////
            $('#loading_spinner').removeClass('d-none')

            var data = new FormData(this);
            var url = $(this).attr('action');
            var type = $(this).attr('method');


            $.ajax({
                url: url,
                data: data,
                dataType: 'json',
                type: type,
                contentType: false,
                cache: false,
                processData: false,

                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        $('#loading_spinner').addClass('d-none')
                        swal({
                            icon: "success",
                            text: "{!! __('site.success_send_contact_message') !!}",
                            buttons: false,
                            timer: 3000,
                        });
                        $('#contact_form')[0].reset();
                        reloadCaptcha();
                    }
                    if (data == false) {
                        $('#loading_spinner').addClass('d-none')
                        swal({
                            icon: "success",
                            text: "{!! __('site.send_failed_message') !!}",
                            buttons: false,
                            timer: 3000,
                        });
                    }
                }, // end success
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
