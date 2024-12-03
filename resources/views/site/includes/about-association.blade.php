<section class="about-section sec-pad mt-5">
    <div class="pattern-layer"
         style="background-image: url({!! asset('/site/assets/images/shape/shape-5.png') !!});"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div class="image_block_1">
                    <div class="image-box">
                        <figure class="image image-1">
                            <img src="{!! asset('/site/assets/images/about1.png') !!}" alt="">
                        </figure>
                        <figure class="image image-2">
                            <img src="{!! asset('/site/assets/images/about2.png') !!}" alt="">
                        </figure>
                        <figure class="image image-3">
                            <img src="{!! asset('/site/assets/images/icons/heart-2.png') !!}" alt="">
                        </figure>
                        <figure class="image image-4">
                            <img src="{!! asset('/site/assets/images/icons/heart-3.png') !!}" alt="">
                        </figure>
                        <figure class="image image-5">
                            <img src="{!! asset('/site/assets/images/icons/imoji-1.png') !!}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content_block_1">
                    <div class="content-box">
                        <div class="inner">
                            <div class="sec-title">
                                <span class="top-text">{!! __('index.about_association') !!}</span>
                                <h2>{!! fixedTexts()->{'about_association_title_'.Lang()} !!}</h2>
                            </div>
                            <div class="text">
                                <p>{!! fixedTexts()->{'about_association_details_'.Lang()} !!}</p>
                            </div>
{{--                            <div class="btn-box">--}}
{{--                                <a href="#" class="theme-btn btn-one">{!! __('index.read_more') !!}</a>--}}
{{--                            </div>--}}
                        </div>
                        <div class="funfact-inner">
                            <div class="counter-block-one wow fadeInRight animated animated animated"
                                 data-wow-delay="00ms" data-wow-duration="1500ms"
                                 style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInRight;">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-charity"></i></div>
                                    <div class="count-outer count-box counted">
                                        <span class="count-text" data-speed="1500"
                                              data-stop="{!!  fixedTexts()->about_association_founders_count !!}">
                                            {!!  fixedTexts()->about_association_founders_count !!}
                                        </span>
                                    </div>
                                    <h4>{!! __('index.funders') !!}</h4>
                                </div>
                            </div>
                            <div class="counter-block-one wow fadeInRight animated animated animated"
                                 data-wow-delay="100ms" data-wow-duration="1500ms"
                                 style="visibility: visible; animation-duration: 1500ms; animation-delay: 100ms; animation-name: fadeInRight;">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-donation-1"></i></div>
                                    <div class="count-outer count-box counted">
                                        <span class="count-text" data-speed="1500"
                                              data-stop="{!!  fixedTexts()->about_association_beneficiaries_count !!}">
                                            {!!  fixedTexts()->about_association_beneficiaries_count !!}
                                        </span>
                                    </div>
                                    <h4>{!! __('index.beneficiaries') !!}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
