<!-- main-footer -->
<section class="main-footer">
    <div class="footer-top">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="title-box">
                            <h3>{{__('menu.abouts')}}</h3>
                        </div>
                        <div class="text">
                            <p>{!! \Illuminate\Support\Str::limit(strip_tags(fixedTexts()->{'about_association_details_'.Lang()}),$limit = 290, $end = ' ...')!!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-30">
                        <div class="widget-title">
                            <h3>Related Pages</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                @foreach (abouts_type() as $type )
                                    <li>
                                        <a href="{!! route('about',slug($type->{'name_'.Lang()})) !!}">
                                            {{ $type->{'name_'.Lang()} }}
                                        </a>
                                    </li>

                                @endforeach

                                <li>
                                    <a href="{!! route('projects','previous') !!}">
                                        {!! __('index.previous_projects') !!}
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! route('projects','current') !!}">
                                        {!! __('index.current_projects') !!}
                                    </a>
                                </li>

                                <li>
                                    <a href="{!! route('photos-albums') !!}">{!! __('index.our_photos') !!}</a>
                                </li>

                                <li>
                                    <a href="{!! route('videos') !!}">{!! __('index.our_videos') !!}</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-30">
                        <div class="widget-title">
                            <h3>&nbsp;</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li>
                                    <a href="{!! route('advertisements','Advertisements') !!}">{!! __('index.advertisements') !!}</a>
                                </li>
                                <li>
                                    <a href="{!! route('advertisements','Brochures') !!}">{!! __('index.brochures') !!}</a>
                                </li>
                                <li>
                                    <a href="{!! route('advertisements','CaseStudy') !!}">{!! __('index.case_study') !!}</a>
                                </li>
                                <li>
                                    <a href="{!! route('advertisements','ScientificArticles') !!}">{!! __('index.scientific_articles') !!}</a>

                                </li>

                                <li>
                                    <a href="{!! route('reports') !!}">{!! __('index.reports') !!}</a>
                                </li>

                                <li>
                                    <a href="{!! route('contact') !!}">
                                        {!! __('index.contact') !!}
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget ml-30">
                        <div class="title-box">
                            <h3>Contact Us</h3>
                        </div>
                        <div class="widget-content">
                            <div class="single-item">
                                <h5>970597500614</h5>
                            </div>
                            <div class="single-item">
                                <h5>etharps1@gmail.com</h5>
                                <p></p>
                            </div>

                            @if(Lang() =='ar')
                                <div class="single-item">
                                    <h5>فلسطين - قطاع غزة</h5>
                                    <h5>خانيونس - الكتيبة</h5>
                                </div>
                            @else
                                <div class="single-item">
                                    <h5>palestine , Gaza strip</h5>
                                    <h5> Khan Younes - Al-Katiba</h5>
                                </div>
                            @endif

                            <div class="single-item my-social-style">
                                <ul class="my-social-style-one clearfix  my-2">
                                    <li>
                                        <a onclick="return {!! setting()->site_facebook ? 'true':'false' !!};"
                                           href="{!! setting()->site_facebook !!}"
                                           target="_blank"
                                           id="social-facebook-icon">
                                            <i class="fab fa-facebook-f "></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="return {!! setting()->site_twitter ? 'true':'false' !!};"
                                           href="{!! setting()->site_twitter!!}"
                                           target="_blank"
                                           id="social-twitter-icon">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="return {!! setting()->site_instagram ? 'true':'false' !!};"
                                           href="{!! setting()->site_instagram !!}"
                                           target="_blank"
                                           id="social-instagram-icon">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="return {!! setting()->site_youtube ? 'true':'false' !!};"
                                           href="{!! setting()->site_youtube !!}"
                                           target="_blank"
                                           id="social-youtube-icon">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-item">
                                &nbsp;
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-box clearfix">
                <div class="copyright text-center">
                    @if(Lang()=='ar')
                        <p> &copy; جميع الحقوق محفوظة , <a href="{!! route('index') !!}"> جمعية ايثار</a> 2023.</p>
                    @else
                        <p> &copy; 2023 <a href="{!! route('index') !!}">Ethar,</a> All rights reserved .</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main-footer end -->

