@if ($service->is_treatment_area == 'no')
    <span class="label label-light-danger label-inline mr-2">
        {!! $service->is_treatment_area !!}
    </span>
@else
    <span class="label label-light-info label-inline mr-2">
        {!! $service->is_treatment_area !!}
    </span>
@endif
