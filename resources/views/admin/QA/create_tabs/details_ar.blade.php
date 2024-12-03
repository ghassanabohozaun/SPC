<div class="tab-pane  fade  show active" id="QA_details_ar" role="tabpanel" aria-labelledby="details_ar_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">

                    <!--begin::body-->
                    <div class="my-5">

                        <!--begin::Group-->
                        <div class=" form-group row d-none">
                            <label class="col-xl-3 col-lg-3 col-form-label">

                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <input value="{{ setting()->site_lang_ar }}"
                                    class="form-control form-control-solid form-control-lg" name="arabic"
                                    id="arabic" type="hidden" autocomplete="off" />
                            </div>
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label>
                                {{ __('QA.title_ar') }}
                            </label>

                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="title_ar" id="title_ar" placeholder="{{ __('QA.title_ar') }}" autocomplete="off">
                            <span class="form-text text-danger" id="title_ar_error"></span>

                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('QA.details_ar') }}</label>
                            <textarea class="form-control summernote" name="details_ar" id="details_ar"></textarea>
                            <span class="form-text text-danger" id="details_ar_error"></span>
                        </div>
                        <!--end::Group-->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('js')
@endpush
