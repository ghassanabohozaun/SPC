<div class="call-to-action">
    <div class="grid-container grid-x grid-padding-x">

        <div class="large-12  medium-12 small-12 cell">
            <div class="left-side">
                <div class="left-side-img">
                    <img src="{!! asset('site/assets/images/help/icons/headphone.png') !!}" alt="Call Icon">
                </div>
                <div class="left-side-text">
                    <h4>{!! __('site.if_you_have_any_questions_schedule_an_appointment') !!}</h4>
                    <h2>{!! __('site.or_call_us_on') !!} <span>{!! setting()->site_mobile !!}</span></h2>
                </div>
            </div><!-- Left Side /-->
            <div class="right-side">
                <a href="{!! route('appointment') !!}" class="button secondary">{!! __('site.make_an_appointment') !!}</a>
            </div><!-- right Side /-->
        </div><!-- cell /-->

    </div><!-- Grid Container /-->
</div>
