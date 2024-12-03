@extends('layouts.site')
@section('title')
    {!! Lang()=='ar' ? setting()->site_title_ar : setting()->site_title_en !!}
@endsection
@section('metaTags')
    <meta name="description"
          content="{!! Lang()=='ar' ? setting()->site_description_ar : setting()->site_description_en !!}">
    <meta name="keywords"
          content="{!! Lang()=='ar' ? setting()->site_keywords_ar : setting()->site_keywords_en !!}">
    <meta name="application-name" content="{!! Lang()=='ar' ? setting()->site_name_ar : setting()->site_name_en !!}"/>
    <meta name="author" content="{!! Lang()=='ar' ? setting()->site_name_ar : setting()->site_name_en !!}"/>
@endsection

@push('css')
@endpush
@section('content')

    <div class="boxed_wrapper {!! Lang()=='ar' ? 'rtl':'' !!}"
         style="background-image: url({!! asset('/site/assets/images/shape/shape-23.png') !!});">


        <!-- header -->
        @include('site.includes.header')
        <!-- header end -->

        <!-- Page Title -->
        <section class="page-title"
                 style="background-image: url({!! asset('site/assets/images/headerPhoto.png') !!});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>{{__('index.news')}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- sidebar-page-container -->
        <section class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix justify-content-md-center">
                    <!-- left  -->
                    <div class="col-lg-8 col-md-8 col-sm-8 content-side">
                        <div class="blog-details-content">

                            <div class="content-one">
                                <div class="upper-box">

                                    <h2>{!! $new->{'title_'.Lang()} !!}</h2>

                                    <ul class="post-info clearfix">
                                        <li>
                                            <i class="far fa-comment"></i>
                                            {!!$new->comments()->count()!!} {!! __('index.comments_count') !!}
                                        </li>
                                        <li><i class="far fa-eye"></i>
                                            {!!$new->views!!} {!! __('index.views_count') !!}
                                        </li>
                                    </ul>
                                </div>

                                <figure class="image-box">
                                    <img src="{!!asset('adminBoard/uploadedImages/articles/'. $new->photo)!!}"
                                         alt="{!! $new->{'title_'.Lang()} !!}">
                                    <span class="post-date">{!!$new->publish_date!!}</span>
                                </figure>

                                <div class="text">
                                    <p>{!! $new->{'abstract_'.Lang()} !!}</p>
                                </div>

                            </div>

                            <div class="comment-box">
                                <div class="group-title">
                                    <h3>{!! __('index.my_comments') !!} ( {{$new->comments()->count()}} )</h3>
                                </div>
                                @foreach ($new->comments as $comment)

                                    <div class="comment">
                                        <figure class="thumb-box">
                                            @if ($comment->photo)
                                                <img
                                                    src="{{asset('adminBoard/uploadedImages/articles/comments/'.$comment->photo)}}"
                                                    alt="{!! $comment->commentary !!}">
                                            @else
                                                @if($comment->gender == __('general.male'))
                                                    <img src="{{asset('adminBoard/images/male.jpeg')}}">
                                                @elseif($comment->gender == __('general.female'))
                                                    <img src="{{asset('adminBoard/images/female.jpeg')}}"/>
                                                @endif
                                            @endif
                                        </figure>
                                        <div class="comment-inner">
                                            <div class="comment-info clearfix">
                                                <h3>{{$comment->person_name}}</h3>
                                            </div>
                                            <p>{!! $comment->commentary !!}</p>
                                            <span class="my-p">
                                                    {{$comment->created_at->format('d.m.Y')}} [{{$comment->created_at->format('H.i A')}} ]
                                            </span>
                                        </div>
                                    </div>
                                @endforeach


                            </div>

                            <div class="comments-form-area">

                                <div class="group-title">
                                    <h3>{!! __('index.leave_Reply') !!}</h3>
                                    <p>{!! __('index.required_fields_are_marked') !!} *</p>
                                </div>

                                <div class="form-inner">

                                    <form method="POST" enctype="multipart/form-data"
                                          action="{!! route('send-comment') !!}"
                                          id="form_comment_send" class="comment-form">
                                        @csrf

                                        <input type="hidden" name="post_id" id="post_id" value="{!! $new->id !!}">

                                        <div class="row clearfix">

                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <textarea name="commentary" id="commentary"
                                                          autocomplete="off"
                                                          placeholder="{!! __('index.you_comment') !!} *"></textarea>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" id="person_name" name="person_name"
                                                       autocomplete="off"
                                                       placeholder="{!! __('index.you_name') !!} *">
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="email" id='person_email' name="person_email"
                                                       autocomplete="off"
                                                       placeholder="{!! __('index.your_email') !!} *">
                                            </div>


                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                                <button type="submit"
                                                        class="theme-btn btn-one">{!! __('index.submit') !!}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- left end -->

                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->

    </div>

@endsection
@push('scripts')

    <script src="{{asset('adminBoard/assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">

        // $('#reload').click(function () {
        //     $.ajax({
        //         type: 'GET',
        //         url: 'reload-captcha',
        //         success: function (data) {
        //             $(".captcha span").html(data.captcha);
        //         }
        //     });
        // });


        /////////////////////////////////////////////////////////////////////
        // Validation
        $('#form_comment_send').validate({
            rules: {
                commentary: {
                    required: true,
                },
                person_email: {
                    required: true,
                    email: true
                },
                person_name: {
                    required: true,
                },
                captcha: {
                    required: true,
                },
            },
            messages: {
                commentary: {
                    required: '{!!  __('index.you_comment_required') !!} ',
                },
                person_email: {
                    required: '{!!__('index.you_name_required')!!}',
                    email: '{!!__('index.email_email')!!}',
                },
                person_name: {
                    required: '{!!__('index.your_email_required')!!}',
                },

                captcha: {
                    required: '{!!__('index.it_is_required')!!}',
                },
            },

        });

        ////////////////////////////////////////////////////
        $(document).on('submit', 'form', function (e) {
            e.preventDefault();

            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: type,
                data: data,
                dataType: false,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {

                },

                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.msg
                        })
                    }
                    $('#form_comment_send')[0].reset();
                },

                error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');
                    });
                },
                complete: function () {
                },
            })

        });//end submit
    </script>
@endpush
