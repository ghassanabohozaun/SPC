<div>
    @if (!$sliders->isEmpty())
        <div class="swiper-container">

            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">

                @foreach ($sliders as $slider)
                    <!-- Slider -->
                    <div class="swiper-slide" style="background-image: url({!! asset('adminBoard/uploadedImages/sliders/' . $slider->photo) !!});">
                        <div class="slide-text">
                            @if ($slider->details_status == __('sliders.show'))
                                <h1 style="color: #ffffff">
                                    {!! $slider->{'title_' . Lang()} !!}
                                </h1>
                            @endif
                            {{-- <p>Here goes a little description to fill this tiny empty space.</p> --}}
                            <!--slider button /-->
                            @if ($slider->button_status == __('sliders.show'))
                                @if (!empty($slider->url_en) && Lang() == 'en')
                                    <button class="btn">
                                        <a class="slider_anchor" href="{!! $slider->url_en !!}" target="_blank">
                                            {!! __('site.read_more') !!}
                                        </a>
                                    </button>
                                @endif


                                @if (!empty($slider->url_ar) && Lang() == 'ar')
                                    <button class="btn">
                                        <a class="slider_anchor" href="{!! $slider->url_ar !!}" target="_blank">
                                            {!! __('site.read_more') !!}
                                        </a>
                                    </button>
                                @endif
                            @endif
                        </div>
                    </div>
                    <!-- END Slider -->
                @endforeach


            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"><span></span></div>
            <div class="swiper-button-next"><span></span></div>

        </div>
    @endif
</div>

@push('js')
    <script type="text/javascript">
        // swiper
        var mySwiper = new Swiper('.swiper-container', {
            effect: '',
            loop: false,
            speed: 1000,
            slidesPerView: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: 'true'
            },



        });
    </script>
@endpush
