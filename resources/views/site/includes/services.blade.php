<div class="services-section grey-bg dark-bg" dir="rtl">
    <div class="section-title">
        <h2>{!! trans('site.our_great') !!} <span>{!! trans('site.our_services') !!}</span></h2>
        <div class="section-title-icon">
            <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
        </div>
    </div><!-- Section Title /-->
    <div class="padding-between services-wrap bottom-icon-transparent">

        @if ($services->isEmpty())
            <h2 class="text-center text-center text-warning">{!! trans('site.no_services') !!}</h2>
        @else
            <div class="grid-container grid-x grid-padding-x grid-padding-y">
                @foreach ($services as $service)
                    <!-- Start Cell /-->
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="service-box">
                            <div class="service-icon">
                                <img src="{!! asset(\Illuminate\Support\Facades\Storage::url($service->photo)) !!}" alt="{!! Lang() == 'ar' ? $service->title_ar : $service->title_en !!}">
                            </div>
                            <div class="service-text">
                                <h4><a href="#">{!! Lang() == 'ar' ? $service->title_ar : $service->title_en !!}</a></h4>
                                <p>{!! Lang() == 'ar' ? $service->summary_ar : $service->summary_en !!}</p>
                                <a class="button secondary" href="{!! route(
                                    'service',
                                    Lang() == 'ar' ? str_replace(' ', '-', $service->title_ar) : str_replace(' ', '-', $service->title_en),
                                ) !!}">
                                    {!! trans('site.read_more') !!}
                                </a>
                            </div>
                        </div><!-- Service Box /-->
                    </div>
                    <!-- End Cell /-->
                @endforeach
            </div><!-- Grid Container /-->
        @endif


    </div><!-- Padding Between /-->
</div>
