@if ($trainings->isEmpty())
    <h2 class="text-capitalize text-warning text-center">{!! trans('site.no_trainings') !!}</h2>
@else
    <!-- Start trainings Container /-->
    <div class="grid-container grid-x grid-padding-x my_training_section">

        @foreach ($trainings as $training)
            <!-- Start Cell /-->
            <div class="large-4 medium-4 small-12 cell">
                <div class="team-box hover-wrap">
                    <div class="hover-img">
                        <img src="{!! asset('adminBoard/uploadedImages/trainings/' . $training->photo) !!}" alt="{!! $training->{'title_' . Lang()} !!}">
                        <div class="team-detail hover-info">
                            <a href="{!! route('appointment') !!}" class="button">{!! trans('site.click_here') !!}</a>
                        </div>
                    </div>
                    <div class="team-text">
                        @if ($training->started_date >= Carbon\Carbon::now()->toDateString())
                            <div class='row training_row'>

                                <a href="javascript:void(0)"
                                    class="training_status_available">{!! trans('site.available') !!}</a>

                            </div>
                        @else
                            <div class='row training_row'>
                                <a href="javascript:void(0)"
                                    class="training_status_not_available">{!! trans('site.unavailable') !!}</a>
                            </div>
                        @endif
                        <h6 class="training_h6">{!! trans('site.started_date') !!} : {!! $training->started_date !!}</h6>
                        <h4>{!! $training->{'title_' . Lang()} !!}</h4>
                    </div>
                </div>
            </div>
            <!-- End Cell /-->
        @endforeach


        <div class="container-fluid text-center">
            <div class="row {!! $trainings->hasPages() ? 'my_pagination' : '' !!} ">
                {{ $trainings->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>


    </div>
    <!-- End trainings Container /-->

@endif
