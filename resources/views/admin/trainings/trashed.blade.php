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
                                        <a href="{!! route('admin.trainings.index') !!}" class="btn btn-info btn-sm"
                                            style="float: right ;margin:5px">
                                            Trainings
                                        </a>
                                    </div>

                                </div>
                                <!---end: button div --->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="scroll">
                                            <div class="table-responsive">
                                                <table class="table table-striped  table-hover trashed_trainings_table"
                                                    id='trashed_trainings_table' name ='trashed_trainings_table'>
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Title EN</th>
                                                            <th>Title Ar</th>
                                                            <th>Action</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        @forelse($trainings as $training)
                                                            <tr>
                                                                <td>{!! $training->id !!}</td>
                                                                <td>{!! $training->title_en !!}</td>
                                                                <td>{!! $training->title_ar !!}</td>
                                                                <td>

                                                                    <a href="#"
                                                                        class='restore_training btn btn-success'
                                                                        id='restore_training' name='restore_training'
                                                                        data-id='{!! $training->id !!}'>
                                                                        Restore
                                                                    </a>

                                                                    <a href="#"
                                                                        class='force_delete_training btn btn-danger'
                                                                        id='force_delete_training'
                                                                        name='force_delete_training'
                                                                        data-id="{!! $training->id !!}">
                                                                        Force Delete
                                                                    </a>

                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4" class="text-center">
                                                                    No Data Found
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4">
                                                                <div class="float-right">
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
        ///////////////////////////////////////////////////////////////////
        // restore
        $(document).on('click', '.restore_training', function(e) {

            e.preventDefault();
            var id = $(this).attr('data-id');

            $.ajax({
                url: "{!! route('admin.trainings.restore') !!}",
                data: {
                    id: id
                },
                dataType: 'json',
                type: 'post',
                success: function(data) {
                    if (data.status == true) {
                        $('#alert_messages').find('span').empty();
                        $('#alert_messages').removeClass('d-none');
                        $('#alert_messages').find('span').html(data.msg);
                        $('#trashed_trainings_table').load(location.href + ' #trashed_trainings_table');
                        setTimeout(function() {
                            $('#alert_messages').addClass('d-none');
                        }, 1500);
                    }
                }
            });

        });

        ///////////////////////////////////////////////////////////////////////////
        // force delete
        $('body').on('click', '.force_delete_training', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(id);

            url: "{!! route('admin.trainings.force.delete') !!}";
            $.ajax({
                url: "{!! route('admin.trainings.force.delete') !!}",
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                },

                success: function(data) {
                    if (data.status == true) {
                        $('#alert_messages').find('span').empty();
                        $('#alert_messages').removeClass('d-none');
                        $('#alert_messages').find('span').html(data.msg);
                        $('#trashed_trainings_table').load(location.href + ' #trashed_trainings_table');
                    }
                },
            })


        });
    </script>
@endpush
