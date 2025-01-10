<div>
    @if (!$sliders->isEmpty())
        <!-- Main Banner /-->
        <div class="main-banner-new">
            @foreach ($sliders as $slider)
                <!-- Start Slide  /-->
                <div class="slide transparent-background my_slider"
                    style="background-image: url({!! asset('adminBoard/uploadedImages/sliders/' . $slider->photo) !!});">
                    <div class="slide-text">

                        <!--slider details /-->
                        @if ($slider->details_status == __('sliders.show'))
                            <h2>
                                {!! $slider->{'title_' . Lang()} !!}
                            </h2>
                        @endif

                        <!--slider button /-->
                        @if ($slider->button_status == __('sliders.show'))
                            @if (!empty($slider->url_en) && Lang() == 'en')
                                <a class="button primary" href="{!! $slider->url_en !!}" target="_blank">
                                    {!! __('site.read_more') !!}</a>
                            @endif


                            @if (!empty($slider->url_ar) && Lang() == 'ar')
                                <a class="button primary" href="{!! $slider->url_ar !!}" target="_blank">
                                    {!! __('site.read_more') !!}</a>
                            @endif
                        @endif

                    </div>
                </div>
                <!-- End Slide  /-->
            @endforeach

        </div>
        <!-- Main Banner /-->
    @endif
</div>
