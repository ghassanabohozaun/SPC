<div class="testimonials my-testimonials-dark-bg grey-bg">
    <!-- Start Section Title /-->
    <div class="section-title">
        <h2>{!! trans('site.whats') !!} <span>{!! trans('site.people_says') !!}</span></h2>
        <div class="section-title-icon">
            <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
        </div>
    </div>
    <!-- End Section Title /-->

    @if ($testimonials->isEmpty())
        <h2 class="text-capitalize text-center text-warning">{!! trans('site.no_testimonials') !!}</h2>
    @else
        <!-- Start Container /-->
        <div class="grid-container grid-x grid-padding-x">
            <!-- Start testimonial Slid /-->
            <div class="testimonial-slid">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-text">

                        @if ($testimonial->photo == null)
                            @if ($testimonial->gender == trans('general.male'))
                                <img src="{!! asset('site/assets/images/male.png') !!}" alt="{!! Lang() == 'ar' ? $testimonial->opinion_ar : $testimonial->opinion_en !!}" />
                            @else
                                <img src="{!! asset('site/assets/images/female.jpg') !!}" alt="{!! Lang() == 'ar' ? $testimonial->opinion_ar : $testimonial->opinion_en !!}" />
                            @endif
                        @else
                            <img src="{!! asset(\Illuminate\Support\Facades\Storage::url($testimonial->photo)) !!}" alt="{!! Lang() == 'ar' ? $testimonial->opinion_ar : $testimonial->opinion_en !!}" />
                        @endif
                        <p class="my_lead">{!! Lang() == 'ar' ? $testimonial->opinion_ar : $testimonial->opinion_en !!}</p>
                        <h6>{!! Lang() == 'ar' ? $testimonial->client_name_ar : $testimonial->client_name_en !!}

                            @if (Lang() == 'ar')
                                @if ($testimonial->job_title_ar != null)
                                    - <span>
                                        {!! $testimonial->job_title_ar !!}
                                    </span>
                                @endif
                            @else
                                @if ($testimonial->job_title_en != null)
                                    - <span>
                                        {!! $testimonial->job_title_en !!}
                                    </span>
                                @endif
                            @endif


                        </h6>
                    </div>
                @endforeach
            </div>
            <!-- End testimonial Slid /-->
        </div>
        <!-- End Container /-->
    @endif
</div>
