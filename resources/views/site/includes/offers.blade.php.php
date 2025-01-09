<div class="offers my-offers-section my-offers-dark-bg grey-bg">

<!-- Start Section Title /-->
<div class="section-title">
    <h2>{!! trans('site.what') !!} <span> {!! trans('site.we_will_offer') !!}</span></h2>
    <div class="section-title-icon">
        <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
    </div>
</div>
<!-- End Section Title /-->

<!-- Start offer Slide Container /-->
@if ($offers->isEmpty())
    <h2 class="text-warning text-capitalize text-center">{!! trans('site.no_offers') !!}</h2>
@else
    <div class="grid-container grid-x grid-padding-x">
        <div class="small-12 cell">
            <div class="offer-slid">
                @foreach ($offers as $offer)
                    <div class="col">
                        <a href="{!! route(
                            'service',
                            Lang() == 'ar' ? str_replace(' ', '-', $offer->title_ar) : str_replace(' ', '-', $offer->title_en),
                        ) !!}">
                            <div class="card h-100">
                                <img src="{!! asset(\Illuminate\Support\Facades\Storage::url($offer->photo)) !!}" class="card-img-top"
                                    alt="{!! Lang() == 'ar' ? $offer->title_ar : $offer->title_en !!}">
                                <div class="card-body">
                                    <h4 class="text-white text-center card-title">
                                        {!! Lang() == 'ar' ? $offer->title_ar : $offer->title_en !!}
                                    </h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
<!-- Start offer Slide Container /-->
</div>
