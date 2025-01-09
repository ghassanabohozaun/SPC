<div>
    <div class="main-banner-new">
        @foreach ($sliders as $slider)
            <!-- Start Slide  /-->
            <div class="slide transparent-background my_slider"
                @if ($slider->photo) style="background-image: url({!! asset('adminBoard/uploadedImages/sliders/' . $slider->photo) !!});"
                  @else
                     style="background-image: url({!! asset('site/assets/images/bg-1.jpg') !!});" @endif>
                <div class="slide-text">
                    @if ($slider->details_status == __('sliders.show'))
                        <h2>
                            @if (Lang() == 'ar')
                                {!! $slider->title_ar !!}
                            @else
                                {!! $slider->title_en !!}
                            @endif
                        </h2>
                    @endif
                    {{-- @if ($slider->button_status == trans('sliders.show'))
                        <a class="button primary" href="{!! route(
                            'service',
                            Lang() == 'ar'
                                ? str_replace(' ', '-', $slider->service->title_ar)
                                : str_replace(' ', '-', $slider->service->title_en),
                        ) !!}">
                            {!! trans('site.read_more') !!}</a>
                    @endif --}}

                </div>
            </div>
            <!-- End Slide  /-->
        @endforeach

    </div><!-- Main Banner /-->

</div>
