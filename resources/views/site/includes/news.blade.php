<div class="blog-section  services-section  grey-bg dark-bg">
    <!-- Start Section Title /-->
    <div class="section-title">
        <h2>{!! trans('site.recent') !!} <span>{!! trans('site.news') !!}</span></h2>
        <div class="section-title-icon">
            <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
        </div>
    </div>
    <!-- End Section Title /-->

    <!-- Start Container /-->
    <div class="container my_news_section">
        @if ($news->isEmpty())
            <h2 class="text-capitalize text-center text-warning">{!! trans('site.no_publications') !!}</h2>
        @else
            @foreach ($news as $new)
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="my_new_image_card" src="{!! asset(\Illuminate\Support\Facades\Storage::url($new->photo)) !!}"
                                        alt="{!! Lang() == 'ar' ? $new->title_ar : $new->title_en !!}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="meta-tags">
                                            <i class="far fa-calendar-check"><span>{!! $new->add_date !!}</span></i>
                                        </div>
                                        <h5 class="card-title">{!! Lang() == 'ar' ? $new->title_ar : $new->title_en !!}</h5>
                                        <p class="card-text">
                                            @if (Lang() == 'ar')
                                                {!! \Illuminate\Support\Str::limit(strip_tags($new->details_ar), $limit = 250, $end = '...') !!}
                                            @else
                                                {!! \Illuminate\Support\Str::limit(strip_tags($new->details_en), $limit = 250, $end = '...') !!}
                                            @endif
                                        </p>
                                        <a href="{!! route(
                                            'publication',
                                            Lang() == 'ar' ? str_replace(' ', '-', $new->title_ar) : str_replace(' ', '-', $new->title_en),
                                        ) !!}" class="button secondary">
                                            {!! trans('site.read_more') !!}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <!-- End Container /-->
</div>
