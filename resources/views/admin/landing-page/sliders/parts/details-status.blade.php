@if ($slider->details_status == __('sliders.show'))
    <span class="label label-light-info label-inline mr-2">
        {!! $slider->details_status !!}
    </span>
@else
    <span class="label label-light-danger label-inline mr-2">
        {!! $slider->details_status !!}
    </span>
@endif
