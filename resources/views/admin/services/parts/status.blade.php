<div class="cst-switch switch-sm">
    <input type="checkbox" id="change_status" {{ $service->status == 'on' ? 'checked' : '' }} data-id="{{ $service->id }}"
        class="change_status">
</div>
