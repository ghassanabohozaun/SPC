<div class="tab-pane fade show active" id="whom" role="tabpanel" aria-labelledby="whom_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <!--begin::body-->
                    <div class="my-5">
                        <div class="form-group">
                            <input type="hidden" class="form-control form-control-solid form-control-lg"
                                id="site_lang_ar" name="site_lang_ar" value="{!! setting()->site_lang_ar !!}">
                        </div>

                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('aboutSite.whom_brochure') }}
                            </label>
                            <div class="col-lg-9 col-xl-9">

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="whom_brochure"
                                        name="whom_brochure">
                                    <label class="custom-file-label" choose="" file="">
                                    </label>
                                </div>
                                <span class="form-text text-muted">
                                    {{ __('general.file_format_allow') }}
                                </span>
                                <span class="form-text text-danger" id="whom_brochure_error"></span>
                                @if (AboutSite()->whom_brochure)
                                    <a class="form-text text-info" style="font-size: 14px ;font-weight: bolder"
                                        href="{!! asset('adminBoard/uploadedFiles/brochures/' . AboutSite()->whom_brochure) !!}">{!! __('general.download') !!}</a>
                                @endif
                            </div>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('aboutSite.whom_en') }}</label>
                            <textarea class="form-control summernote" name="whom_en" id="whom_en">{!! AboutSite()->whom_en !!}</textarea>
                            <span class="form-text text-danger" id="whom_en_error"></span>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('aboutSite.whom_ar') }}</label>
                            <textarea class="form-control summernote" name="whom_ar" id="whom_ar">{!! AboutSite()->whom_ar !!}</textarea>
                            <span class="form-text text-danger" id="whom_ar_error"></span>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('aboutSite.contact_us_en') }}</label>
                            <textarea class="form-control summernote" name="contact_us_en" id="contact_us_en">{!! AboutSite()->contact_us_en !!}</textarea>
                            <span class="form-text text-danger" id="contact_us_en_error"></span>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('aboutSite.contact_us_ar') }}</label>
                            <textarea class="form-control summernote" name="contact_us_ar" id="contact_us_ar">{!! AboutSite()->contact_us_ar !!}</textarea>
                            <span class="form-text text-danger" id="contact_us_ar_error"></span>
                        </div>
                        <!--end::Group-->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
