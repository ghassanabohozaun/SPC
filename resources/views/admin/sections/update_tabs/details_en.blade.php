<div class="tab-pane fade" id="service_details_en" role="tabpanel" aria-labelledby="details_en_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">

                    <!--begin::body-->
                    <div class="my-5">


                        <!--begin::Group-->
                        <div class="form-group">
                            <label>
                                {{ __('services.title_en') }}
                            </label>

                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="title_en" id="title_en" placeholder="{{ __('services.enter_title_en') }}"
                                autocomplete="off" value="{!! $service->title_en !!}">
                            <span class="form-text text-danger" id="title_en_error"></span>

                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label>
                                {{ __('services.summary_en') }}
                            </label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="summary_en" id="summary_en" placeholder="{{ __('services.enter_summary_en') }}"
                                autocomplete="off" value="{!! $service->summary_en !!}">
                            <span class="form-text text-danger" id="summary_en_error"></span>

                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('services.details_en') }}</label>
                            <textarea class="form-control summernote" name="details_en" id="details_en">{!! $service->details_en !!}</textarea>
                            <span class="form-text text-danger" id="details_en_error"></span>
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
