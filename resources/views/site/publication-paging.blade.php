@if($publications->isEmpty())

    <h2 class="text-center text-warning text-capitalize">{!! trans('site.no_exist') !!} {!! $title !!} {!! trans('site.currently') !!}</h2>
@else
    <div class="grid-container grid-x grid-padding-x grid-padding-y">

        @foreach($publications as $publication)
            <div class="large-12 medium-12 small-12 cell my_news_section">
                <div class="left-post">
                    <img class="my_new_image"
                         src="{!! asset(\Illuminate\Support\Facades\Storage::url($publication->photo)) !!}"
                         alt="{!! Lang()=='ar'?$publication->title_ar:$publication->title_en !!}"
                    />
                    <div class="post-text">
                        <div class="meta-tags">
                            <i class="far fa-calendar-check"><span>{!! $publication->add_date !!}</span></i>
                        </div>
                        <h5>
                            <a href="#">{!! Lang()=='ar'?$publication->title_ar:$publication->title_en !!}</a>
                        </h5>
                        <p>
                            @if(Lang() == 'ar')
                                {!! \Illuminate\Support\Str::limit(strip_tags($publication->details_ar),$limit = 250, $end = '...')!!}
                            @else
                                {!! \Illuminate\Support\Str::limit(strip_tags($publication->details_en),$limit = 250, $end = '...')!!}
                            @endif
                        </p>
                        <a href="{!! route('publication', Lang()=='ar' ? str_replace(' ','-',$publication->title_ar): str_replace(' ','-',$publication->title_en)) !!}"
                           class="button secondary">{!! trans('site.read_more') !!}
                        </a>
                    </div>
                </div><!-- Left Post /-->
            </div><!-- cell /-->
        @endforeach

    </div>
    <!-- Grid Container -->

    <div class="container-fluid text-center">
        <div class="row {!! $publications->hasPages() ? 'my_pagination':'' !!} ">
            {{$publications->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@endif
