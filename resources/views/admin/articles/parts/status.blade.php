<div class="cst-switch switch-sm">
    <input type="checkbox" {{ $article->status == 'on' ? 'checked' : '' }} data-id="{{ $article->id }}"
        class="change_status">
</div>
