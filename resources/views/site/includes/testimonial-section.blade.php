@if(!$testimonials->isEmpty())
    <section class="testimonial-section mt-5">
        <div class="pattern-layer"
             style="background-image: url({{asset('site/assets/images/shape/shape-24.png')}});"></div>
        <div class="auto-container">
            <div class="row clearfix">

                <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                    <div class="content_block_3">
                        <div class="content-box">
                            <div class="sec-title">
                                <span class="top-text">{!! __('index.testimonials') !!}</span>
                                <h2>{!! fixedTexts()->{'testimonials_title_'.Lang()} !!}</h2>
                            </div>
                            <div class="text">
                                <p>{!! fixedTexts()->{'testimonials_details_'.Lang()} !!}</p>
                                <a href="#" class="theme-btn btn-one">{!! __('index.all_reviews') !!}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12 inner-column">


                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{!! asset('site/assets/images/testimonial-1.jpg') !!}"
                                 alt="{!! __('index.testimonials') !!}">
                        </figure>
                        <div class="testimonial-inner">
                            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">

                                @foreach($testimonials as $testimonial)
                                    <div class="testimonial-block-one">
                                        <div class="text">
                                            <div class="icon-box">
                                                <i class="fas fa-quote-left"></i>
                                            </div>
                                            <p>{!! $testimonial->{'opinion_'.Lang()} !!}</p>

                                            <h4>
                                                {!! $testimonial->{'name_'.Lang()} !!}
                                                , {!! $testimonial->age !!}
                                                , {!! $testimonial->gender !!}
                                            </h4>

                                            <span class="designation">{!! $testimonial->country !!} </span>
                                            <p>
                                                @if($testimonial->rating != null)
                                                    <span>
                                                     @for ($i = 1; $i <= $testimonial->rating; $i++)
                                                            <i class="fa fa-star" style="color:#FFA400"></i>
                                                        @endfor
                                                 </span>
                                                @endif
                                            </p>
                                        </div>
                                        <figure class="testimonial-thumb">

                                            @if($testimonial->photo == null)
                                                @if($testimonial->gender == __('general.male'))
                                                    <img src="{{asset('adminBoard/images/male.jpeg')}}"
                                                         alt="{!! $testimonial->{'opinion_'.Lang()} !!}">
                                                @elseif($testimonial->gender == __('general.female'))
                                                    <img src="{{asset('adminBoard/images/female.jpeg')}}"
                                                         alt="{!! $testimonial->{'opinion_'.Lang()} !!}">
                                                @endif
                                            @else
                                                <img
                                                    src="{{asset('adminBoard/uploadedImages/testimonials/'.$testimonial->photo)}}"
                                                    alt="{!! $testimonial->{'opinion_'.Lang()} !!}">
                                            @endif

                                        </figure>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endif
