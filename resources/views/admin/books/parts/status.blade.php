<div class="cst-switch switch-sm">
    <input type="checkbox" {{ $book->status == 'on' ? 'checked' : '' }} data-id="{{ $book->id }}"
        class="change_status">
</div>
