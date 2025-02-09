@if (!empty(aboutSite()->{'about_doctor_' . Lang()}))
    <div class="book-preview dark-bg grey-bg ">
        <img src="{!! asset('site/assets/images/doctor55.png') !!}" alt="">
        <div class="grid-container grid-x grid-padding-x">
            <div class="large-7 medium-7 small-12 large-offset-5 cell">
                <div class="book-text">
                    <h2>{!! __('site.about') !!} <span>{!! __('site.doctor') !!}</span></h2>
                    <p class="my_lead">{!! strip_tags(aboutSite()->{'about_doctor_' . Lang()}) !!}</p>
                </div>
                <!-- Book Text /-->
            </div>
            <!-- Cell /-->
        </div><!-- Grid Container /-->
    </div>
@endif
