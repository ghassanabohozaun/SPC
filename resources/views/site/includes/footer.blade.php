<div class="footer">
    <!-- Footer Top /-->
    <div class="footer-top my-footer-dark-bg grey-bg my-footer-margin">
        <div class="grid-container grid-x grid-padding-x">
            <!-- Start logo /-->
            <div class="large-4 medium-5 small-12 cell">
                <div class="footer-box footer-logo-side">
                    <a href="{!! route('index') !!}">
                        @if (Lang() == 'ar')
                            <img src="{!! asset('site/assets/images/logo/RightFooterLogo.png') !!}" alt="Logo" />
                        @else
                            <img src="{!! asset('site/assets/images/logo/LeftFooterLogo.png') !!}" alt="Logo" />
                        @endif
                    </a>
                    <p class="my_lead">{!! trans('site.spc_about') !!}</p>

                    <!-- Start Website Counter /-->

                    <div class="">
                        <span class=" my_visitor_text">
                            {!! __('site.website_visitors_counter') !!} :
                        </span>

                        <span class="my_visitor_span"> {!! getVisitorCounter() !!}</span>

                    </div>

                    <!-- End Website Counter /-->

                </div>
            </div>
            <!-- End logo /-->
            <!-- Start Related Pages /-->
            <div class="large-4 medium-3 small-12 cell">
                <div class="footer-box border-btm">
                    <h6>{!! trans('site.related_pages') !!}</h6>
                    <ul class="links">
                        <li><a href="{!! route('index') !!}">{!! trans('site.home') !!}</a></li>
                        <li><a href="{!! route('services') !!}">{!! trans('site.services') !!}</a></li>
                        <li><a href="{!! route('tests') !!}">{!! trans('site.tests') !!}</a></li>
                        <li><a href="{!! route('trainings') !!}">{!! trans('site.training') !!}</a></li>
                        <li><a href="{!! route('articles') !!}">{!! trans('site.articles') !!}</a></li>
                        <li><a href="{!! route('books') !!}">{!! trans('site.books') !!}</a></li>
                        <li><a href="{!! route('posters') !!}">{!! trans('site.posters') !!}</a></li>
                        <li><a href="{!! route('news') !!}">{!! trans('site.news') !!}</a></li>
                    </ul>
                    <ul class="links">
                        <li><a href="{!! route('testimonials') !!}">{!! trans('site.testimonials') !!}</a></li>
                        <li><a href="{!! route('photo.albums') !!}">{!! trans('site.albums') !!}</a></li>
                        <li><a href="{!! route('videos') !!}">{!! trans('site.videos') !!}</a></li>
                        <li><a href="{!! route('faq') !!}">{!! trans('site.faqs') !!}</a></li>
                        <li><a href="{!! route('about.spa') !!}">{!! trans('site.about_spa') !!}</a></li>
                        <li><a href="{!! route('contact') !!}">{!! trans('site.contact') !!}</a></li>
                    </ul>


                </div>
                <!-- Footer Box /-->
            </div>
            <!-- End Related Pages /-->
            <!-- Start Contact Us /-->
            <div class="large-4 medium-4 small-12 cell">
                <div class="footer-box border-btm ">
                    <h6>{!! trans('site.contact_spc') !!}</h6>
                    <!-- Start Contact Us /-->
                    <div class="contact-us">
                        <ul>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <a href="javascript:void(0)"><span>{!! trans('site.address') !!} : </span>
                                    @if (Lang() == 'ar')
                                        {!! setting()->site_address_ar !!}
                                    @else
                                        {!! setting()->site_address_en !!}
                                    @endif
                                </a>
                            </li>

                            <li>
                                <i class="fas fa-mobile-alt"></i>
                                <a href="javascript:void(0)">
                                    <span>{!! trans('site.phone') !!} : </span> {!! setting()->site_mobile !!}
                                </a>
                            </li>

                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="javascript:void(0)">
                                    <span>{!! trans('site.email') !!} : </span> {!! setting()->site_email !!}
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- End Contact Us /-->
                    <h6>{!! trans('site.contact_management') !!}</h6>
                    <!-- Start Contact Management /-->
                    <div class="contact-us">
                        <ul>


                            <li><i class="fas fa-mobile-alt"></i>
                                <a href="javascript:void(0)">
                                    <span>{!! trans('site.phone') !!} : </span> +972 59-523-5002
                                </a>
                            </li>

                            <li><i class="fas fa-envelope"></i>
                                <a href="javascript:void(0)">
                                    <span>{!! trans('site.email') !!} : </span> star_man_95@hotmail.com
                                </a>

                            </li>

                        </ul>
                    </div>
                    <!-- End Contact Management /-->

                    <!-- Start Social /-->
                    <div class="social-icons my-contact-us">
                        <ul class="menu">
                            <li>
                                <a target="_blank" onclick="return {!! setting()->site_facebook ? 'true' : 'false' !!};"
                                    href="{!! setting()->site_facebook !!}">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li><a target="_blank" onclick="return {!! setting()->site_twitter ? 'true' : 'false' !!};"
                                    href="{!! setting()->site_twitter !!}">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" onclick="return {!! setting()->site_instagram ? 'true' : 'false' !!};"
                                    href="{!! setting()->site_instagram !!}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" onclick="return {!! setting()->site_linkedin ? 'true' : 'false' !!};"
                                    href="{!! setting()->site_linkedin !!}">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" onclick="return {!! setting()->site_youtube ? 'true' : 'false' !!};"
                                    href="{!! setting()->site_youtube !!}">
                                    <i class="fab fa-youtube">
                                    </i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" onclick="return {!! setting()->site_email ? 'true' : 'false' !!};"
                                    href="{!! setting()->site_email !!}">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Social /-->
                </div>
            </div>
            <!-- Start Contact Us /-->
        </div>
    </div>
    <!-- Footer Top /-->

    <!-- Footer Bottom /-->
    <div class="footer-bottom">
        <div class="grid-container grid-x grid-padding-x">

            <div class="medium-12  small-12 cell text-center">
                @if (Lang() == 'ar')
                    <div class="copyrightinfo">
                        . {!! date('Y') !!} {!! trans('site.copy_right') !!}
                        <a href="{!! route('index') !!}">{!! trans('site.spc') !!}</a>
                        ©
                    </div>
                @else
                    <div class="copyrightinfo">
                        {!! trans('site.copy_right') !!} © {!! date('Y') !!}
                        <a href="{!! route('index') !!}">{!! trans('site.spc') !!}</a>
                        - {!! trans('site.copy_right') !!} .
                    </div>
                @endif
            </div>
        </div>
        <!-- Footer Bottom /-->

    </div>
    <!-------------------------------------- End Footer ----------------------------------------->
</div>
