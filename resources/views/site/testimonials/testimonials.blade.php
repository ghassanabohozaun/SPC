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
    <div class="bradcam_area testimonials-bg">
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

    <!-------------------------------------- Start testimonials  ------------------------------------->
    <div class="testimonials testimonial-page module">
        <div class="grid-container grid-x grid-padding-x my_testimonials_section" dir="rtl">

            <!-- Start Left /-->
            <div class="large-9 medium-12 small-12 cell">

                <div class="testimonial_list" id="testimonial_list">
                    @include('site.testimonials.testimonial-paging')
                </div>

            </div>
            <!-- End Left /-->

            <!-- Start Right /-->
            <div class="large-3 medium-12 small-12 cell">

                <!-- Start Filter /-->
                <div class="widget filter_form">
                    <h6>{!! __('site.filter') !!}</h6>
                    <div class="widget-content">
                        <form>
                            <select id="filter_by_year" class="filter_by_year">
                                <option value="">{!! __('site.select_year') !!}</option>
                                <?php
                                $year = (int) date('Y');
                                $firstYear = $year - 2;
                                $lastYear = $year + 5;
                                for ($i = $firstYear; $i <= $lastYear; $i++) {
                                    echo '<option value=' . $i . '>' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </form>
                    </div><!-- Widget Content /-->
                </div>
                <!-- End Filter /-->

                <!-- Start Form /-->
                <div class="widget">
                    <h6>{!! __('site.submit_testimonial') !!}</h6>
                    <div class="widget-content">
                        <form id="send_testimonials_form" action="{!! route('send.testimonial') !!}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!------------------------------------------------------------>

                            @if (Lang() == 'ar')
                                <input type="text" id="name_ar" name="name_ar" placeholder="{!! __('site.your_nickname') !!}"
                                    autocomplete="off" />
                                <span id="name_ar_error" class="form-text text-danger"></span>
                            @else
                                <input type="text" id="name_en" name="name_en" placeholder="{!! __('site.your_nickname') !!}"
                                    autocomplete="off" />
                                <span id="name_en_error" class="form-text text-danger"></span>
                            @endif
                            <!------------------------------------------------------------>
                            <input type="text" id="age" name="age" placeholder="{!! __('site.your_age') !!}"
                                autocomplete="off" />
                            <span id="age_error" class="form-text text-danger"></span>
                            <!------------------------------------------------------------>
                            <select id="gender" name="gender">
                                <option value="">{!! __('site.your_gender') !!}</option>
                                <option value="male">{!! __('site.male') !!}</option>
                                <option value="female">{!! __('site.female') !!}</option>
                            </select>
                            <span id="gender_error" class="form-text text-danger"></span>
                            <!------------------------------------------------------------>
                            @if (Lang() == 'ar')
                                <input type="text" name="job_title_ar" id="job_title_ar"
                                    placeholder="{!! __('site.your_job_title') !!}" autocomplete="off" />
                                <span id="job_title_ar_error" class="form-text text-danger"></span>
                            @else
                                <input type="text" name="job_title_en" id="job_title_en"
                                    placeholder="{!! __('site.your_job_title') !!}" autocomplete="off" />
                                <span id="job_title_en_error" class="form-text text-danger"></span>
                            @endif
                            <!------------------------------------------------------------>
                            <select name="country" id="country">
                                <option value="">{!! __('general.select_from_list') !!}</option>
                                @foreach (\App\Models\Country::all() as $country)
                                    <option value="{{ $country->id }}">
                                        {!! $country->{'name_' . Lang()} !!}
                                    </option>
                                @endforeach
                            </select>


                            <!------------------------------------------------------------>
                            <p class="text-center font-weight-bolder">{!! __('site.rate_us') !!}</p>
                            <div class="rating my_rating">

                                <input type="radio" name="rating" value="5" id="5"><label
                                    for="5">☆</label>
                                <input type="radio" name="rating" value="4" id="4"><label
                                    for="4">☆</label>
                                <input type="radio" name="rating" value="3" id="3"><label
                                    for="3">☆</label>
                                <input type="radio" name="rating" value="2" id="2"><label
                                    for="2">☆</label>
                                <input checked type="radio" name="rating" value="1" id="1"><label
                                    for="1">☆</label>
                                <span id="rating_error" class="form-text text-danger"></span>
                            </div>


                            <!------------------------------------------------------------>
                            @if (Lang() == 'ar')
                                <textarea name="opinion_ar" id="opinion_ar" placeholder="{!! __('site.your_reason_of_satisfaction') !!}" rows="4"
                                    autocomplete="off"></textarea>
                                <span id="opinion_ar_error" class="form-text text-danger"></span>
                            @else
                                <textarea name="opinion_en" id="opinion_en" placeholder="{!! __('site.your_reason_of_satisfaction') !!}" rows="4"
                                    autocomplete="off"></textarea>
                                <span id="opinion_en_error" class="form-text text-danger"></span>
                            @endif
                            <!------------------------------------------------------------>
                            <label>{!! __('site.select_your_image') !!}
                                <input type="file" id="photo" name="photo" />
                            </label>
                            <span id="photo_error" class="form-text text-danger"></span>
                            <!------------------------------------------------------------>

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
                            <!------------------------------------------------------------>

                            <button type="submit" class="button primary last-item">
                                {!! __('site.submit') !!} &nbsp;
                                <div class="spinner-border  text-info d-none loading_spinner" id="loading_spinner">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>

                        </form>
                    </div><!-- Widget Content /-->
                </div>
                <!-- End Form /-->
            </div>
            <!-- End Right /-->

        </div><!-- Grid Container /-->


    </div>
    <!-------------------------------------- End testimonials  --------------------------------------->

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
        $('#send_testimonials_form').validate({
            rules: {
                name_en: {
                    required: true,
                },
                name_ar: {
                    required: true,
                },
                age: {
                    required: true,
                },
                gender: {
                    required: true,
                },

                country: {
                    required: true,
                },
                rating: {
                    required: true,
                },
                opinion_en: {
                    required: true,
                },
                opinion_ar: {
                    required: true,
                },

                captcha: {
                    required: true,
                },


            },
            messages: {
                name_en: {
                    required: '{{ __('site.client_name_required') }}',
                },
                name_ar: {
                    required: '{{ __('site.client_name_required') }}',
                },
                age: {
                    required: '{{ __('site.client_age_required') }}',
                },
                gender: {
                    required: '{{ __('site.gender_required') }}',
                },

                country: {
                    required: '{{ __('site.country_required') }}',
                },
                rating: {
                    required: '{{ __('site.rating_required') }}',
                },
                opinion_en: {
                    required: '{{ __('site.opinion_required') }}',
                },
                opinion_ar: {
                    required: '{{ __('site.opinion_required') }}',
                },
                captcha: {
                    required: '{{ __('site.captcha_required') }}',
                },

            },
        });
        /////////////////////////////////////////////////////////////////////
        // form submit
        $(document).on('submit', 'form', function(e) {
            /////////////////////////////////////////////////////////////////////////////////
            $('#captcha_error').text('');
            $('#captcha').css('border-color', '');
            /////////////////////////////////////////////////////////////////////////////////
            e.preventDefault();
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
                            text: "{!! __('site.send_success_message') !!}",
                            buttons: false,
                            timer: 3000,
                        });
                        $('#send_testimonials_form')[0].reset();
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

        /////////////////////////////////////////////////////////////////
        ///  filter by year Paging change
        $('#filter_by_year').on('change', function(e) {
            e.preventDefault();
            var year = $(this).val();
            $.ajax({
                url: "{!! route('testimonials.filter.by.year') !!}",
                type: "GET",
                data: {
                    year: year
                },
                success: function(data) {
                    console.log(data)
                    $('#testimonial_list').html(data);
                }
            })
        });
        /////////////////////////////////////////////////////////////////
        ///  videos Paging
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            readPage(page);
        }); // End Document On
        /////////////////////////////////////////////////////////////////
        ///  read Page
        function readPage(page) {
            $.ajax({
                url: '/testimonial-paging/' + '?page=' + page,
                success: function(data) {

                    $('html').animate({
                        scrollTop: "520px"
                    }, 0);
                    setTimeout(function() {
                        $('#testimonial_list').html(data);
                    }, 0);
                }
            })

        } // end readPage
    </script>
@endpush
