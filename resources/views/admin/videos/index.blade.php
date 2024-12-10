@extends('layouts.admin')
@section('title')
@endsection
@section('css')
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
                        <a href="#" class="text-muted">
                            {{ __('menu.videos') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.videos') }}" class="text-muted">
                            {{ __('menu.show_all') }}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">

                <a href="{!! route('admin.videos.trashed') !!}" class="btn btn-light-danger trash_btn" title="{{ __('general.trash') }}">
                    <i class="fa fa-trash"></i>
                </a>
                &nbsp;

                <a href="{{ route('admin.videos.create') }}"
                    class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{ __('menu.add_new_video') }}
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
                                                            <th>{!! __('videos.photo') !!}</th>
                                                            <th>{!! __('videos.title_en') !!}</th>
                                                            @if (setting()->site_lang_ar == 'on')
                                                                <th>{!! __('videos.title_ar') !!}</th>
                                                            @endif
                                                            <th>{!! __('videos.duration') !!}</th>
                                                            <th>{!! __('videos.status') !!}</th>
                                                            <th class="text-center" style="width: 200px;">
                                                                {!! __('general.actions') !!}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($videos as $video)
                                                            <tr>
                                                                <td>{!! $loop->iteration !!}</td>
                                                                <td>@include('admin.videos.parts.photo') </td>
                                                                <td>{{ $video->title_en }}</td>
                                                                @if (setting()->site_lang_ar == 'on')
                                                                    <td>{{ $video->title_ar }}</td>
                                                                @endif
                                                                <td>@include('admin.videos.parts.duration')</td>
                                                                <td>
                                                                    <div class="cst-switch switch-sm">
                                                                        <input type="checkbox" id="change_status"
                                                                            {{ $video->status == 'on' ? 'checked' : '' }}
                                                                            data-id="{{ $video->id }}"
                                                                            class="change_status">
                                                                    </div>
                                                                </td>
                                                                <td>@include('admin.videos.parts.options')</td>

                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="7" class="text-center">
                                                                    {!! __('videos.no_videos_found') !!}
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="7">
                                                                <div class="float-right">
                                                                    {!! $videos->appends(request()->all())->links() !!}
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

                        <form class="d-none" id="form_video_delete">
                            <input type="hidden" id="video_id">
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

    <!-- begin Modal-->
    <div class="modal fade model_show_video" id="model_show_video" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>


                <!--begin::Card-->
                <div class="card card-custom card-shadowless rounded-top-0">
                    <!--begin::Body-->
                    <div class="card-body p-1">

                        <div class="col-xl-12 col-xxl-12">
                            <div class="row justify-content-center">
                                <div id="video_view"></div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end Modal-->
@endsection
@push('js')
    <script type="text/javascript">
        //delete video
        $(document).on('click', '.delete_video_btn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: "{{ __('general.ask_delete_record') }}",
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
                        url: '{!! route('admin.videos.destroy') !!}',
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
                                    text: data.msg,
                                    icon: "success",
                                    allowOutsideClick: false,
                                    customClass: {
                                        confirmButton: 'delete_video_button'
                                    }
                                });
                                $('.delete_video_button').click(function() {
                                    $('#video_id').find('#video_id').val();
                                    $('#myTable').load(location.href + (' #myTable'));
                                });
                            }
                        }, //end success
                    });

                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        title: "{!! __('general.cancelled') !!}",
                        text: "{!! __('general.cancelled_message') !!}",
                        icon: "error",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: 'cancel_delete_user_button'
                        }
                    })
                }
            });

        })

        // close video show modal By event
        $('#model_show_video').on('hidden.bs.modal', function(e) {
            e.preventDefault();
            $("#video_view iframe").attr('src', '');
            $('#model_show_video').modal('hide');
        });

        // show Video
        $(document).on('click', '.show_video_btn', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#video_view').empty();

            $.get("{{ route('admin.videos.view') }}", {
                id,
                id
            }, function(data) {
                console.log(data);
                $('#video_view').html('<div class="videoWrapper">' +
                    '<iframe  width="450" height="315" align="middle"' +
                    'src="https://www.youtube.com/embed/' + data.link + '"></iframe></div>');

                $('#model_show_video').modal('show');
            });
        });

        // switch english language
        var switchStatus = false;
        $('body').on('change', '.change_status', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            if ($(this).is(':checked')) {
                switchStatus = $(this).is(':checked');
            } else {
                switchStatus = $(this).is(':checked');
            }

            $.ajax({
                url: "{{ route('admin.videos.change.status') }}",
                data: {
                    switchStatus: switchStatus,
                    id: id
                },
                type: 'post',
                dataType: 'JSON',
                beforeSend: function() {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{ __('general.please_wait') }}",
                    });
                }, //end beforeSend
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
                                confirmButton: 'switch_status_toggle'
                            }
                        });
                        $('.switch_status_toggle').click(function() {});
                    }
                }, //end success
            })
        });

        /////////////////////////////////////////////////////////////////////////////////////
        // copy video link
        // $('body').on('click', '.copy_video_link', function(e) {
        //     e.preventDefault();

        //     var id = $(this).data('id');
        //     //////////////////////////////////////////////////////
        //     /// Start clipboard
        //     var copyText = "{{ url('/') }}/videos-show/" + id;
        //     var el = document.createElement('textarea');
        //     el.value = copyText;
        //     el.setAttribute('readonly', '');
        //     el.style = {
        //         position: 'absolute',
        //         left: '-9999px'
        //     };
        //     document.body.appendChild(el);
        //     el.select();
        //     document.execCommand('copy');
        //     document.body.removeChild(el);
        //     KTApp.unblockPage();


        //     Swal.fire({
        //         title: '',
        //         text: "{{ __('general.copied') }}",
        //         icon: "success",
        //         allowOutsideClick: false,
        //         customClass: {
        //             confirmButton: 'copy_video_button'
        //         }
        //     });
        //     $('.copy_video_button').click(function() {
        //         window.location.href = "{{ route('admin.videos') }}";
        //     });

        // })
    </script>
@endpush

@push('css')
    <style>
        iframe {
            border: none;
            max-width: 100%;
            margin-top: 5px;
            margin-bottom: 5px;
            -moz-border-radius: 1px;
            -webkit-border-radius: 1px;
            border-radius: 1px;
            -moz-box-shadow: 4px 4px 5px #ffffff;
            -webkit-box-shadow: 4px 4px 14px #ffffff;
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=.2);
        }
    </style>
@endpush
