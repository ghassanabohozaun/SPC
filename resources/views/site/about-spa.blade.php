@extends('layouts.site')
@section('title')
    {!! setting()->{'site_title_' . Lang()} !!}
@endsection
@section('metaTags')
    <meta name="description" content="{!! setting()->{'site_description_' . Lang()} !!}">
    <meta name="keywords" content="{!! setting()->{'site_keywords_' . Lang()} !!}">
    <meta name="application-name" content="{!! setting()->{'site_name_' . Lang()} !!}" />
    <meta name="author" content="{!! setting()->{'site_name_' . Lang()} !!}" />
@endsection
@push('css')
@endpush

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
            <div class="my_lead">
                @foreach ($aboutSpaItems as $aboutSpaItem)
                    <section id="{!! $aboutSpaItem->{'title_' . Lang()} !!}">
                        <h2>{!! $aboutSpaItem->{'title_' . Lang()} !!}</h2>
                        <p>{!! $aboutSpaItem->{'details_' . Lang()} !!}</p>
                    </section>
                @endforeach
            </div>
            <nav class="section-nav ">
                <ol>
                    @foreach ($aboutSpaItems as $aboutSpaItem)
                        <li>
                            <a href="#{!! $aboutSpaItem->{'title_' . Lang()} !!}">
                                {!! $aboutSpaItem->{'title_' . Lang()} !!}
                            </a>
                        </li>
                    @endforeach
                </ol>
            </nav>
        </main>

    </div>
    <!-------------------------------------- End wrapper  --------------------------------------->

    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.includes.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->
@endsection
@push('js')
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    const id = entry.target.getAttribute('id');
                    if (entry.intersectionRatio > 0) {
                        document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList
                            .add('active');
                    } else {
                        document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList
                            .remove('active');
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
