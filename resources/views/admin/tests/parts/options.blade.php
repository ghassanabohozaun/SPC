<a href="#" class="btn btn-hover-info btn-icon btn-pill add_test_questions_btn" id="add_test_questions_btn"
    data-id="{!! $test->id !!}" data-name="{!! $test->test_name !!}">
    <i class="fa fa-question-circle fa-1x"></i>
</a>


<a href="#" class="btn btn-hover-success btn-icon btn-pill add_test_answers_btn" id="add_test_answers_btn"
    data-id="{!! $test->id !!}" data-name="{!! $test->test_name !!}">
    <i class="fa fa-pen fa-1x"></i>
</a>


<a href="#" class="btn btn-hover-dark btn-icon btn-pill add_test_scales_btn" id="add_test_scales_btn"
    data-id="{!! $test->id !!}" data-name="{!! $test->test_name !!}">
    <i class="fa fa-percent fa-1x"></i>
</a>


<a href="{{ route('admin.tests.edit', $test->id) }}" class="btn btn-hover-primary btn-icon btn-pill "
    title="{{ __('general.edit') }}">
    <i class="fa fa-edit fa-1x"></i>
</a>

<a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_test_btn" data-id="{{ $test->id }}"
    title="{{ __('general.delete') }}">
    <i class="fa fa-trash fa-1x"></i>
</a>
