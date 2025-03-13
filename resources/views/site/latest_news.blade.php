<h6>{!! trans('site.latest_news') !!}</h6>
<div class="widget-content ">
    @foreach ($latest_news as $latest_new)
        <div class="popular-post">
            <div class="row">
                <div class="col">
                    <div class="card h-100">
                        <a href="{!! route('new', Lang() == 'ar' ? $latest_new->title_ar_slug : $latest_new->title_en_slug) !!}">
                            <img src="{!! asset('adminBoard/UploadedImages/news/' . $latest_new->photo) !!}" class="card-img-top" alt="{!! $latest_new->{'title_' . Lang()} !!}">
                        </a>
                        <div class="card-body">
                            <a href="{!! route('new', Lang() == 'ar' ? $latest_new->title_ar_slug : $latest_new->title_en_slug) !!}">
                                <h5 class="card-title text-center">{!! $latest_new->{'title_' . Lang()} !!}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
