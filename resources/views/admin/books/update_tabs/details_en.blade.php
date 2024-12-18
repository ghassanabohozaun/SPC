<div class="tab-pane fade" id="book_details_en" role="tabpanel" aria-labelledby="book_details_en_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">

                    <!--begin::body-->
                    <div class="my-5">

                        <!--begin::Group-->
                        <div class="form-group">
                            <label>
                                {{ __('books.title_en') }}
                            </label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                name="title_en" id="title_en" value="{{ $book->title_en }}"
                                placeholder="{{ __('books.enter_title_en') }}" autocomplete="off" readonly>
                            <span class="form-text text-danger" id="title_en_error"></span>

                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{ __('books.abstract_en') }}</label>
                            <textarea class="form-control form-control-solid form-control-lg summernote"
                                placeholder="{{ __('books.enter_abstract_en') }}" name="abstract_en" id="abstract_en">{{ $book->abstract_en }}</textarea>
                            <span class="form-text text-danger" id="abstract_en_error"></span>
                        </div>
                        <!--end::Group-->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
