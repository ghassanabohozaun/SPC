@if (!$poster->file)
    <span class="form-text text-danger" style="font-size: 12px ;font-weight: bolder">{!! __('general.no_file_found') !!}</span>
@else
    <a class="form-text text-info" style="font-size: 12px ;font-weight: bolder"
        href="{!! asset('adminBoard/uploadedFiles/posters/' . $poster->file) !!}">{!! __('general.download') !!}</a>
@endif