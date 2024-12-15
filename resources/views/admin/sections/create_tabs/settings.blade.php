<div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">

                    <!--begin::body-->
                    <div class="my-5">

                        <!--begin::Group-->
                        <div class=" form-group row  d-none">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <input type="hidden" value="{{ setting()->site_lang_ar }}"
                                    class="form-control form-control-solid form-control-lg" name="site_lang_ar"
                                    id="site_lang_ar" />
                            </div>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('services.photo') }}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="image-input image-input-outline" id="kt_service_photo">

                                    <div class="image-input-wrapper"></div>
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
                                        data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">{{ __('general.image_format_allow') }}
                                </span>
                                <span class="form-text text-danger" id="photo_error"></span>
                            </div>
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('services.is_treatment_area') }}
                            </label>
                            <div class="col-lg-9 col-md-9" style="margin-top: 10px">
                                <div class="form-check pl-0 radio-inline">
                                    <label class="radio radio-outline">
                                        <input type="radio" id="is_treatment_area" name="is_treatment_area"
                                            value="no" checked />
                                        <span></span>
                                        {{ __('general.no') }}
                                    </label>
                                    <label class="radio radio-outline">
                                        <input type="radio" id="is_treatment_area" name="is_treatment_area"
                                            value="yes" />
                                        <span></span>
                                        {{ __('general.yes') }}
                                    </label>

                                </div>
                            </div>
                            <!--begin::body-->

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
        var service_photo = new KTImageInput('kt_service_photo');
    </script>
@endpush
