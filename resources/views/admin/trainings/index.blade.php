@extends('layouts.admin')
@section('title')
@endsection
@section('content')
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

                                <!---begin: alert messages div --->
                                <div class="row">
                                    <div class="col-12 d-none" class='alert_messages' id='alert_messages'
                                        style="background-color :rgb(57, 131, 119) ; padding:20px ; display:inline-flex">
                                        <span style='color:rgb(255, 255, 255)'></span>
                                    </div>
                                </div>
                                <!---end: alert messages div --->


                                <!---begin: button div --->
                                <div class='row' style="padding: 10px ; ">
                                    <div class="col-12">
                                        <a href="{!! route('admin.trainings.create') !!}" class="btn btn-primary btn-sm"
                                            style="float:right ;margin:5px">
                                            Add New Training
                                        </a>

                                        <a href="{!! route('admin.trainings.get.trashed') !!}" class="btn btn-danger btn-sm"
                                            style="float: right ;margin:5px">
                                            Trashed
                                        </a>
                                    </div>

                                </div>
                                <!---end: button div --->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="scroll">
                                            <div class="table-responsive">
                                                <table class="table trainings_table table-hover" id="trainings_table">
                                                    <thead>
                                                        <th>ID</th>
                                                        <th>Title Ar </th>
                                                        <th>Title En </th>
                                                        <th>Started Date</th>
                                                        <th>Status</th>
                                                        <th> Actions </th>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($trainings as $training)
                                                            <tr>
                                                                <td>{!! $training->id !!}</td>
                                                                <td>{!! $training->title_ar !!}</td>
                                                                <td>{!! $training->title_en !!}</td>
                                                                <td>{!! $training->started_date !!}</td>
                                                                <td>
                                                                    <div class="cst-switch switch-sm">
                                                                        <input type="checkbox" id='status_checkbox'
                                                                            data-id="{!! $training->id !!}"
                                                                            name="status_checkbox" class="status_checkbox"
                                                                            {!! $training->status == 'on' ? 'checked' : '' !!}>
                                                                    </div>
                                                                </td>
                                                                <td>

                                                                    <a href='{!! route('admin.trainings.edit', $training->id) !!}' id='edit_training'
                                                                        name='edit_training'
                                                                        class='btn btn-info btn-sm edit_training'>
                                                                        <i class='fa fa-pen'></i>
                                                                    </a>

                                                                    <a href="#"
                                                                        class='btn btn-danger btn-sm delete_training'
                                                                        id='delete_training' name='delete_training'
                                                                        data-id = "{!! $training->id !!}">
                                                                        <i class='fa fa-trash'></i>
                                                                    </a>

                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5" class="text-center">
                                                                    No Data Found
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="text-center float-right">
                                                                    {!! $trainings->appends(request()->all())->links() !!}
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).on('click', '.delete_training', function(e) {

            var id = $(this).data('id');
            var id2 = $(this).attr('data-id');
            console.log(id);


            $.ajax({
                url: "{!! route('admin.trainings.destroy') !!}",
                data: {
                    id,
                    id
                },
                dataType: 'json',
                type: 'post',
                success: function(data) {
                    if (data.status == true) {

                        console.log(data.msg);
                        $('#trainings_table').load(location.href + ' #trainings_table')
                        $('#alert_messages').removeClass('d-none');
                        $('#alert_messages').find('span').empty();
                        $('#alert_messages').find('span').html(data.msg + ' => ' + id);

                        // setTimeout(function() {
                        //     $('#alert_messages').fadeOut('fast');
                        // }, 1000)

                    }
                },
            });


        });

        var statusSwitch = false;
        $(document).on('change', '.status_checkbox', function(e) {

            e.preventDefault();
            //console.log(statusSwitch);


            if ($(this).is(':checked')) {
                statusSwitch = $(this).is(':checked');
                //console.log($(this).is(':checked'));
            } else {
                statusSwitch = false;
                //console.log($(this).is(':checked'));
            }

            var id = $(this).attr('data-id');
            //console.log(id);

            $.ajax({
                url: "{!! route('admin.trainings.change.status') !!}",
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    statusSwitch: statusSwitch
                },

                success: function(data) {
                    console.log(data.msg);
                    $('#trainings_table').load(location.href + ' #trainings_table')
                    $('#alert_messages').removeClass('d-none');
                    $('#alert_messages').find('span').empty();
                    $('#alert_messages').find('span').html(data.msg + ' => ' + id);
                }
            })
        })
    </script>
@endpush
