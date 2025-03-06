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
