@if ($videos->isEmpty())
    <h2 class="text-capitalize text-warning text-center">{!! trans('site.no_videos') !!}</h2>
@else
    <div class="container my_video_section my_lead">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($videos as $video)
                <div class="col">
                    <a data-fancybox="" data-small-btn="true"
                        href="https://www.youtube.com/watch?v={!! $video->link !!}">
                        <div class="card">
                            <img class="youtube_icon" src="{!! asset('site/assets/images/youtube_icon2.png') !!}" width="100">
                            <img class="card-img-top" id='my-card-img-top' src="{!! $video->photo == null
                                ? 'https://img.youtube.com/vi/WKYGTgsX2Wg/mqdefault.jpg'
                                : asset('adminBoard/uploadedImages/videos/' . $video->photo) !!} "
                                alt="{!! $video->{'title_' . Lang()} !!}">

                            <div class="card-body">
                                <div class="card-text">
                                    {!! $video->{'title_' . Lang()} !!}
                                    @if ($video->duration != null && $video->added_date)
                                        <div class="my_card_text">
                                            @if ($video->duration != null)
                                                <div class="{!! Lang() == 'ar' ? 'float-left' : 'float-right' !!}">
                                                    {!! trans('site.duration') !!} : {!! $video->duration !!}
                                                </div>
                                            @endif
                                            @if ($video->added_date != null)
                                                <div class="{!! Lang() == 'ar' ? 'float-right' : 'float-left' !!}">
                                                    <i class="fas fa-calendar-alt"></i> {!! $video->added_date !!}
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="container-fluid text-center">
            <div class="row {!! $videos->hasPages() ? 'my_pagination' : '' !!} ">
                {{ $videos->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>

    </div>
@endif
