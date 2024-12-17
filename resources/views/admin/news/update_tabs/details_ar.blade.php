<div class="tab-pane fade" id="new_details_ar" role="tabpanel" aria-labelledby="new_details_ar_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">

                    <!--begin::body-->
                    <div class="my-5">

                        <!--begin::Group-->
                        <div class="form-group">
                            <label>
                                {{ __('news.title_ar') }}
                            </label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="title_ar" id="title_ar" value="{{ $new->title_ar }}"
                                placeholder="{{ __('news.enter_title_ar') }}" autocomplete="off" readonly>
                            <span class="form-text text-danger" id="title_ar_error"></span>

                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('news.details_ar') }}</label>
                            <textarea class="form-control form-control-solid form-control-lg summernote"
                                placeholder="{{ __('news.enter_details_ar') }}" name="details_ar" id="details_ar">{{ $new->details_ar }}</textarea>
                            <span class="form-text text-danger" id="details_ar_error"></span>
                        </div>
                        <!--end::Group-->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
