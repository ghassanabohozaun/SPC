<div class="cst-switch switch-sm">
    <input type="checkbox" {{ $publication->status == 'on' ? 'checked' : '' }} data-id="{{ $publication->id }}"
        class="change_status">
</div>
