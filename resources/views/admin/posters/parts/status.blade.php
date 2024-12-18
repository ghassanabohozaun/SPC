<div class="cst-switch switch-sm">
    <input type="checkbox" {{ $poster->status == 'on' ? 'checked' : '' }} data-id="{{ $poster->id }}"
        class="change_status">
</div>
