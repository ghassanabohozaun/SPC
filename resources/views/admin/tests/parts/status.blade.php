<div class="cst-switch switch-sm">
    <input type="checkbox" {{ $test->status == 'on' ? 'checked' : '' }} data-id="{{ $test->id }}"
        class="change_status">
</div>
