@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{!! route('admin.fixed.texts.update') !!}" method="POST"
          id="form_fixed_texts_store"
          enctype="multipart/form-data">
        @csrf
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div
                class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);" class="text-muted">
                                {{__('menu.landing_page')}}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{__('menu.fixed_texts')}}
                            </a>
                        </li>
                    </ul>

                    <!--end::Actions-->
                </div>
                <!--end::Info-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <button type="submit"
                            class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                        <i class="fa fa-save"></i>
                        {{__('general.save')}}
                    </button>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->


        <!--begin::content-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container-fluid ">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0" id="card_settings_store">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">

                                        <!--begin::row-->
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12">
                                                <h2>{!! __('fixedTexts.projects') !!}</h2>
                                                <div class="my-5">
                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.project_details_ar')}}
                                                        </label>
                                                        <textarea rows="2"
                                                                  class="form-control  form-control-lg"
                                                                  name="project_details_ar"
                                                                  id="project_details_ar"
                                                                  placeholder=" {{__('fixedTexts.enter_project_details_ar')}}"
                                                                  autocomplete="off">{!! fixedTexts()->project_details_ar ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="project_details_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.project_details_en')}}
                                                        </label>
                                                        <textarea rows="2"
                                                                  class="form-control  form-control-lg"
                                                                  name="project_details_en"
                                                                  id="project_details_en"
                                                                  placeholder=" {{__('fixedTexts.enter_project_details_en')}}"
                                                                  autocomplete="off">{!! fixedTexts()->project_details_en ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="project_details_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::row-->
                                        <hr>

                                        <!--begin::row-->
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12">
                                                <h2>{!! __('fixedTexts.about_association') !!}</h2>
                                                <div class="my-5">
                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.about_association_title_ar')}}
                                                        </label>
                                                        <textarea rows="2"
                                                                  class="form-control  form-control-lg"
                                                                  name="about_association_title_ar"
                                                                  id="about_association_title_ar"
                                                                  placeholder=" {{__('fixedTexts.enter_about_association_title_ar')}}"
                                                                  autocomplete="off">{!! fixedTexts()->about_association_title_ar ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="about_association_title_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.about_association_title_en')}}
                                                        </label>
                                                        <textarea rows="2"
                                                                  class="form-control  form-control-lg"
                                                                  name="about_association_title_en"
                                                                  id="about_association_title_en"
                                                                  placeholder=" {{__('fixedTexts.enter_about_association_title_en')}}"
                                                                  autocomplete="off">{!! fixedTexts()->about_association_title_en ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="about_association_title_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.about_association_details_ar')}}
                                                        </label>
                                                        <textarea rows="4"
                                                                  class="form-control  form-control-lg"
                                                                  name="about_association_details_ar"
                                                                  id="about_association_details_ar"
                                                                  placeholder=" {{__('fixedTexts.enter_about_association_details_ar')}}"
                                                                  autocomplete="off">{!! fixedTexts()->about_association_details_ar ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="about_association_details_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.about_association_details_en')}}
                                                        </label>
                                                        <textarea rows="4"
                                                                  class="form-control form-control-lg"
                                                                  name="about_association_details_en"
                                                                  id="about_association_details_en"
                                                                  placeholder=" {{__('fixedTexts.enter_about_association_details_en')}}"
                                                                  autocomplete="off">{!! fixedTexts()->about_association_details_en ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="about_association_details_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.about_association_founders_count')}}
                                                        </label>
                                                        <input type="text"
                                                               class="form-control  form-control-lg"
                                                               name="about_association_founders_count"
                                                               id="about_association_founders_count"
                                                               placeholder=" {{__('fixedTexts.enter_about_association_founders_count')}}"
                                                               autocomplete="off"
                                                               value="{!! fixedTexts()->about_association_founders_count ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                              id="about_association_founders_count_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.about_association_beneficiaries_count')}}
                                                        </label>
                                                        <input type="text" class="form-control  form-control-lg"
                                                               name="about_association_beneficiaries_count"
                                                               id="about_association_beneficiaries_count"
                                                               placeholder=" {{__('fixedTexts.enter_about_association_beneficiaries_count')}}"
                                                               autocomplete="off"
                                                               value="{!! fixedTexts()->about_association_beneficiaries_count ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                              id="about_association_beneficiaries_count_error"></span>
                                                    </div>
                                                    <!--end::Group-->


                                                </div>
                                            </div>
                                        </div>
                                        <!--end::row-->
                                        <hr>


                                        <!--begin::row-->
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12">
                                                <h2>{!! __('fixedTexts.founders') !!}</h2>
                                                <div class="my-5">
                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.founders_title_ar')}}
                                                        </label>
                                                        <textarea rows="2"
                                                                  class="form-control  form-control-lg"
                                                                  name="founders_title_ar"
                                                                  id="founders_title_ar"
                                                                  placeholder=" {{__('fixedTexts.enter_founders_title_ar')}}"
                                                                  autocomplete="off">{!! fixedTexts()->founders_title_ar ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="founders_title_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.founders_title_en')}}
                                                        </label>
                                                        <textarea rows="2"
                                                                  class="form-control  form-control-lg"
                                                                  name="founders_title_en"
                                                                  id="founders_title_en"
                                                                  placeholder=" {{__('fixedTexts.enter_founders_title_en')}}"
                                                                  autocomplete="off">{!! fixedTexts()->founders_title_en ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="founders_title_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::row-->
                                        <hr>

                                        <!--begin::row-->
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12">
                                                <h2>{!! __('fixedTexts.blog') !!}</h2>
                                                <div class="my-5">
                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.blog_title_ar')}}
                                                        </label>
                                                        <textarea rows="2"
                                                                  class="form-control  form-control-lg"
                                                                  name="blog_title_ar"
                                                                  id="blog_title_ar"
                                                                  placeholder=" {{__('fixedTexts.enter_blog_title_ar')}}"
                                                                  autocomplete="off">{!! fixedTexts()->blog_title_ar ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="blog_title_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.blog_title_en')}}
                                                        </label>
                                                        <textarea rows="2"
                                                                  class="form-control  form-control-lg"
                                                                  name="blog_title_en"
                                                                  id="blog_title_en"
                                                                  placeholder=" {{__('fixedTexts.enter_blog_title_en')}}"
                                                                  autocomplete="off">{!! fixedTexts()->blog_title_en ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="blog_title_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::row-->
                                        <hr>

                                        <!--begin::row-->
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12">
                                                <h2>{!! __('fixedTexts.testimonials') !!}</h2>
                                                <div class="my-5">
                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.testimonials_title_ar')}}
                                                        </label>
                                                        <textarea rows="2"
                                                                  class="form-control  form-control-lg"
                                                                  name="testimonials_title_ar"
                                                                  id="testimonials_title_ar"
                                                                  placeholder=" {{__('fixedTexts.enter_testimonials_title_ar')}}"
                                                                  autocomplete="off">{!! fixedTexts()->testimonials_title_ar ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="testimonials_title_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.testimonials_title_en')}}
                                                        </label>
                                                        <textarea rows="2"
                                                                  class="form-control  form-control-lg"
                                                                  name="testimonials_title_en"
                                                                  id="testimonials_title_en"
                                                                  placeholder=" {{__('fixedTexts.enter_testimonials_title_en')}}"
                                                                  autocomplete="off">{!! fixedTexts()->testimonials_title_en ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="testimonials_title_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.testimonials_details_ar')}}
                                                        </label>
                                                        <textarea rows="4"
                                                                  class="form-control  form-control-lg"
                                                                  name="testimonials_details_ar"
                                                                  id="testimonials_details_ar"
                                                                  placeholder=" {{__('fixedTexts.enter_testimonials_details_ar')}}"
                                                                  autocomplete="off">{!! fixedTexts()->testimonials_details_ar ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="testimonials_details_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{__('fixedTexts.testimonials_details_en')}}
                                                        </label>
                                                        <textarea rows="4"
                                                                  class="form-control  form-control-lg"
                                                                  name="testimonials_details_en"
                                                                  id="testimonials_details_en"
                                                                  placeholder=" {{__('fixedTexts.enter_testimonials_details_en')}}"
                                                                  autocomplete="off">{!! fixedTexts()->testimonials_details_en ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="testimonials_details_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::row-->
                                        <hr>


                                        <!--begin::row-->
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12">
                                                <h2>{!! __('fixedTexts.counters') !!}</h2>

                                                <div class="my-5">
                                                    <div class="row justify-content-center">
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_icon_1')}}
                                                                </label>

                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                           id="counter_icon_1" name="counter_icon_1">
                                                                    <label class="custom-file-label" choose="" file="">
                                                                    </label>
                                                                </div>
                                                                <span class="form-text text-danger"
                                                                      id="counter_icon_1_error">
                                                                </span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-1">
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    @if(!empty(fixedTexts()->counter_icon_1))
                                                                        <img
                                                                            src="{{asset('adminBoard/uploadedImages/counters/'.fixedTexts()->counter_icon_1)}}"
                                                                            class="img-fluid img-thumbnail table-image "/>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_number_1')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_number_1"
                                                                    id="counter_number_1"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_number_1')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_number_1 ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_number_1_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_name_1_ar')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_name_1_ar"
                                                                    id="counter_name_1_ar"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_name_1_ar')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_name_1_ar ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_name_1_ar_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_name_1_en')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_name_1_en"
                                                                    id="counter_name_1_en"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_name_1_en')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_name_1_en ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_name_1_en_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>


                                                    <div class="row justify-content-center">
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_icon_2')}}
                                                                </label>

                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                           id="counter_icon_2" name="counter_icon_2">
                                                                    <label class="custom-file-label" choose="" file="">
                                                                    </label>
                                                                </div>
                                                                <span class="form-text text-danger"
                                                                      id="counter_icon_2_error">
                                                                </span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-1">
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    @if(!empty(fixedTexts()->counter_icon_2))
                                                                        <img
                                                                            src="{{asset('adminBoard/uploadedImages/counters/'.fixedTexts()->counter_icon_2)}}"
                                                                            class="img-fluid img-thumbnail table-image "/>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_number_2')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_number_2"
                                                                    id="counter_number_2"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_number_2')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_number_2 ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_number_2_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_name_2_ar')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_name_2_ar"
                                                                    id="counter_name_2_ar"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_name_2_ar')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_name_2_ar ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_name_2_ar_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_name_2_en')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_name_2_en"
                                                                    id="counter_name_2_en"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_name_2_en')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_name_2_en ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_name_2_en_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>


                                                    <div class="row justify-content-center">
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_icon_3')}}
                                                                </label>

                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                           id="counter_icon_3" name="counter_icon_3">
                                                                    <label class="custom-file-label" choose="" file="">
                                                                    </label>
                                                                </div>
                                                                <span class="form-text text-danger"
                                                                      id="counter_icon_3_error">
                                                                </span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-1">
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    @if(!empty(fixedTexts()->counter_icon_3))
                                                                        <img
                                                                            src="{{asset('adminBoard/uploadedImages/counters/'.fixedTexts()->counter_icon_3)}}"
                                                                            class="img-fluid img-thumbnail table-image "/>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_number_3')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_number_3"
                                                                    id="counter_number_3"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_number_3')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_number_3 ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_number_3_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_name_3_ar')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_name_3_ar"
                                                                    id="counter_name_3_ar"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_name_3_ar')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_name_3_ar ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_name_3_ar_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_name_3_en')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_name_3_en"
                                                                    id="counter_name_3_en"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_name_3_en')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_name_3_en ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_name_3_en_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>


                                                    <div class="row justify-content-center">
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_icon_4')}}
                                                                </label>

                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                           id="counter_icon_4" name="counter_icon_4">
                                                                    <label class="custom-file-label" choose="" file="">
                                                                    </label>
                                                                </div>
                                                                <span class="form-text text-danger"
                                                                      id="counter_icon_4_error">
                                                                </span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-1">
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    @if(!empty(fixedTexts()->counter_icon_4))
                                                                        <img
                                                                            src="{{asset('adminBoard/uploadedImages/counters/'.fixedTexts()->counter_icon_4)}}"
                                                                            class="img-fluid img-thumbnail table-image "/>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_number_4')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_number_4"
                                                                    id="counter_number_4"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_number_4')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_number_4 ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_number_4_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_name_4_ar')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_name_4_ar"
                                                                    id="counter_name_4"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_name_4_ar')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_name_4_ar ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_name_4_ar_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <div class="col-3">
                                                            <!--begin::Group-->
                                                            <div class="form-group">
                                                                <label>
                                                                    {{__('fixedTexts.counter_name_4_en')}}
                                                                </label>
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="counter_name_4_en"
                                                                    id="counter_name_4_en"
                                                                    placeholder=" {{__('fixedTexts.enter_counter_name_4_en')}}"
                                                                    autocomplete="off"
                                                                    value="{!! fixedTexts()->counter_name_4_en ?? '' !!}">
                                                                <span class="form-text text-danger"
                                                                      id="counter_name_4_en_error"></span>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <!--end::row-->
                                        <hr>

                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>

            </div>
        </div>
        <!--end::content-->

    </form>

@endsection

@push('js')

    <script type="text/javascript">
        //////////////////////////////////////////////////////
        $('#form_fixed_texts_store').on('submit', function (e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#project_details_ar').css('border-color', '');
            $('#project_details_en').css('border-color', '');
            $('#about_association_title_ar').css('border-color', '');
            $('#about_association_title_en').css('border-color', '');
            $('#about_association_details_ar').css('border-color', '');
            $('#about_association_details_en').css('border-color', '');
            $('#about_association_founders_count').css('border-color', '');
            $('#about_association_beneficiaries_count').css('border-color', '');
            $('#founders_title_ar').css('border-color', '');
            $('#founders_title_en').css('border-color', '');
            $('#blog_title_ar').css('border-color', '');
            $('#blog_title_en').css('border-color', '');
            $('#testimonials_title_ar').css('border-color', '');
            $('#testimonials_title_en').css('border-color', '');
            $('#testimonials_details_ar').css('border-color', '');
            $('#testimonials_details_en').css('border-color', '');
            $('#counter_icon_1').css('border-color', '');
            $('#counter_number_1').css('border-color', '');
            $('#counter_name_1_ar').css('border-color', '');
            $('#counter_name_1_en').css('border-color', '');
            $('#counter_icon_2').css('border-color', '');
            $('#counter_number_2').css('border-color', '');
            $('#counter_name_2_ar').css('border-color', '');
            $('#counter_name_2_en').css('border-color', '');
            $('#counter_icon_3').css('border-color', '');
            $('#counter_number_3').css('border-color', '');
            $('#counter_name_3_ar').css('border-color', '');
            $('#counter_name_3_en').css('border-color', '');
            $('#counter_icon_4').css('border-color', '');
            $('#counter_number_4').css('border-color', '');
            $('#counter_name_4_ar').css('border-color', '');
            $('#counter_name_4_en').css('border-color', '');

            $('#project_details_ar_error').text('');
            $('#project_details_en_error').text('');
            $('#about_association_title_ar_error').text('');
            $('#about_association_title_en_error').text('');
            $('#about_association_details_ar_error').text('');
            $('#about_association_details_en_error').text('');
            $('#about_association_founders_count_error').text('');
            $('#about_association_beneficiaries_count_error').text('');
            $('#founders_title_ar_error').text('');
            $('#founders_title_en_error').text('');
            $('#blog_title_ar_error').text('');
            $('#blog_title_en_error').text('');
            $('#testimonials_title_ar_error').text('');
            $('#testimonials_title_en_error').text('');
            $('#testimonials_details_ar_error').text('');
            $('#testimonials_details_en_error').text('');
            $('#counter_icon_1_error').text('');
            $('#counter_number_1_error').text('');
            $('#counter_name_1_ar_error').text('');
            $('#counter_name_1_en_error').text('');
            $('#counter_icon_2_error').text('');
            $('#counter_number_2_error').text('');
            $('#counter_name_2_ar_error').text('');
            $('#counter_name_2_en_error').text('');
            $('#counter_icon_3_error').text('');
            $('#counter_number_3_error').text('');
            $('#counter_name_3_ar_error').text('');
            $('#counter_name_3_en_error').text('');
            $('#counter_icon_4_error').text('');
            $('#counter_number_4_error').text('');
            $('#counter_name_4_ar_error').text('');
            $('#counter_name_4_en_error').text('');
            /////////////////////////////////////////////////////////////

            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: type,
                data: data,
                dataType: false,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                },
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'update_fixed_texts_button'}
                        });
                        $('.update_fixed_texts_button').click(function () {
                            $('html, body').animate({scrollTop: 5}, 300);
                        });
                    }
                },

                error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');
                        $('body,html').animate({scrollTop: 20}, 300);
                    });
                },
                complete: function () {
                    KTApp.unblockPage();
                },
            })

        });//end submit

    </script>
@endpush

