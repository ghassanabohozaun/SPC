@if (!$tests->isEmpty())
    <div class="our-partners  my_tests_section dark-bg grey-bg">
        <!-- Start Section Title /-->
        <div class="section-title">
            <h2>{!! trans('site.recent') !!} <span> {!! trans('site.tests') !!}</span></h2>
            <div class="section-title-icon">
                <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
            </div>
        </div>
        <!-- End Section Title /-->

        <!-- Start Container /-->
        <div class="grid-container grid-x grid-padding-x">
            <div class="small-12 cell">
                <div class="partners">
                    @foreach ($tests as $test)
                        <div class="partners-logo">
                            <div class="team-box hover-wrap">
                                <div class="hover-img">
                                    <img src="{!! asset('adminBoard/uploadedImages/tests/' . $test->test_photo) !!}" alt="{!! $test->test_name !!}">
                                    <div class="team-detail hover-info">
                                        <div class="row">
                                            <a href="{!! route('get.test.details', str_replace(' ', '-', $test->test_name)) !!}"
                                                class="button primary partner_anchor">{!! trans('site.show_test') !!}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-text">
                                    <h5>{!! $test->test_name !!}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- Grid Container /-->
        <!-- End Container /-->
    </div>
@endif
