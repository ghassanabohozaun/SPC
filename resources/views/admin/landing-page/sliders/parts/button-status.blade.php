@if ($slider->button_status == __('sliders.show'))
    <span class="label label-light-info label-inline mr-2">
        {!! $slider->button_status !!}
    </span>
@else
    <span class="label label-light-danger label-inline mr-2">
        {!! $slider->button_status !!}
    </span>
@endif
