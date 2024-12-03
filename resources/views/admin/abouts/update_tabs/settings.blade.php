<div class="tab-pane fade  show active" id="about_settings" role="tabpanel"
     aria-labelledby="about_settings_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9" style="height: 400px">

                  <!--begin::body-->
                  <div class="my-5">
                        <!--begin::Group-->
                        <div class=" form-group row d-none">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                ID
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <input value="{{$about->id}}"
                                       class="form-control form-control-solid form-control-lg"
                                       name="id" id="id" type="hidden"
                                       autocomplete="off"/>
                                       <input type="hidden" name="hidden_photo" value="hidden_photo">

                                       <input value="{{setting()->site_lang_en}}"
                                       class="form-control form-control-solid form-control-lg"
                                       name="english" id="english" type="hidden"
                                       autocomplete="off"/>
                            </div>
                        </div>
                        <!--end::Group-->


                    <!--begin::Group-->
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                        {{__('abouts.photo')}}
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <div
                                class="image-input image-input-outline"
                                id="kt_article_photo">

                                <div class="image-input-wrapper"
                                style="background-image: url({{asset('adminBoard/uploadedImages/abouts/'.$about->photo)}})"></div>

                                <label
                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title=""
                                    data-original-title="{{__('general.change_image')}}">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="photo" id="photo"
                                           class="table-responsive-sm">
                                    <input type="hidden" name="photo_remove"/>
                                </label>

                                <span
                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="cancel" data-toggle="tooltip"
                                    title="Cancel avatar"><i class="ki ki-bold-close icon-xs text-muted"></i>
                                 </span>
                            </div>
                            <span
                                class="form-text text-muted">{{__('general.image_format_allow')}}
                                                        </span>
                            <span class="form-text text-danger"
                                  id="photo_error"></span>
                        </div>
                    </div>
                    <!--end::Group-->

                      <!--begin::Group-->
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            {{__('abouts.file')}}
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input
                                class="form-control  form-control-lg"
                                type="file" name="file" id="file"
                                placeholder=""/>
                                <span class="form-text text-muted">{{__('general.file_format_allow')}}</span>
                                @if($about->file != null)
                                <a class="font-weight-bold"
                                   href="{{asset('adminBoard/uploadedFiles/abouts/'. $about->file)}}"
                                   target="_blank">{!! __('general.download') !!}
                                </a>
                                @endif
                            <span class="form-text text-danger"
                                  id="file_error"></span>
                        </div>
                    </div>
                    <!--end::Group-->

                     <!--begin::Group-->
                     <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                         {{__('abouts.type')}}
                        </label>
                        <div class="col-lg-9 col-xl-9">

                            <select
                                class="form-control  form-control-lg"
                                name="type_id" id="type_id" type="text">
                                @foreach ($about_types as $about_type )


                                <option value="{{$about_type->id}} "{{$about->about_type_id == $about_type->id ? 'selected':''}}>
                                    @if(Lang() == 'ar')
                                    {{$about_type->name_ar}}
                                    @elseif(Lang() == 'en')
                                    {{$about_type->name_en}}
                                    @endif
                                </option>
                                @endforeach

                            </select>
                            <span class="form-text text-danger"
                                  id="gender_error"></span>
                        </div>
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

        /////////////////////////////////////////////////////////////
        var article_photo = new KTImageInput('kt_article_photo');
        ////////////////////////////////////////////////////////////
        ///////// Datepicker
        $('#publish_date').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: true,
            clearBtn: false,
            orientation: "bottom auto",
            language: "{{ LaravelLocalization::getCurrentLocale()}}",
            autoclose: true,
            todayHighlight: true,
        });

        $("input:file").change(function () {
            if ($(this).val() != "") {
                $(".file_section").addClass('d-none');
            } else {
                $(".file_section").removeClass('d-none');

            }
        });
    </script>
@endpush

