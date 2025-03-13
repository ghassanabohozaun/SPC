<div class="blog-section  services-section  grey-bg dark-bg margin-top-minius-1">
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
        @if ($latest_news->isEmpty())
            <h2 class="text-capitalize text-center text-warning">{!! trans('site.no_publications') !!}</h2>
        @else
            @foreach ($latest_news as $new)
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="my_new_image_card" src="{!! asset('adminBoard/uploadedImages/news/' . $new->photo) !!}"
                                        alt="{!! $new->{'title_' . Lang()} !!}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="meta-tags">
                                            <i class="far fa-calendar-check"><span>{!! $new->added_date !!}</span></i>
                                        </div>
                                        <h5 class="card-title">{!! $new->{'title_' . Lang()} !!}</h5>
                                        <p class="card-text">
                                            {!! \Illuminate\Support\Str::limit(strip_tags($new->{'details_' . Lang()}), $limit = 250, $end = '...') !!}
                                        </p>
                                        <a href="{!! route('new', Lang() == 'ar' ? $new->title_ar_slug : $new->title_en_slug) !!}" class="button secondary">
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
