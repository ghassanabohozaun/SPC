<div class="tab-pane fade" id="who_are_you" role="tabpanel" aria-labelledby="who_are_you_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <!--begin::body-->
                    <div class="my-5">

                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('aboutSite.who_are_we_profile') }}
                            </label>
                            <div class="col-lg-9 col-xl-9">

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="who_are_we_profile"
                                        name="who_are_we_profile">
                                    <label class="custom-file-label" choose="" file="">
                                    </label>
                                </div>
                                <span class="form-text text-muted">
                                    {{ __('general.file_format_allow') }}
                                </span>
                                <span class="form-text text-danger" id="who_are_we_profile_error"></span>
                                @if (AboutSite()->who_are_we_profile)
                                    <a class="form-text text-info" style="font-size: 14px ;font-weight: bolder"
                                        href="{!! asset('adminBoard/uploadedFiles/brochures/' . AboutSite()->who_are_we_profile) !!}">{!! __('general.download') !!}</a>
                                @endif
                            </div>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('aboutSite.who_are_we_en') }}</label>
                            <textarea class="form-control summernote" name="who_are_we_en" id="who_are_we_en">{!! AboutSite()->who_are_we_en !!}</textarea>
                            <span class="form-text text-danger" id="who_are_we_en_error"></span>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        @if (setting()->site_lang_ar == 'on')
                            <div class="form-group">
                                <label> {{ __('aboutSite.who_are_we_ar') }}</label>
                                <textarea class="form-control summernote" name="who_are_we_ar" id="who_are_we_ar">{!! AboutSite()->who_are_we_ar !!}</textarea>
                                <span class="form-text text-danger" id="who_are_we_ar_error"></span>
                            </div>
                        @endif
                        <!--end::Group-->


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
