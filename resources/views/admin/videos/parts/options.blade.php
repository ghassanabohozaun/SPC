<a href="#" class="btn btn-hover-primary btn-icon btn-pill show_video_btn" data-id="{{ $video->id }}"
    title="{{ __('general.show') }}">
    <i class="fa fa-video fa-1x"></i>
</a>


<a href="#" class="btn btn-hover-primary btn-icon btn-pill copy_video_link" data-id="{{ $video->id }}"
    title="{{ __('general.copy') }}">
    <i class="fa fa-copy fa-1x"></i>
</a>


<a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-hover-primary btn-icon btn-pill "
    title="{{ __('general.edit') }}">
    <i class="fa fa-edit fa-1x"></i>
</a>

<a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_video_btn" data-id="{{ $video->id }}"
    title="{{ __('general.delete') }}">
    <i class="fa fa-trash fa-1x"></i>
</a>
