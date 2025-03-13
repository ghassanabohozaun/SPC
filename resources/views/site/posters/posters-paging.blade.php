@if ($posters->isEmpty())
    <h2 class="text-center text-warning text-capitalize">
        {!! __('site.no_exist') !!}
        {!! $title !!}
        {!! __('site.currently') !!}
    </h2>
@else
    <div class="grid-container grid-x grid-padding-x grid-padding-y">
        @foreach ($posters as $poster)
            <div class="large-12 medium-12 small-12 cell my_news_section">
                <div class="left-post">
                    <img class="my_new_image" src="{!! asset('adminBoard/uploadedImages/posters/' . $poster->photo) !!}" alt="{!! $poster->{'title_' . Lang()} !!}" />
                    <div class="post-text">
                        <div class="meta-tags">
                            <i class="far fa-calendar-check"><span>{!! $poster->added_date !!}</span></i>
                            &nbsp;&nbsp;<i class="fa fa-pen-square">
                                <span>{!! $poster->publisher_name !!}</span>
                            </i> &nbsp;&nbsp;
                        </div>
                        <h5>
                            <a href="javascript:void(0)">
                                {!! $poster->{'title_' . Lang()} !!}
                            </a>
                        </h5>

                        @if ($poster->file != null)
                            <a href="{!! asset('adminBoard/uploadedFiles/posters/' . $poster->file) !!}">
                                <h4 class="website_color">
                                    <i class="fas fa-file-pdf"></i>
                                    &nbsp; {!! __('general.download') !!} &nbsp;
                                </h4>
                            </a>
                        @endif

                        <div class="clearfix"></div>
                    </div>
                </div><!-- Left Post /-->
            </div><!-- cell /-->
        @endforeach

    </div>
    <!-- Grid Container -->
    <div class="container-fluid text-center">
        <div class="row {!! $posters->hasPages() ? 'my_pagination' : '' !!} ">
            {{ $posters->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endif
