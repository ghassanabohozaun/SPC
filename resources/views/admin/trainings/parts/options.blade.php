<a href="{{ route('admin.trainings.edit', $training->id) }}" class="btn btn-hover-primary btn-icon btn-pill "
    title="{{ __('general.edit') }}">
    <i class="fa fa-edit fa-1x"></i>
</a>


<a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_training_btn" data-id="{{ $training->id }}"
    title="{{ __('general.delete') }}">
    <i class="fa fa-trash fa-1x"></i>
</a>
