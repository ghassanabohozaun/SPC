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
    <div class="bradcam_area about_us_bg">
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

    <!-------------------------------------- Start wrapper  ------------------------------------->
    <div class="pricing-table-wrapper my-about-spc-section module">
        <main>
            <div class="my_div my_lead" >
                @foreach($aboutSpaItems as $aboutSpaItem)
                    <section id="{!! Lang()=='ar'? $aboutSpaItem->title_ar:$aboutSpaItem->title_en !!}">
                        <h2>{!! Lang()=='ar'? $aboutSpaItem->title_ar:$aboutSpaItem->title_en !!}</h2>
                        <p>{!! Lang()=='ar'? $aboutSpaItem->details_ar:$aboutSpaItem->details_en !!}</p>
                    </section>
                @endforeach
            </div>
            <nav class="section-nav">
                <ol>
                    @foreach($aboutSpaItems as $aboutSpaItem)
                        <li>
                            <a href="#{!! Lang()=='ar'? $aboutSpaItem->title_ar:$aboutSpaItem->title_en !!}">
                                {!! Lang()=='ar'? $aboutSpaItem->title_ar:$aboutSpaItem->title_en !!}
                            </a>
                        </li>
                    @endforeach
                </ol>
            </nav>
        </main>

    </div>
    <!-------------------------------------- End wrapper  --------------------------------------->

    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.include.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->

@endsection
@push('js')
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', () => {

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    const id = entry.target.getAttribute('id');
                    if (entry.intersectionRatio > 0) {
                        document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList.add('active');
                    } else {
                        document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList.remove('active');
                    }
                });
            });

            // Track all sections that have an `id` applied
            document.querySelectorAll('section[id]').forEach((section) => {
                observer.observe(section);
            });

        });
    </script>
@endpush
