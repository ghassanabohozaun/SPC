<div class="tab-pane fade  show active" id="publication_settings" role="tabpanel"
     aria-labelledby="publication_settings_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9" style="height: 580px">

                    <!--begin::body-->
                    <div class="my-5">
                         <!--begin::Group-->
                         <div class=" form-group row d-none">
                            <label class="col-xl-3 col-lg-3 col-form-label">

                            </label>
                            <div class="col-lg-9 col-xl-9">
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
                            {{__('publications.photo')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div
                                    class="image-input image-input-outline"
                                    id="kt_article_photo">

                                    <div class="image-input-wrapper"
                                    ></div>
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
                                {{__('publications.file')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                           id="file" name="file">
                                    <label class="custom-file-label" choose="" file=""></label>
                                </div>
                                <span class="form-text text-muted">
                                    {{__('general.file_format_allow')}}
                                </span>
                                <span class="form-text text-danger" id="file_error"></span>
                            </div>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                              {{__('publications.date')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="input-group date">
                                    <input type="text" class="form-control"
                                           id="date" name="date"
                                           readonly placeholder="{{__('articles.enter_publish_date')}}"/>
                                    <div class="input-group-append">
							         <span class="input-group-text">
								        <i class="la la-calendar-check-o"></i>
							         </span>
                                    </div>
                                </div>
                                <span class="form-text text-danger"
                                      id="date_error"></span>
                            </div>
                            <!--end::Group-->
                        </div>
                        <!--end::Group-->

                        {{-- <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{__('publications.writer')}}
                            </label>

                            <div  class="col-lg-9 col-xl-9">
                                <input type="text" class="form-control form-control-solid form-control-lg"
                                       name="writer" id="writer"
                                       placeholder="{{__('publications.writer')}}"
                                       autocomplete="off">
                                <span class="form-text text-danger"
                                      id="writer_error"></span>
                            </div>
                        </div>
                        <!--end::Group--> --}}

                         <!--begin::Group-->
                         <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                             {{__('publications.type')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">

                                <select
                                    class="form-control  form-control-lg"
                                    name="type" id="type" type="text">

                                    <option value="Advertisements">{{__('publications.Advertisements')}}</option>

                                    <option value="Brochures">{{__('publications.Brochures')}}</option>

                                    <option value="CaseStudy"> {{__('publications.CaseStudy')}}</option>

                                    <option value="ScientificArticles">{{__('publications.ScientificArticles')}}</option>

                                </select>

                                <span class="form-text text-danger"
                                      id="type_error"></span>
                            </div>
                        </div>
                        <!--end::Group-->

                           <!--begin::Group-->
                           <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                             {{__('publications.project_id')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">

                                <select
                                    class="form-control  form-control-lg"
                                    name="project_id" id="project_id" type="text">
                                    <option value="">{{__('general.select_from_list')}}</option>

                                    @foreach ($projects as $project)
                                    <option value="{{$project->id}}">{{$project->title}}</option>
                                    @endforeach
                                </select>

                                <span class="form-text text-danger"
                                      id="project_id_error"></span>
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
        $('#date').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: true,
            clearBtn: false,
            orientation: "bottom auto",
            language: "{{ LaravelLocalization::getCurrentLocale()}}",
            autoclose: true,
            todayHighlight: true,
        });
    </script>
@endpush

