<div class="tab-pane fade show active" id="faq_details_en" role="tabpanel" aria-labelledby="details_en_tab">
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
                                    class="form-control form-control-solid form-control-lg" name="site_lang_ar"
                                    id="site_lang_ar" type="hidden" autocomplete="off" />
                            </div>
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label>
                                {{ __('faqs.question_en') }}
                            </label>

                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="question_en" id="question_en" placeholder="{{ __('faqs.enter_question_en') }}"
                                autocomplete="off">
                            <span class="form-text text-danger" id="question_en_error"></span>

                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('faqs.answer_en') }}</label>
                            <textarea class="form-control summernote" name="answer_en" id="answer_en"></textarea>
                            <span class="form-text text-danger" id="answer_en_error"></span>
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
