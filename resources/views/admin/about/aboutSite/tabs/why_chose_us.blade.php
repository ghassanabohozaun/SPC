<div class="tab-pane fade" id="why_chose_us" role="tabpanel" aria-labelledby="why_chose_us_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <!--begin::body-->
                    <div class="my-5">


                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('aboutSite.why_chose_us_photo') }}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="image-input image-input-outline" id="kt_why_chose_us_photo">

                                    @if (AboutSite()->why_chose_us_photo)
                                        <div class="image-input-wrapper"
                                            style="background-image: url({{ asset('adminBoard/uploadedImages/about_sites/' . AboutSite()->why_chose_us_photo) }})">
                                        </div>
                                    @else
                                        <div class="image-input-wrapper"></div>
                                    @endif

                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="{{ __('general.change_image') }}">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="why_chose_us_photo" id="why_chose_us_photo"
                                            class="table-responsive-sm">
                                        <input type="hidden" name="photo_remove" />
                                    </label>

                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip" title="Cancel avatar"><i
                                            class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">{{ __('general.image_format_allow') }}
                                </span>
                                <span class="form-text text-danger" id="photo_error"></span>
                            </div>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label>{{ __('aboutSite.why_chose_us_title_en') }}</label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="why_chose_us_title_en" id="why_chose_us_title_en" value="{!! AboutSite()->why_chose_us_title_en !!}"
                                placeholder="{{ __('aboutSite.enter_why_chose_us_title_en') }}" autocomplete="off">
                            <span class="form-text text-danger" id="why_chose_us_title_en_error"></span>
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        @if (setting()->site_lang_ar == 'on')
                            <div class="form-group">
                                <label>{{ __('aboutSite.why_chose_us_title_ar') }}</label>
                                <input type="text" class="form-control form-control-solid form-control-lg"
                                    name="why_chose_us_title_ar" id="why_chose_us_title_ar"
                                    value="{!! AboutSite()->why_chose_us_title_ar !!}"
                                    placeholder="{{ __('aboutSite.enter_why_chose_us_title_ar') }}" autocomplete="off">
                                <span class="form-text text-danger" id="why_chose_us_title_ar_error"></span>
                            </div>
                        @endif
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('aboutSite.why_chose_us_details_en') }}</label>
                            <textarea class="form-control summernote" name="why_chose_us_details_en" id="why_chose_us_details_en">{!! AboutSite()->why_chose_us_details_en !!}</textarea>
                            <span class="form-text text-danger" id="why_chose_us_details_en_error"></span>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        @if (setting()->site_lang_ar == 'on')
                            <div class="form-group">
                                <label> {{ __('aboutSite.why_chose_us_details_ar') }}</label>
                                <textarea class="form-control summernote" name="why_chose_us_details_ar" id="why_chose_us_details_ar">
                                    {!! AboutSite()->why_chose_us_details_ar !!}
                                </textarea>
                                <span class="form-text text-danger" id="why_chose_us_details_ar_error"></span>
                            </div>
                        @endif
                        <!--end::Group-->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('js')
    <script type="text/javascript">
        var why_chose_us_photo = new KTImageInput('kt_why_chose_us_photo');
    </script>
@endpush
