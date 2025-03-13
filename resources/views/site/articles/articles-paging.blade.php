@if ($articles->isEmpty())
    <h2 class="text-center text-warning text-capitalize">
        {!! __('site.no_exist') !!}
        {!! $title !!}
        {!! __('site.currently') !!}
    </h2>
@else
    <div class="grid-container grid-x grid-padding-x grid-padding-y">
        @foreach ($articles as $article)
            <div class="large-12 medium-12 small-12 cell my_news_section">
                <div class="left-post">
                    <img class="my_new_image" src="{!! asset('adminBoard/uploadedImages/articles/' . $article->photo) !!}" alt="{!! $article->{'title_' . Lang()} !!}" />
                    <div class="post-text">
                        <div class="meta-tags">
                            <i class="far fa-calendar-check"><span>{!! $article->publish_date !!}</span></i>
                        </div>
                        <h5>
                            <a href="{!! route('article', Lang() == 'ar' ? $article->title_ar_slug : $article->title_en_slug) !!}">
                                {!! $article->{'title_' . Lang()} !!}
                            </a>
                        </h5>
                        <p>
                            {!! \Illuminate\Support\Str::limit(strip_tags($article->{'abstract_' . Lang()}), $limit = 250, $end = '...') !!}
                        </p>
                        <a href="{!! route('article', Lang() == 'ar' ? $article->title_ar_slug : $article->title_en_slug) !!}" class="button secondary">
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
        <div class="row {!! $articles->hasPages() ? 'my_pagination' : '' !!} ">
            {{ $articles->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endif
