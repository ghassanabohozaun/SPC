<div class="tab-pane fade" id="about_doctor" role="tabpanel" aria-labelledby="about_doctor_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <!--begin::body-->
                    <div class="my-5">

                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('aboutSite.about_doctor_en') }}</label>
                            <textarea class="form-control summernote" name="about_doctor_en" id="about_doctor_en">{!! AboutSite()->about_doctor_en !!}</textarea>
                            <span class="form-text text-danger" id="about_doctor_en_error"></span>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        @if (setting()->site_lang_ar == 'on')
                            <div class="form-group">
                                <label> {{ __('aboutSite.about_doctor_ar') }}</label>
                                <textarea class="form-control summernote" name="about_doctor_ar" id="about_doctor_ar">{!! AboutSite()->about_doctor_ar !!}</textarea>
                                <span class="form-text text-danger" id="about_doctor_ar_error"></span>
                            </div>
                        @endif
                        <!--end::Group-->


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
