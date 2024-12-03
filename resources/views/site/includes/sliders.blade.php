<section class="banner-section style-two">
    <div class="banner-carousel">
        <div class="swiper-container banner-content">
            <div class="swiper-wrapper">
                @forelse($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="image-layer"
                             style="background-image: url({{asset('adminBoard/uploadedImages/sliders/'.$slider->photo)}});">
                        </div>
                        <div class="auto-container">
                            <div class="content-box">
{{--                                <figure class="icon-layer">--}}
{{--                                    <img src="{!! asset('site/assets/images/icons/heart-5.png') !!}"--}}
{{--                                         alt="{!!  $slider->{'title_'.Lang()} !!}">--}}
{{--                                </figure>--}}
                                <div class="shape"
                                     style="background-image: url({{asset('site/assets/images/shape/shape-31.png')}});">
                                </div>
                                <span></span>
                                @if($slider->details_status == trans('sliders.show'))
                                    <h2>{!!  $slider->{'title_'.Lang()} !!}</h2>
                                    <p>{!! $slider->{'details_'.Lang()} !!}</p>
                                @else
                                    <h2>&nbsp;</h2>
                                    <p>&nbsp;</p>
                                @endif

                                @if($slider->details_status == 'show')
                                    {{--  <div class="btn-box">--}}
                                    {{--  <a href="#" class="banner-btn">Read More</a>--}}
                                    {{-- </div>--}}
                                @else
                                    <div class="btn-box">&nbsp;</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse


            </div>
            <div class="swiper-nav-button">
                <!-- Add Arrows -->
                <div class="swiper-button-next">
                    <i class="far {!! Lang()=='ar'? 'fa-arrow-left' :'fa-arrow-right' !!}"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="far {!! Lang()=='ar'? 'fa-arrow-right' :'fa-arrow-left' !!} "></i>
                </div>
            </div>
        </div>
    </div>
</section>
