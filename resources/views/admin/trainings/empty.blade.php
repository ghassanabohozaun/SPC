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
