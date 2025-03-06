<div class="header-top">
    <div class="grid-container grid-x grid-padding-x">
        <!-- Start logo /-->
        <div class="large-7 medium-7 small-12 cell">
            <div class="logo">
                <a href="{!! route('index') !!}">
                    @if (Lang() == 'ar')
                        <img src="{!! asset('site/assets/images/logo/HeaderLogoRight.png') !!}" alt="Sustainable psychotherapy Centre Logo" width="580" />
                    @else
                        <img src="{!! asset('site/assets/images/logo/HeaderLogoLeft.png') !!}" alt="Sustainable psychotherapy Centre Logo" width="580" />
                    @endif
                </a>
            </div>
        </div>
        <!-- End  logo /-->


        <!-- Start Social /-->
        <div class="large-5 medium-5 small-12 cell">
            <div class="my_new_menu" id="">
                <div class="hover-box">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a class="dedcription-btn" href="{!! route('appointment') !!}">
                                <span class="name-descripeion">{!! trans('site.book_by_email') !!}</span>
                                <div class="btn-icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <a class="dedcription-btn" href="https://wa.me/{!! setting()->site_mobile !!}">
                                <span class="name-descripeion">{!! trans('site.book_by_whatsapp') !!}</span>
                                <div class="btn-icon heart">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <a class="dedcription-btn" href="{!! route('testimonials') !!}">
                                <span class="name-descripeion">{!! trans('site.feedbacks') !!}</span>
                                <div class="btn-icon book">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                            </a>
                        </div>
                        @if (setting()->lang_front_button_status == 'on')
                            @if (Lang() == 'ar')
                                <div class="col-sm-12 col-md-6">
                                    <a class="dedcription-btn" href="/en">
                                        <span class="name-descripeion" id="ar_lang_description">ع</span>
                                        <div class="btn-icon brain">
                                            <i class="fas fa-globe"></i>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-sm-12 col-md-6">
                                    <a class="dedcription-btn" href="/ar">
                                        <span class="name-descripeion" id="en_lang_description">EN</span>
                                        <div class="btn-icon brain">
                                            <i class="fas fa-globe"></i>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- End Social /-->

    </div><!-- Grid Container /-->


</div>
