@if (!$offers->isEmpty())

    <div class="offers my-offers-section my-offers-dark-bg grey-bg">

        <!-- Start Section Title /-->
        <div class="section-title">
            <h2>{!! __('site.what') !!} <span> {!! __('site.we_will_offer') !!}</span></h2>
            <div class="section-title-icon">
                <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
            </div>
        </div>
        <!-- End Section Title /-->

        <!-- Start offer Slide Container /-->
        <div class="grid-container grid-x grid-padding-x">
            <div class="small-12 cell">
                <div class="offer-slid">
                    @foreach ($offers as $offer)
                        <div class="col">
                            <a href="{!! route('service', $offer->{'title_' . Lang() . '_slug'}) !!}">
                                <div class="card h-100">
                                    <img src="{!! asset('adminBoard/uploadedImages/services/' . $offer->photo) !!}" class="card-img-top"
                                        alt="{!! $offer->{'title_' . Lang()} !!}">
                                    <div class="card-body">
                                        <h4 class="text-white text-center card-title">
                                            {!! $offer->{'title_' . Lang()} !!}
                                        </h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Start offer Slide Container /-->
    </div>
@endif
