@if ($tests->isEmpty())
    <h2 class="text-capitalize text-warning text-center">{!! trans('site.not_tests') !!}</h2>
@else
    <div class="container my_tests_section">
        @foreach ($tests as $test)
            <div class="row my_row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img class="my_test_image_card" src="{!! asset('adminBoard/uploadedImages/tests/' . $test->test_photo) !!}"
                                    alt="{!! $test->test_name !!}">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">

                                    <div class="row">
                                        <h5 class="card-title">{!! $test->test_name !!}</h5>
                                        <p class="card-text my_lead">
                                            {!! $test->test_details !!}
                                        </p>
                                    </div>

                                    <div style="position: absolute ; bottom: 0%">
                                        <a href="{!! route('get.test.details', $test->test_name_slug) !!}" class="button primary">{!! trans('site.starting_test') !!}
                                            &nbsp;
                                            @if (Lang() == 'ar')
                                                <i class="fas fa-1x fa-arrow-alt-circle-left"></i>
                                            @else
                                                <i class="fas fa-1x fa-arrow-alt-circle-right"></i>
                                            @endif
                                        </a>
                                        @if ($test->file != null)
                                            <a href="{!! asset('adminBoard/uploadedFiles/tests/' . $test->file) !!}" class="button secondary">
                                                {!! trans('site.download_test') !!} &nbsp;&nbsp;
                                                <i class="fas fa-1x fa-file-pdf"></i>
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="container-fluid text-center">
            <div class="row {!! $tests->hasPages() ? 'my_pagination' : '' !!} ">
                {{ $tests->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endif
