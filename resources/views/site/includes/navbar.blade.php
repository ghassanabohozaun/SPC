<div class="header-Wrap navigation-full-width my_navbar_section">

    <div class="grid-container grid-x grid-padding-x">
        <!-- Start Navbar /-->
        <div class="large-9 medium-8 small-12 cell">
            <div class="top-bar">
                <div class="top-bar-title">
                    <span data-responsive-toggle="responsive-menu" data-hide-for="large">
                        <a data-toggle=""><span class="menu-icon dark"></span></a>
                    </span>
                </div>
                <nav id="responsive-menu">
                    <ul class="menu  vertical large-horizontal dropdown"
                        data-responsive-menu="accordion medium-dropdown" role="menubar"
                        data-dropdown-menu="4gg5js-dropdown-menu" data-disable-hover="true">

                        <li role="menuitem">
                            <a href="{!! route('index') !!}">{!! trans('site.home') !!}</a>
                        </li>

                        <li role="menuitem">
                            <a href="{!! route('about.spa') !!}">{!! trans('site.about_spa') !!}</a>
                        </li>

                        {{-- services --}}
                        {{-- <li class="single-sub parent-nav is-dropdown-submenu-parent opens-right" role="menuitem"
                            aria-haspopup="true" aria-expanded="false" aria-label="Courses">
                            <a href="{!! route('services') !!}">{!! trans('site.services') !!}</a>
                            <ul class="child-nav menu vertical submenu is-dropdown-submenu first-sub" data-submenu=""
                                aria-hidden="true" role="menu">
                                @foreach (\App\Models\Service::orderBy('created_at', 'asc')->where('is_treatment_area', '=', '0')->get() as $navService)
                                    <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item">
                                        <a href="{!! route(
                                            'service',
                                            Lang() == 'ar' ? str_replace(' ', '-', $navService->title_ar) : str_replace(' ', '-', $navService->title_en),
                                        ) !!}">
                                            {!! Lang() == 'ar' ? $navService->title_ar : $navService->title_en !!}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li> --}}

                        <li role="menuitem">
                            <a href="{!! route('tests') !!}">{!! trans('site.tests') !!}</a>
                        </li>

                        <li role="menuitem">
                            <a href="{!! route('trainings') !!}">{!! trans('site.trainings') !!}</a>
                        </li>

                        {{-- publications --}}
                        {{-- <li class="single-sub parent-nav is-dropdown-submenu-parent opens-right" role="menuitem"
                            aria-haspopup="true" aria-expanded="false" aria-label="Courses">
                            <a href="javascript:void(0)">{!! trans('site.publications') !!}</a>
                            <ul class="child-nav menu vertical submenu is-dropdown-submenu first-sub" data-submenu=""
                                aria-hidden="true" role="menu">
                                @foreach (\App\Models\Section::where('id', '<>', '4')->get() as $navSection)
                                    <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item">
                                        <a href="{!! route('publications') !!}/{!! Lang() == 'ar' ? $navSection->title_ar : $navSection->title_en !!}">
                                            {!! Lang() == 'ar' ? $navSection->title_ar : $navSection->title_en !!}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li> --}}


                        <li role="menuitem"><a href="{!! route('contact') !!}">{!! trans('site.contact') !!}</a></li>
                    </ul>
                </nav>
            </div><!-- top-bar Ends -->
            <div class="clearfix"></div>
        </div>
        <!-- End Navbar /-->

        <!-- Start Social /-->
        <div class="large-3 medium-4 small-12 cell">
            <div class="social-icons">
                <ul class="menu">
                    <li>
                        <a onclick="return {!! setting()->site_facebook ? 'true' : 'false' !!};" href="{!! setting()->site_facebook !!}">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>

                    <li>
                        <a onclick="return {!! setting()->site_twitter ? 'true' : 'false' !!};" href="{!! setting()->site_twitter !!}">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>

                    <li>
                        <a onclick="return {!! setting()->site_instagram ? 'true' : 'false' !!};" href="{!! setting()->site_instagram !!}">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>

                    <li>
                        <a onclick="return {!! setting()->site_linkedin ? 'true' : 'false' !!};" href="{!! setting()->site_linkedin !!}">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>

                    <li>
                        <a onclick="return {!! setting()->site_youtube ? 'true' : 'false' !!};" href="{!! setting()->site_youtube !!}">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>

                    <li>
                        <a onclick="return {!! setting()->site_gmail ? 'true' : 'false' !!};" href="{!! setting()->site_gmail !!}"><i
                                class="fas fa-envelope"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- End Social /-->
    </div>
</div>
