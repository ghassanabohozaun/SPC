@extends('layouts.admin')
@section('title') @endsection
@section('content')

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
                        <a href="#" class="text-muted">
                            {{__('menu.landing_page')}}
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">
                            {{__('menu.partners')}}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.partners')}}" class="text-muted">
                            {{__('menu.show_all')}}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a href="{!! route('admin.partner.trashed') !!}"
                   class="btn btn-light-danger trash_btn" title="{{__('general.trash')}}">
                    <i class="fa fa-trash"></i>
                </a>
                &nbsp;
                <a href="{{route('admin.partner.create')}}"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{__('menu.add_new_partner')}}
                </a>
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
                    <div class="card card-custom" id="card_posts">
                        <div class="card-body">

                            <!--begin: Datatable-->
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="scroll">
                                            <div class="table-responsive">
                                                <table class="table myTable table-hover" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{!! __('partners.photo') !!}</th>
                                                        <th>{!! __('partners.name_ar') !!}</th>
                                                        <th>{!! __('partners.name_en') !!}</th>
                                                        <th>{!! __('partners.status') !!}</th>
                                                        <th class="text-center" style="width: 100px;">{!! __('general.actions') !!}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($partners as $partner)
                                                        <tr>
                                                            <td>{!! $loop->iteration!!}</td>
                                                            <td>
                                                                <img
                                                                    src="{{asset('adminBoard/uploadedImages/partners/'.$partner->photo)}}"
                                                                    class="img-fluid img-thumbnail table-image "/>
                                                            </td>
                                                            <td>{{ $partner->name_ar }}</td>
                                                            <td>{{ $partner->name_en }}</td>

                                                            <td>
                                                                <div class="cst-switch switch-sm">
                                                                    <input type="checkbox"
                                                                           id="change_status"
                                                                           {{$partner->status == 'on' ? 'checked':''}}  data-id="{{$partner->id}}"
                                                                           class="change_status">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{route('admin.partner.edit',$partner->id)}}"
                                                                   class="btn btn-hover-primary btn-icon btn-pill "
                                                                   title="{{__('general.edit')}}">
                                                                    <i class="fa fa-edit fa-1x"></i>
                                                                </a>

                                                                <a href="#"
                                                                   class="btn btn-hover-danger btn-icon btn-pill delete_partner_btn"
                                                                   data-id="{{$partner->id}}"
                                                                   title="{{__('general.delete')}}">
                                                                    <i class="fa fa-trash fa-1x"></i>
                                                                </a>
                                                            </td>

                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                {!! __('partners.no_partners_found') !!}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="float-right">
                                                                {!! $partners->appends(request()->all())->links() !!}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end: Datatable-->

                        </div>

                        <form class="d-none" id="form_partner_delete">
                            <input type="hidden" id="partner_delete_id">
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::content-->
@endsection
@push('js')
    <script type="text/javascript">

        //Show user Delete Notify
        $(document).on('click', '.delete_partner_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: "{{__('general.ask_delete_record')}}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "{{__('general.yes')}}",
                cancelButtonText: "{{__('general.no')}}",
                reverseButtons: false,
                allowOutsideClick: false,
            }).then(function (result) {
                if (result.value) {
                    //////////////////////////////////////
                    // Delete User
                    $.ajax({
                        url: '{!! route('admin.partner.destroy') !!}',
                        data: {id, id},
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data.status == true) {
                                Swal.fire({
                                    title: "{!! __('general.deleted') !!}",
                                    text: data.msg,
                                    icon: "success",
                                    allowOutsideClick: false,
                                    customClass: {confirmButton: 'delete_user_button'}
                                });
                                $('.delete_user_button').click(function () {
                                    //updateDataTable
                                    $('#form_partner_delete').find('#partner_delete_id').val();
                                    $('#myTable').load(location.href + (' #myTable'));
                                });
                            }
                        },//end success
                    });

                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        title: "{!! __('general.cancelled') !!}",
                        text: "{!! __('general.cancelled_message') !!}",
                        icon: "error",
                        allowOutsideClick: false,
                        customClass: {confirmButton: 'cancel_delete_user_button'}
                    })
                }
            });

        })

        // switch english language
        var switchStatus = false;
        $('body').on('change', '.change_status', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            if ($(this).is(':checked')) {
                switchStatus = $(this).is(':checked');
            } else {
                switchStatus = $(this).is(':checked');
            }

            $.ajax({
                url: "{{route('admin.partner.change.status')}}",
                data: {switchStatus: switchStatus, id: id},
                type: 'post',
                dataType: 'JSON',
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{__('general.please_wait')}}",
                    });
                },//end beforeSend
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'switch_status_toggle'}
                        });
                        $('.switch_status_toggle').click(function () {
                        });
                    }
                },//end success
            })
        });

    </script>
@endpush
