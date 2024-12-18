@if (!$poster->file)
    <span class="form-text text-danger">{!! __('general.no_file_found') !!}</span>
@else
    <a class="form-text text-info" style="font-size: 14px ;font-weight: bolder"
        href="{!! asset('adminBoard/uploadedFiles/posters/' . $poster->file) !!}">{!! __('general.download') !!}</a>
@endif
