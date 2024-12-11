<div class="cst-switch switch-sm">
    <input type="checkbox" {{ $testimonial->status == 'on' ? 'checked' : '' }} data-id="{{ $testimonial->id }}"
        class="change_status">
</div>
