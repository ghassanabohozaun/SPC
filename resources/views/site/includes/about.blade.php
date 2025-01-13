<div class="about-section my-about-section grey-bg top-icon-transparent bottom-icon-transparent">
    <div class="grid-container grid-x grid-padding-x">

        <div class="large-6 medium-12 small-12 cell">
            <!-- Start about-section-text /-->
            <div class="about-section-text" dir="rtl">
                <h2>{!! __('site.welcome_to') !!} <span>{!! fixedTexts()->{'about_spc_title_' . Lang()} !!}</span></h2>
                <p class="my_lead">
                    {!! fixedTexts()->{'about_spc_details_' . Lang()} !!}
                </p>
                <div class="grid-container grid-x">
                    <h3>{!! __('site.sustainable_psychotherapy_goals') !!} </h3>

                    <div class="large-12 medium-12 small-12 cell">
                        <div class="info-box">
                            <h6 class="my_lead">
                                <i class="fa fa-square-full"></i>
                                {!! fixedTexts()->{'about_spc_goal_one_' . Lang()} !!}
                            </h6>
                        </div>
                    </div><!-- Cell /-->

                    <div class="large-12 medium-12 small-12 cell">
                        <div class="info-box">
                            <h6 class="my_lead">
                                <i class="fa fa-square-full"></i>
                                {!! fixedTexts()->{'about_spc_goal_two_' . Lang()} !!}
                            </h6>
                        </div>
                    </div><!-- Cell /-->

                    <div class="large-12 medium-12 small-12 cell">
                        <div class="info-box">
                            <h6 class="my_lead">
                                <i class="fa fa-square-full"></i>
                                {!! fixedTexts()->{'about_spc_goal_three_' . Lang()} !!}

                            </h6>
                        </div>
                    </div><!-- Cell /-->

                    <div class="large-12 medium-12 small-12 cell">
                        <div class="info-box">
                            <h6 class="my_lead">
                                <i class="fa fa-square-full"></i>
                                {!! fixedTexts()->{'about_spc_goal_four_' . Lang()} !!}

                            </h6>
                        </div>
                    </div><!-- Cell /-->
                </div>
                <div class="clearfix"></div>
                <a class="button primary" href="{!! route('about.spa') !!}">{!! __('site.read_more') !!}</a>
            </div>
            <!-- End about-section-text /-->
        </div><!-- Cell /-->

        <div class="large-6 medium-12 small-12 cell">
            <div class="about-section-img">
                @if (!empty(fixedTexts()->about_spc_photo))
                    <img src="{!! asset('site/assets/images/doctor1.png') !!}" alt="">
                @endif
            </div><!-- About Section Img /-->
        </div><!-- Cell /-->

    </div><!-- Grid Container /-->
</div>
