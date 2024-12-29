    <!-- begin support center message show modal -->
    <div class="modal fade" id="modal_support_center_message_show" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('supportCenter.show_message') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <!--begin::Card-->
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <!--begin::Body-->
                        <div class="card-body p-0">

                            <div class="col-xl-12 col-xxl-10">

                                <div class="row justify-content-center">
                                    <div class="col-xl-12">


                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                {{ __('supportCenter.title') }}
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <textarea rows="2" readonly class="form-control form-control-lg" name="title" id="title" type="text"
                                                    autocomplete="off"></textarea>
                                            </div>

                                        </div>
                                        <!--end::Group-->

                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                {{ __('supportCenter.message') }}
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <textarea rows="8" readonly class="form-control  form-control-lg" name="message" id="message" type="text"
                                                    autocomplete="off"></textarea>
                                            </div>

                                        </div>
                                        <!--end::Group-->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="#" id="cancel_support_center_message_btn"
                        class="btn btn-light-primary font-weight-bold">
                        {{ __('general.cancel') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- end support center message show modal -->
