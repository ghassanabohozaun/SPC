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
                        <a href="{{route('admin.photo.albums')}}" class="text-muted">
                            {{__('menu.photo_albums')}}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">
                            {{__('photoAlbums.add_other_album_photos')}}
                        </a>
                    </li>

                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->


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
                    <!--begin::Card-->
                    <div class="card card-custom card-shadowless rounded-top-0" id="">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-10">

                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">

                                            <!--begin::body-->
                                            <div class="my-5">

                                                <style type="text/css">
                                                    .dropzone .dz-preview .dz-image img {
                                                        width: 125px;
                                                        height: 120px;
                                                    }
                                                </style>


                                                <label
                                                    style="font-weight:bold">{{__('photoAlbums.add_other_album_photos')}}</label>

                                                <div class="dropzone dropzone-default dz-clickable"
                                                     id="dropzoneFileUpload"></div>

                                            </div>
                                            <!--begin::body-->


                                        </div>
                                    </div>

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


@endsection


@push('js')
    <script type="text/javascript">

        Dropzone.autoDiscover = false;
        $(document).ready(function () {

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////
            ///  Upload post Photos
            $('#dropzoneFileUpload').dropzone({
                url: "{{route('admin.upload.other.album.photos',$photoAlbum->id)}}",
                paramName: 'file',
                uploadMultiple: false,
                maxFiles: 20,  // Max File  Count
                maximumFileSize: 1, // File Size
                acceptedFiles: 'image/*',  // File Type
                resizeWidth: 700,
                //// Default Message
                dictDefaultMessage: "{{__('photoAlbums.other_album_photos_upload')}}",
                ///// Remove Image
                params: {
                    _token: "{{csrf_token()}}"
                },
                ///////////////////////////////////////////////////
                ////////// Delete File
                dictRemoveFile: "{{__('general.delete')}}",
                addRemoveLinks: true,
                removedfile: function (file) {
                    $.post("{{route('admin.delete.other.album.photo')}}", {id: file.fid}, function (data) {
                        console.log(data);
                    });
                    var fmock;
                    return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement) : void 0;
                },

                ///////////////////////////////// Start Get Images
                ////// Get Images From Model --> tip: take care there is relation between post and file
                init: function () {
                    @foreach($photoAlbum->files()->get() as $file)
                    var mock = {
                        name: '{{$file->file_name}}',
                        fid: '{{$file->id}}',
                        size: '{{$file->file_size}}',
                        type: '{{$file->file_mimes_type}}'
                    };
                    this.emit('addedfile', mock);
                    this.options.thumbnail.call(this, mock, '{{asset('adminBoard/uploadedImages/albums_photos/'.$file->full_path_after_upload)}}');

                    @endforeach
                        this.on('sending', function (file, xhr, formData) {
                        formData.append('fid', '');
                        file.fid = '';
                    });

                    this.on('success', function (file, response) {
                        file.fid = response.id;
                    })
                }
                ///////////////////////////////// End Get Images
            });//end dropzone


        });//end document
    </script>
@endpush

@push('css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css"/>

    <style>
        .dz-filename {
            display: none;
        }

        .dz-progress {
            display: none;
        }


    </style>
@endpush
