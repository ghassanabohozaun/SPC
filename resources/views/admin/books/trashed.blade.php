@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{!! route('admin.books') !!}" class="text-muted">
                            {{ __('menu.books') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">
                            {{ __('menu.trashed_books') }}
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{!! route('admin.books.trashed') !!}" class="text-muted">
                            {{ __('menu.show_all') }}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a href="{{ route('admin.books.create') }}"
                    class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{ __('menu.add_new_book') }}
                </a>
                &nbsp;
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
                                                            <th>{!! __('books.photo') !!}</th>
                                                            <th>{!! __('books.title_en') !!}</th>
                                                            <th>{!! __('books.title_ar') !!}</th>
                                                            <th>{!! __('books.publish_date') !!}</th>
                                                            <th>{!! __('books.publisher_name') !!}</th>
                                                            <th class="text-center" style="width: 100px;">
                                                                {!! __('general.actions') !!}
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($trashedBooks as $book)
                                                            <tr>
                                                                <td>@include('admin.books.parts.photo')</td>
                                                                <td>{{ $book->title_ar }}</td>
                                                                <td>{{ $book->title_en }}</td>
                                                                <td>{{ $book->publish_date }}</td>
                                                                <td>{{ $book->publisher_name }}</td>
                                                                <td>
                                                                    <a class="btn btn-hover-warning btn-icon btn-pill restore_book_btn"
                                                                        data-id="{{ $book->id }}"
                                                                        title="{{ __('general.restore') }}">
                                                                        <i class="fa fa-trash-restore fa-1x"></i>
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-hover-danger btn-icon btn-pill force_delete_book_btn"
                                                                        data-id="{{ $book->id }}"
                                                                        title="{{ __('general.force_delete') }}">
                                                                        <i class="fa fa-trash-alt fa-1x"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="7" class="text-center">
                                                                    {!! __('books.no_books_found') !!}
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="7">
                                                                <div class="float-right">
                                                                    {!! $trashedBooks->appends(request()->all())->links() !!}
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

                        <form class="d-none" id="form_book_delete">
                            <input type="hidden" id="book_delete_id">
                        </form>
                        <!--end::Form-->

                    </div>
                    <!--end::Card-->


                </div>

            </div>
            <!--end::Row-->


        </div>
        <!--end::Container-->

        <!--begin::Form-->


    </div>


    <!--end::content-->
@endsection
@push('js')
    <script type="text/javascript">
        ///////////////////////////////////////////////////
        /// delete book
        $(document).on('click', '.force_delete_book_btn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: "{{ __('general.ask_permanent_delete_record') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "{{ __('general.yes') }}",
                cancelButtonText: "{{ __('general.no') }}",
                reverseButtons: false,
                allowOutsideClick: false,
            }).then(function(result) {
                if (result.value) {
                    //////////////////////////////////////
                    // Delete User
                    $.ajax({
                        url: '{!! route('admin.books.force.delete') !!}',
                        data: {
                            id,
                            id
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            if (data.status == true) {
                                Swal.fire({
                                    title: "{!! __('general.deleted') !!}",
                                    text: "{!! __('general.delete_success_message') !!}",
                                    icon: "success",
                                    allowOutsideClick: false,
                                    customClass: {
                                        confirmButton: 'delete_book_button'
                                    }
                                });
                                $('.delete_book_button').click(function() {
                                    $('#myTable').load(location.href + (' #myTable'));
                                });
                            }
                        }, //end success
                    });

                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        title: "{!! __('general.cancelled') !!}",
                        text: "{!! __('general.error_message') !!}",
                        icon: "error",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: 'cancel_delete_book_button'
                        }
                    })
                }
            });
        })


        ////////////////////////////////////////////////////
        // restore book
        $(document).on('click', '.restore_book_btn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: "{{ route('admin.books.restore') }}",
                data: {
                    id,
                    id
                },
                type: 'post',
                dataType: 'JSON',
                beforeSend: function() {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{ __('general.please_wait') }}",
                    });
                },
                success: function(data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'restore_book_button'
                            }
                        });
                        $('.restore_book_button').click(function() {
                            $('#myTable').load(location.href + (' #myTable'));
                        });
                    }
                }, //end success
            })
        })
    </script>
@endpush
