@if ($news->isEmpty())
    <h2 class="text-center text-warning text-capitalize">
        {!! __('site.no_exist') !!}
        {!! $title !!}
        {!! __('site.currently') !!}
    </h2>
@else
    <div class="grid-container grid-x grid-padding-x grid-padding-y">
        @foreach ($news as $new)
            <div class="large-12 medium-12 small-12 cell my_news_section">
                <div class="left-post">
                    <img class="my_new_image" src="{!! asset('adminBoard/uploadedImages/news/' . $new->photo) !!}" alt="{!! $new->{'title_' . Lang()} !!}" />
                    <div class="post-text">
                        <div class="meta-tags">
                            <i class="far fa-calendar-check"><span>{!! $new->added_date !!}</span></i>
                        </div>
                        <h5>
                            <a href="{!! route('new', Lang() == 'ar' ? $new->title_ar_slug : $new->title_en_slug) !!}">
                                {!! $new->{'title_' . Lang()} !!}
                            </a>
                        </h5>
                        <p>
                            {!! \Illuminate\Support\Str::limit(strip_tags($new->{'details_' . Lang()}), $limit = 250, $end = '...') !!}
                        </p>
                        <a href="{!! route('new', Lang() == 'ar' ? $new->title_ar_slug : $new->title_en_slug) !!}" class="button secondary">
                            {!! trans('site.read_more') !!}
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div><!-- Left Post /-->
            </div><!-- cell /-->
        @endforeach

    </div>
    <!-- Grid Container -->
    <div class="container-fluid text-center">
        <div class="row {!! $news->hasPages() ? 'my_pagination' : '' !!} ">
            {{ $news->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endif
