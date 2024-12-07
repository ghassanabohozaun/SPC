<div class="tab-pane fade" id="faq_details_ar" role="tabpanel" aria-labelledby="faq_details_ar_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">

                    <!--begin::body-->
                    <div class="my-5">


                        <!--begin::Group-->
                        <div class=" form-group row d-none">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                ID
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <input value="{{ $faq->id }}"
                                    class="form-control form-control-solid form-control-lg" name="id"
                                    id="id" type="hidden" autocomplete="off" />
                                <input value="{{ setting()->site_lang_ar }}"
                                    class="form-control form-control-solid form-control-lg" name="arabic"
                                    id="arabic" type="hidden" autocomplete="off" />

                            </div>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label>
                                {{ __('faqs.question_ar') }}
                            </label>

                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="question_ar" id="question_ar" value="{{ $faq->question_ar }}"
                                placeholder="{{ __('QA.question_ar') }}" autocomplete="off">
                            <span class="form-text text-danger" id="question_ar_error"></span>

                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('faqs.answer_ar') }}</label>
                            <textarea class="form-control summernote" placeholder="{{ __('faqs.answer_ar') }}" name="answer_ar" id="answer_ar">{{ $faq->answer_ar }}</textarea>
                            <span class="form-text text-danger" id="answer_ar_error"></span>
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