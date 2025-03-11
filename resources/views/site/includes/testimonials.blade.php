@if (!$testimonials->isEmpty())
    <section class="creative-testimonial--slider">
        <div class="testimonial-inner">
            <div class="testimonial-row">
                <!-- Start Section Title /-->
                <div class="section-title testimonial-section-title">
                    <h2 id="my_testimonial_header">{!! __('site.whats') !!}
                        <span>{!! __('site.people_says') !!}</span>
                    </h2>
                    <div class="section-title-icon">
                        <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
                    </div>
                </div>
                <!-- End Section Title /-->
                <div class="testimonial-wrap">
                    <div class="swiper-container my-swiper-container" id="my-swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($testimonials as $testimonial)
                                <!-- Slide 1 -->
                                <div class="swiper-slide">
                                    <div class="swiper-slide--inner">

                                        <div class="slide-avatar">
                                            @if ($testimonial->photo == null)
                                                @if ($testimonial->gender == 'male')
                                                    <img src="{!! asset('site/assets/images/male.jpeg') !!}"
                                                        class="img-thumbnail testimonial-img-thumbnail "
                                                        alt="{!! $testimonial->{'opinion_' . Lang()} !!}" />
                                                @elseif($testimonial->gender == 'female')
                                                    <img src="{!! asset('site/assets/images/female.jpeg') !!}"
                                                        class="img-thumbnail testimonial-img-thumbnail "
                                                        alt="{!! $testimonial->{'opinion_' . Lang()} !!}" />
                                                @elseif($testimonial->gender == 'others')
                                                    <img src="{!! asset('site/assets/images/others.png') !!}"
                                                        class="img-thumbnail testimonial-img-thumbnail "
                                                        alt="{!! $testimonial->{'opinion_' . Lang()} !!}" />
                                                @endif
                                            @else
                                                <img src="{!! asset('adminBoard/uploadedImages/testimonials/' . $testimonial->photo) !!}"
                                                    class="img-thumbnail testimonial-img-thumbnail "
                                                    alt="{!! $testimonial->{'opinion_' . Lang()} !!}" />
                                            @endif
                                        </div>

                                        <div class="testimonial-detail">

                                            <p>{!! $testimonial->{'opinion_' . Lang()} !!}</p>

                                            <span>
                                                {!! $testimonial->{'name_' . Lang()} !!}

                                                @if ($testimonial->{'job_title_' . Lang()} != null)
                                                    <span>
                                                        | {!! $testimonial->{'job_title_' . Lang()} !!}
                                                    </span>
                                                @endif

                                                @if ($testimonial->client_age != null)
                                                    <span>
                                                        | {!! $testimonial->client_age !!}
                                                    </span>
                                                @endif

                                                @if ($testimonial->country != null)
                                                    <span>
                                                        | {!! $testimonial->country !!}
                                                    </span>
                                                @endif

                                                <span>
                                                    | {!! Lang() == 'ar' ? $testimonial->created_at->format('Y-m-d') : $testimonial->created_at->format('d-m-Y') !!}
                                                </span>
                                            </span>
                                            <p class="text-center">
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
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev"><span></span></div>
                        <div class="swiper-button-next"><span></span></div>
                    </div>
                </div>

            </div>
        </div>
    </section>





@endif



@push('js')
    <script>
        $(document).ready(function() {
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                keyboard: {
                    enabled: true,
                    onlyInViewport: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
                effect: 'slide',
            });
        });
    </script>
@endpush
