<div class="tab-pane fade show active" id="about_spc_details_en" role="tabpanel" aria-labelledby="details_en_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">

                    <!--begin::body-->
                    <div class="my-5">


                        <!--begin::Group-->
                        <div class=" form-group row d-none">
                            <label class="col-xl-3 col-lg-3 col-form-label">ID</label>
                            <div class="col-lg-9 col-xl-9">
                                <input type="hidden" value="{{ $aboutSpc->id }}"
                                    class="form-control form-control-solid form-control-lg" name="id"
                                    id="id" autocomplete="off" />

                                <input type="hidden" class="form-control form-control-solid form-control-lg"
                                    id="site_lang_ar" name="site_lang_ar" value="{!! setting()->site_lang_ar !!}">
                            </div>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label>
                                {{ __('aboutSpcs.title_en') }}
                            </label>

                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="title_en" id="title_en" placeholder="{{ __('aboutSpcs.enter_title_en') }}"
                                autocomplete="off" value="{!! $aboutSpc->title_en !!}">
                            <span class="form-text text-danger" id="title_en_error"></span>
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('aboutSpcs.details_en') }}</label>
                            <textarea class="form-control summernote" name="details_en" id="details_en">{!! $aboutSpc->details_en !!}</textarea>
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
