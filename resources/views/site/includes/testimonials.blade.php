<!-------------------------------------- Start other doctors Section --------------------------------->
<div class="blog-section">

    <!-- Start other doctor Container /-->
    <div class="grid-container grid-x grid-padding-x other_doctor_section">
        <!-- Start Cell /-->
        <div class="large-6 medium-6 small-12 cell">
            <div class="team-box hover-wrap">
                <div>
                    <img src="{!! asset('site/assets/images/omar.jpeg') !!}" alt="">
                </div>

                <div class="team-text">
                    <h4>{!! __('site.omar_name') !!}</h4>
                    <p>{!! __('site.omar_profile') !!}</p>
                </div>
            </div>
        </div>
        <!-- End Cell /-->

        <!-- Start Cell /-->
        <div class="large-6 medium-6 small-12 cell">
            <div class="team-box hover-wrap">
                <div>
                    <img src="{!! asset('site/assets/images/asad.jpg') !!}" alt="">
                </div>
                <div class="team-text">
                    <div class="team-text">
                        <h4>{!! __('site.jennah_name') !!}</h4>
                        <p>{!! __('site.jennah_profile') !!}</p>
                        <p>{!! __('site.email') !!} : <a href=''>jatherapy@outlook.com</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Cell /-->
    </div>
</div>
<!-------------------------------------- End other doctors Section ------------------------------------>



@if (!$testimonials->isEmpty())
    <!-------------------------------------- Start client opinions Testimonials ------------------>
    <div class="testimonials my-testimonials-dark-bg grey-bg">
        <!-- Start Section Title /-->
        <div class="section-title">
            <h2>{!! __('site.whats') !!} <span>{!! __('site.people_says') !!}</span></h2>
            <div class="section-title-icon">
                <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
            </div>
        </div>
        <!-- End Section Title /-->


        <!-- Start Container /-->
        <div class="grid-container grid-x grid-padding-x">
            <!-- Start testimonial Slid /-->
            <div class="testimonial-slid">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-text">

                        @if ($testimonial->photo == null)
                            @if ($testimonial->gender == 'male')
                                <img src="{!! asset('site/assets/images/male.jpeg') !!}" alt="{!! $testimonial->{'opinion_' . Lang()} !!}" />
                            @elseif($testimonial->gender == 'female')
                                <img src="{!! asset('site/assets/images/female.jpeg') !!}" alt="{!! $testimonial->{'opinion_' . Lang()} !!}" />
                            @elseif($testimonial->gender == 'others')
                                <img src="{!! asset('site/assets/images/others.png') !!}" alt="{!! $testimonial->{'opinion_' . Lang()} !!}" />
                            @endif
                        @else
                            <img src="{!! asset('adminBoard/uploadedImages/testimonials/' . $testimonial->testimonial) !!}" alt="{!! $service->{'opinion_' . Lang()} !!}" />
                        @endif
                        <p class="testimonial_slid_scroll my_lead">{!! $testimonial->{'opinion_' . Lang()} !!}</p>
                        <h6>{!! $testimonial->{'name_' . Lang()} !!}

                            @if ($testimonial->{'job_title_' . Lang()} != null)
                                <span>
                                    - {!! $testimonial->{'job_title_' . Lang()} !!}
                                </span>
                            @endif

                            @if ($testimonial->client_age != null)
                                <span>
                                    - {!! $testimonial->client_age !!}
                                </span>
                            @endif

                            @if ($testimonial->country != null)
                                <span>
                                    - {!! $testimonial->country !!}
                                </span>
                            @endif

                            , <span>
                                {!! Lang() == 'ar' ? $testimonial->created_at->format('Y-m-d') : $testimonial->created_at->format('d-m-Y') !!}
                            </span>

                            <p>
                                @if ($testimonial->rating != null)
                                    [
                                    <span>
                                        @for ($i = 1; $i <= $testimonial->rating; $i++)
                                            <i class="fa fa-star" style="color:#FFA400"></i>
                                        @endfor
                                    </span>
                                    ]
                                @endif
                            </p>
                        </h6>
                    </div>
                @endforeach
            </div>
            <!-- End testimonial Slid /-->
        </div>
        <!-- End Container /-->

    </div>
    <!-------------------------------------- End  client opinions Testimonials ------------------->
@endif
