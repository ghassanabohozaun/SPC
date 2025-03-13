@if ($books->isEmpty())
    <h2 class="text-center text-warning text-capitalize">
        {!! __('site.no_exist') !!}
        {!! $title !!}
        {!! __('site.currently') !!}
    </h2>
@else
    <div class="grid-container grid-x grid-padding-x grid-padding-y">
        @foreach ($books as $book)
            <div class="large-12 medium-12 small-12 cell my_news_section">
                <div class="left-post">
                    <img class="my_new_image" src="{!! asset('adminBoard/uploadedImages/books/' . $book->photo) !!}" alt="{!! $book->{'title_' . Lang()} !!}" />
                    <div class="post-text">
                        <div class="meta-tags">
                            <i class="far fa-calendar-check"><span>{!! $book->publish_date !!}</span></i>
                            @if ($book->file != null)
                                &nbsp; &nbsp;<i class=" fas fa-file-pdf website_color">
                                    <a href="{!! asset('adminBoard/uploadedFiles/books/' . $book->file) !!}">
                                        {!! __('general.download') !!}
                                    </a>
                                </i>
                            @endif
                        </div>
                        <h5>
                            <a href="{!! route('book', Lang() == 'ar' ? $book->title_ar_slug : $book->title_en_slug) !!}">
                                {!! $book->{'title_' . Lang()} !!}
                            </a>
                        </h5>
                        <p>
                            {!! \Illuminate\Support\Str::limit(strip_tags($book->{'abstract_' . Lang()}), $limit = 250, $end = '...') !!}
                        </p>
                        <br />

                        <a href="{!! route('book', Lang() == 'ar' ? $book->title_ar_slug : $book->title_en_slug) !!}" class="button secondary">
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
        <div class="row {!! $books->hasPages() ? 'my_pagination' : '' !!} ">
            {{ $books->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endif
