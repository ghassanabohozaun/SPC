<div class="blog-section bottom-icon-transparent ">
    <!-- Start Section Title /-->
    <div class="section-title">
        <h2>{!! trans('site.recent') !!} <span>{!! trans('site.publications') !!}</span></h2>
        <div class="section-title-icon">
            <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
        </div>
    </div>
    <!-- End Section Title /-->

    <!-- Start Container /-->
    <div class="container my_publications_section">
        @if ($publications->isEmpty())
            <h2 class="text-capitalize text-center text-warning">{!! trans('site.no_publications') !!}</h2>
        @else
            <div class="row">
                @foreach ($publications as $publication)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{!! asset(\Illuminate\Support\Facades\Storage::url($publication->photo)) !!}" class="card-img-top" alt="{!! Lang() == 'ar' ? $publication->title_ar : $publication->title_en !!}">
                            <div class="card-body">
                                <div class="meta-tags">
                                    <i class="far fa-calendar-check"><span>{!! $publication->add_date !!}</span></i>
                                </div>
                                <h5 class="card-title">{!! Lang() == 'ar' ? $publication->title_ar : $publication->title_en !!}</h5>
                                <p class="card-text my_lead">
                                    @if (Lang() == 'ar')
                                        {!! \Illuminate\Support\Str::limit(strip_tags($publication->details_ar), $limit = 140, $end = '...') !!}
                                    @else
                                        {!! \Illuminate\Support\Str::limit(strip_tags($publication->details_en), $limit = 140, $end = '...') !!}
                                    @endif
                                </p>
                                <a href="{!! route(
                                    'publication',
                                    Lang() == 'ar' ? str_replace(' ', '-', $publication->title_ar) : str_replace(' ', '-', $publication->title_en),
                                ) !!}" class="button secondary">
                                    {!! trans('site.read_more') !!}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <!-- End Container /-->
</div>
