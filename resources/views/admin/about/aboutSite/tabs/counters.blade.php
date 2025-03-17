<div class="tab-pane fade show active" id="counters" role="tabpanel" aria-labelledby="counters_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <!--begin::body-->
                    <div class="my-5">


                        <!--begin::Group 1-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('aboutSite.counter_icon_one') }}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="image-input image-input-outline" id="kt_counter_icon_one">

                                    @if (AboutSite()->counter_icon_one)
                                        <div class="image-input-wrapper"
                                            style="background-image: url({{ asset('adminBoard/uploadedImages/about_sites/' . AboutSite()->counter_icon_one) }})">
                                        </div>
                                    @else
                                        <div class="image-input-wrapper"></div>
                                    @endif

                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="{{ __('general.change_image') }}">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="counter_icon_one" id="counter_icon_one"
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
                            <label>{{ __('aboutSite.counter_en_one') }}</label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="counter_en_one" id="counter_en_one" value="{!! AboutSite()->counter_en_one !!}"
                                placeholder="{{ __('aboutSite.counter_en_one') }}" autocomplete="off">
                            <span class="form-text text-danger" id="counter_en_one_error"></span>
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        @if (setting()->site_lang_ar == 'on')
                            <div class="form-group">
                                <label>{{ __('aboutSite.counter_ar_one') }}</label>
                                <input type="text" class="form-control form-control-solid form-control-lg"
                                    name="counter_ar_one" id="counter_ar_one" value="{!! AboutSite()->counter_ar_one !!}"
                                    placeholder="{{ __('aboutSite.counter_ar_one') }}" autocomplete="off">
                                <span class="form-text text-danger" id="counter_ar_one_error"></span>
                            </div>
                        @endif
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label>{{ __('aboutSite.counter_number_one') }}</label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="counter_number_one" id="counter_number_one" value="{!! AboutSite()->counter_number_one !!}"
                                placeholder="{{ __('aboutSite.counter_number_one') }}" autocomplete="off">
                            <span class="form-text text-danger" id="counter_number_one_error"></span>
                        </div>
                        <!--end::Group-->


                        <hr>

                        <!--begin::Group 2-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('aboutSite.counter_icon_two') }}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="image-input image-input-outline" id="kt_counter_icon_two">

                                    @if (AboutSite()->counter_icon_two)
                                        <div class="image-input-wrapper"
                                            style="background-image: url({{ asset('adminBoard/uploadedImages/about_sites/' . AboutSite()->counter_icon_two) }})">
                                        </div>
                                    @else
                                        <div class="image-input-wrapper"></div>
                                    @endif

                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="{{ __('general.change_image') }}">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="counter_icon_two" id="counter_icon_two"
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
                            <label>{{ __('aboutSite.counter_en_two') }}</label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="counter_en_two" id="counter_en_two" value="{!! AboutSite()->counter_en_two !!}"
                                placeholder="{{ __('aboutSite.counter_en_two') }}" autocomplete="off">
                            <span class="form-text text-danger" id="counter_en_two_error"></span>
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        @if (setting()->site_lang_ar == 'on')
                            <div class="form-group">
                                <label>{{ __('aboutSite.counter_ar_two') }}</label>
                                <input type="text" class="form-control form-control-solid form-control-lg"
                                    name="counter_ar_two" id="counter_ar_two" value="{!! AboutSite()->counter_ar_two !!}"
                                    placeholder="{{ __('aboutSite.counter_ar_two') }}" autocomplete="off">
                                <span class="form-text text-danger" id="counter_ar_two_error"></span>
                            </div>
                        @endif
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label>{{ __('aboutSite.counter_number_two') }}</label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="counter_number_two" id="counter_number_two" value="{!! AboutSite()->counter_number_two !!}"
                                placeholder="{{ __('aboutSite.counter_number_two') }}" autocomplete="off">
                            <span class="form-text text-danger" id="counter_number_two_error"></span>
                        </div>
                        <!--end::Group-->


                        <hr>
                        <!--begin::Group 3-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('aboutSite.counter_icon_three') }}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="image-input image-input-outline" id="kt_counter_icon_three">

                                    @if (AboutSite()->counter_icon_three)
                                        <div class="image-input-wrapper"
                                            style="background-image: url({{ asset('adminBoard/uploadedImages/about_sites/' . AboutSite()->counter_icon_three) }})">
                                        </div>
                                    @else
                                        <div class="image-input-wrapper"></div>
                                    @endif

                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="{{ __('general.change_image') }}">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="counter_icon_three" id="counter_icon_three"
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
                            <label>{{ __('aboutSite.counter_en_three') }}</label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="counter_en_three" id="counter_en_three" value="{!! AboutSite()->counter_en_three !!}"
                                placeholder="{{ __('aboutSite.counter_en_three') }}" autocomplete="off">
                            <span class="form-text text-danger" id="counter_en_three_error"></span>
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        @if (setting()->site_lang_ar == 'on')
                            <div class="form-group">
                                <label>{{ __('aboutSite.counter_ar_three') }}</label>
                                <input type="text" class="form-control form-control-solid form-control-lg"
                                    name="counter_ar_three" id="counter_ar_three" value="{!! AboutSite()->counter_ar_three !!}"
                                    placeholder="{{ __('aboutSite.counter_ar_three') }}" autocomplete="off">
                                <span class="form-text text-danger" id="counter_ar_three_error"></span>
                            </div>
                        @endif
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label>{{ __('aboutSite.counter_number_three') }}</label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="counter_number_three" id="counter_number_three" value="{!! AboutSite()->counter_number_three !!}"
                                placeholder="{{ __('aboutSite.counter_number_three') }}" autocomplete="off">
                            <span class="form-text text-danger" id="counter_number_three_error"></span>
                        </div>
                        <!--end::Group-->


                        <hr>
                        <!--begin::Group 4-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{ __('aboutSite.counter_icon_four') }}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="image-input image-input-outline" id="kt_counter_icon_four">

                                    @if (AboutSite()->counter_icon_four)
                                        <div class="image-input-wrapper"
                                            style="background-image: url({{ asset('adminBoard/uploadedImages/about_sites/' . AboutSite()->counter_icon_four) }})">
                                        </div>
                                    @else
                                        <div class="image-input-wrapper"></div>
                                    @endif

                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="{{ __('general.change_image') }}">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="counter_icon_four" id="counter_icon_four"
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
                            <label>{{ __('aboutSite.counter_en_four') }}</label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="counter_en_four" id="counter_en_four" value="{!! AboutSite()->counter_en_four !!}"
                                placeholder="{{ __('aboutSite.counter_en_four') }}" autocomplete="off">
                            <span class="form-text text-danger" id="counter_en_four_error"></span>
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        @if (setting()->site_lang_ar == 'on')
                            <div class="form-group">
                                <label>{{ __('aboutSite.counter_ar_four') }}</label>
                                <input type="text" class="form-control form-control-solid form-control-lg"
                                    name="counter_ar_four" id="counter_ar_four" value="{!! AboutSite()->counter_ar_four !!}"
                                    placeholder="{{ __('aboutSite.counter_ar_four') }}" autocomplete="off">
                                <span class="form-text text-danger" id="counter_ar_four_error"></span>
                            </div>
                        @endif
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label>{{ __('aboutSite.counter_number_four') }}</label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="counter_number_four" id="counter_number_four" value="{!! AboutSite()->counter_number_four !!}"
                                placeholder="{{ __('aboutSite.counter_number_four') }}" autocomplete="off">
                            <span class="form-text text-danger" id="counter_number_four_error"></span>
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
        var counter_icon_one = new KTImageInput('kt_counter_icon_one');
        var counter_icon_two = new KTImageInput('kt_counter_icon_two');
        var counter_icon_three = new KTImageInput('kt_counter_icon_three');
        var counter_icon_four = new KTImageInput('kt_counter_icon_four');
    </script>
@endpush
