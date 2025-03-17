@if (!$services->isEmpty())
    <div class="services-section grey-bg dark-bg">
        <div class="section-title">
            <h2>{!! __('site.our_great') !!} <span>{!! __('site.our_services') !!}</span></h2>
            <div class="section-title-icon">
                <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
            </div>
        </div><!-- Section Title /-->
        <div class="padding-between services-wrap bottom-icon-transparent">


            <div class="grid-container grid-x grid-padding-x grid-padding-y">
                @foreach ($services as $service)
                    <!-- Start Cell /-->
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="service-box">
                            @if (!empty($service->photo))
                                <div class="service-icon">
                                    <img src="{!! asset('adminBoard/uploadedImages/services/' . $service->photo) !!}" alt="{!! $service->{'summary_' . Lang()} !!}">
                                </div>
                            @else
                                <div class="service-icon">
                                    <img src="{!! asset('site/assets/images/backgrounds/services-3.jpg') !!}" alt="{!! $service->{'summary_' . Lang()} !!}">
                                </div>
                            @endif
                            <div class="service-text">
                                <h5><a href="javascript:;">{!! Lang() == 'ar' ? $service->title_ar : $service->title_en !!}</a></h5>
                                <p>
                                    {!! \Illuminate\Support\Str::limit(strip_tags($service->{'details_' . Lang()}), $limit = 100, $end = '...') !!}
                                </p>
                                <a class="button secondary" href="{!! route('service', $service->{'title_' . Lang() . '_slug'}) !!}">
                                    {!! __('site.read_more') !!}
                                </a>
                            </div>
                        </div><!-- Service Box /-->
                    </div>
                    <!-- End Cell /-->
                @endforeach
            </div><!-- Grid Container /-->

        </div><!-- Padding Between /-->
    </div>
@endif
