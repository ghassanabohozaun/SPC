@extends('layouts.admin')
@section('title')
@endsection
@section('content')
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

                                <!---begin: success messages div --->
                                <div class="col-12 d-none" class='success_messages' id='success_messages'
                                    name='success_messages'
                                    style="background-color :rgb(63, 160, 76) ; padding:20px ; display:inline-flex">
                                    <span style='color:rgb(255, 255, 255)'>11</span>
                                </div>
                                <!---end: success messages div --->

                                <!---begin: alert messages div --->
                                <div class="row">
                                    <div class="col-12 d-none" class='alert_messages' id='alert_messages'
                                        style="background-color :rgb(197, 45, 7) ; padding:20px ; display:inline-flex">
                                        <ul style='color:rgb(255, 255, 255)'>
                                        </ul>

                                    </div>
                                </div>
                                <br /> <br />
                                <!---end: alert messages div --->


                                <!---begin: button div --->
                                {{-- <div class='row' style="padding: 10px ; ">
                                    <div class="col-12">
                                        <a href="{!! route('admin.trainings.index') !!}" class="btn btn-info btn-sm"
                                            style="float: right ;margin:5px">
                                            Trainings
                                        </a>
                                    </div>

                                </div> --}}
                                <!---end: button div --->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="scroll">
                                            <form id='create_training_form' class="create_training_form"
                                                name="create_training_form" method="POST" action="{!! route('admin.trainings.store') !!}"
                                                enctype="multipart/form-data">
                                                @csrf


                                                <div class="mb-3">
                                                    <input type='text' id='site_lang' name="site_lang"
                                                        value="{!! setting()->site_lang_ar !!}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Photo</label>
                                                    <input type="file" class="form-control" id="photo"
                                                        name='photo'>
                                                    <div class="form-text text-danger" id='photo_error'></div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Title En</label>
                                                    <input type="text" class="form-control" id="title_en"
                                                        name='title_en' autocomplete="off">
                                                    <div class="form-text text-danger" id='title_en_error'></div>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label">Title Ar</label>
                                                    <input type="text" class="form-control title_ar" id="title_ar"
                                                        name='title_ar' autocomplete="off">
                                                    <div class="form-text text-danger" id='title_ar_error'></div>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label">Started Date</label>
                                                    <input type="date" class="form-control started_date"
                                                        id="started_date" name='started_date' autocomplete="off">
                                                    <div class="form-text text-danger" id='started_date_error'></div>
                                                </div>


                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $('#create_training_form').on('submit', function(e) {
            e.preventDefault();

            $('#title_en').css('border-color', '');
            $('#title_ar').css('border-color', '');
            $('#started_date').css('border-color', '');
            $('#photo').css('border-color', '');

            $('#title_en_error').text('');
            $('#title_ar_error').text('');
            $('#started_date_error').text('');
            $('#photo_error').text('');

            var data = new FormData(this);
            var dataType = 'json';
            var type = $(this).attr('method');
            var url = $(this).attr('action');



            $.ajax({
                url: url,
                type: type,
                dataType: dataType,
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function() {

                },
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        $('#success_messages').find('span').empty();
                        $('#success_messages').removeClass('d-none');
                        $('#alert_messages').addClass('d-none');
                        $('#success_messages').find('span').text(data.msg);
                        setTimeout(function() {
                            $('#success_messages').addClass('d-none');
                        }, 1500);

                        setTimeout(function() {
                            window.location.href = "{!! route('admin.trainings.index') !!}"
                        }, 1700);

                    }
                },
                error: function(reject) {

                    $('#alert_messages').find('ul').empty();
                    $('#alert_messages').removeClass('d-none');
                    $('#success_messages').addClass('d-none');

                    var response = $.parseJSON(reject.responseText)

                    $.each(response.errors, function(key, value) {
                        $('#' + key).css('border-color', 'red');
                        $('#' + key + '_error').text(value);
                    })

                    if (jQuery.isEmptyObject(response.errors) == false) {
                        $.each(response.errors, function(key, value) {
                            $('#alert_messages').find('ul').append('<li>' + value + '</li>');
                        })
                    } else {
                        $('#alert_messages').find('ul').empty();
                        $('#alert_messages').addClass('d-none');
                    }


                },
                complete: function() {

                },
            });

        })
    </script>
@endpush
