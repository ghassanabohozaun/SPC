<a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-hover-primary btn-icon btn-pill "
    title="{{ __('general.edit') }}">
    <i class="fa fa-edit fa-1x"></i>
</a>

<a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_slider_btn" data-id="{{ $slider->id }}"
    title="{{ __('general.delete') }}">
    <i class="fa fa-trash fa-1x"></i>
</a>
