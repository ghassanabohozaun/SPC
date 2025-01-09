@extends('layouts.site')
@section('title') {!! trans('frontend.home') !!} @endsection
@section('metaTags')
    <meta name="description"
          content="{!! Lang()=='ar' ? setting()->site_description_ar : setting()->site_description_en !!}">
    <meta name="keywords"
          content="{!! Lang()=='ar' ? setting()->site_keywords_ar : setting()->site_keywords_en !!}">
@endsection

@section('content')

    <!-------------------------------------- Start Top Title Section  ------------------------------------->
    <div class="clearfix"></div>
    <div class="bradcam_area faq_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h1>{!! $title !!}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------- End Top Title Section  ------------------------------------->

    <!-------------------------------------- Start FAQ's ------------------------------------->
    <div class="why-chose-us module">
        <div class="section-title">
            <div class="section-title-icon">
                <img src="{!! asset('site/assets/images/help/brain-icon.png') !!}" alt="Icon">
            </div>
            <p></p>
        </div><!-- Section Title /-->

        @if($faqs->isEmpty())
            <h2 class="text-center text-capitalize text-warning">{!! trans('site.no_faqs') !!}</h2>
        @else
            <div class="grid-container grid-x grid-padding-x my_faq_section">

                <div class="large-6 medium-12 small-12 cell">
                    <ul class="accordion" data-accordion data-deep-link="true" data-update-history="true"
                        data-deep-link-smudge="500" id="deeplinked-accordion">
                        @foreach($faqs as $key=>$faq)
                            <li class="accordion-item {!!$key == 0 ? 'is-active' : '' !!}" data-accordion-item>
                                <a href="#"
                                   class="accordion-title">{!! Lang()=='ar'? $faq->question_ar: $faq->question_en!!}</a>
                                <div class="accordion-content" data-tab-content id="deeplink1">
                                    {!! Lang()=='ar'? $faq->answer_ar: $faq->answer_en!!}
                                </div>
                            </li>
                        @endforeach
                    </ul><!-- Accordion /-->
                </div><!-- cell /-->

                <div class="large-6 medium-12 small-12 cell">
                    <img src="{!! asset('site/assets/images/backgrounds/faq-3.jpg') !!}" class="faq-page-image"
                         alt="SPC Faq's">
                </div><!-- cell /-->

            </div><!-- Grid Container /-->
        @endif


    </div>
    <!-------------------------------------- End FAQ's  ------------------------------------->

    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.include.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->

@endsection
@push('js')
@endpush
