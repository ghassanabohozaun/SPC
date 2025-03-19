<div class="tab-pane fade  show active" id="article_settings" role="tabpanel" aria-labelledby="article_settings_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9" style="height: 550px">

                    <!--begin::body-->
                    <div class="my-5">

                        <!--begin::Group-->
                        <div class=" form-group row d-none">
                            <label class="col-xl-3 col-lg-3 col-form-label">ID</label>
                            <div class="col-lg-9 col-xl-9">
                                <input type="text" value="{{ $article->id }}"
                                    class="form-control form-control-solid form-control-lg" name="id"
                                    id="id" autocomplete="off" />

                                <input type="text" class="form-control form-control-solid form-control-lg"
                                    name="hidden_photo" value="hidden_photo">

                                <input type="text" class="form-control form-control-solid form-control-lg"
                                    name="hidden_file" value="hidden_file">

                                <input type="text" class="form-control form-control-solid form-control-lg"
                                    name="action" value="update">

                                <input type="text" class="form-control form-control-solid form-control-lg"
                                    id="site_lang_ar" name="site_lang_ar" value="{!! setting()->site_lang_ar !!}">
                            </div>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('articles.photo') }}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="image-input image-input-outline" id="kt_article_photo">

                                    <div class="image-input-wrapper"
                                        style="background-image: url({{ asset('adminBoard/uploadedImages/articles/' . $article->photo) }})">
                                    </div>
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="{{ __('general.change_image') }}">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="photo" id="photo" class="table-responsive-sm">
                                        <input type="hidden" name="photo_remove" />
                                    </label>
                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip" title="Cancel avatar"><i
                                            class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">{{ __('general.image_format_allow') }}</span>
                                <span class="form-text text-danger" id="photo_error"></span>
                            </div>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('articles.publish_date') }}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="input-group date">
                                    <input type="text" class="form-control form-control-solid form-control-lg"
                                        id="publish_date" name="publish_date" value="{{ $article->publish_date }}"
                                        readonly placeholder="{{ __('articles.enter_publish_date') }}" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-danger" id="publish_date_error"></span>
                            </div>
                            <!--end::Group-->
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('articles.publisher_name') }}
                            </label>

                            <div class="col-lg-9 col-xl-9">
                                <input type="text" class="form-control form-control-solid form-control-lg"
                                    name="publisher_name" id="publisher_name" value="{{ $article->publisher_name }}"
                                    placeholder="{{ __('articles.enter_publisher_name') }}" autocomplete="off">
                                <span class="form-text text-danger" id="publisher_name_error"></span>
                            </div>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('articles.file') }}
                            </label>
                            <div class="col-lg-9 col-xl-9">

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file">
                                    <label class="custom-file-label" choose="" file="">
                                    </label>
                                </div>
                                <span class="form-text text-muted">
                                    {{ __('general.file_format_allow') }}
                                </span>
                                <span class="form-text text-danger" id="file_error"></span>
                                @if ($article->file)
                                    <a class="form-text text-info" style="font-size: 14px ;font-weight: bolder"
                                        target="_blank" href="{!! asset('adminBoard/uploadedFiles/articles/' . $article->file) !!}">{!! __('general.download') !!}</a>
                                @endif
                            </div>
                        </div>
                        <!--end::Group-->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@push('js')
    <script type="text/javascript">
        var article_photo = new KTImageInput('kt_article_photo');

        // Datepicker
        $('#publish_date').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: true,
            clearBtn: false,
            orientation: "bottom auto",
            language: "{{ LaravelLocalization::getCurrentLocale() }}",
            autoclose: true,
            todayHighlight: true,
        });
    </script>
@endpush
