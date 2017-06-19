@extends('layouts.patient')


<!-- breadcrumbs -->
@section('breadcrumbs')
            <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                    DRG progress
                </h3>
                <!--<span class="sub-title">Welcome to Static Table</span>-->
                <div class="state-information">
                    <ol class="breadcrumb m-b-less bg-less">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Patients</a></li>
                        <li class="active">Drg Progress</li>
                    </ol>
                </div>
            </div>
            <!-- page head end-->

@stop
<!-- /breadcrumbs -->
<!-- content -->
@section('pt-heading')
          <!--body wrapper start-->
            <div class="wrapper">


                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            {{-- Success message --}}
@if(Session::has('success'))
<div class="alert alert-success alert-dismissable">
    <i class="fa  fa-check-circle"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{Session::get('success')}}
</div>
@endif
{{-- failure message --}}
@if(Session::has('fails'))
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <b>{!! Lang::get('lang.alert') !!}!</b>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{Session::get('fails')}}
</div>
@endif
<?php $admission_data = \App\Admission::where('pid','=',$patients->pid)->first(); if(isset($admission_data)) {  $admit_date = $admission_data->admit_date->toDayDateTimeString();$discharge_date = $admission_data->discharge_date->toDayDateTimeString();$final_discharge_date = $admission_data->actual_discharge_date->toDayDateTimeString(); ?>

                            <header class="panel-heading ">
                                DRG Progress of {!! $patients->fname.' '. $patients->lname; !!}&nbsp;&nbsp;
                                <?php if(!isset($admission_data)) {?>
                                <button type="button" class="btn btn-info m-b-10" data-toggle="modal" href="#myModal"><i class="fa fa-sign-in"></i> Admission</button>
                                <?php } if(!isset($admission_data->discharged_by)) {?>
                                <button type="button" class="btn btn-info m-b-10" data-toggle="modal" href="#editp">Discharge <i class="fa fa-sign-out"></i></button>
                               <?php } ?>
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                                
                            </header>
<?php $title = App\Drg::whereId($patients->drg_id)->first(); ?>
<header class="panel-heading ">Group: <b>{!! $title->title !!}</b>
| Admission Date: <b>{!! $admit_date !!}</b>
<?php if(isset($admission_data->discharged_by)) {
    $discharged_by = App\User::whereId($admission_data->discharged_by)->first(); ?>
| Discharged By: <b>{!! $discharged_by->fname !!}</b> | Discharge Date: <b>{!! $final_discharge_date !!}</b></header>
<?php } else { ?>
| Discharge Date: <b>{!! $discharge_date !!}</b></header>
<?php } } else { ?>
</header>
<?php } ?>
                            <table class="table data-table row-details-data-table" cellspacing="0" width="100%">
                                <thead>
                                <tr>
<!--                                    <th>#</th>-->
                                    <th>Service Name</th>
                                    <th>Units</th>
                                    <th>Service Status</th>
                                    <th>Authorization</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            <tbody>
                                <?php $Drg_services = \App\DrgProgress::where('pid','=',$patients->pid)->paginate(); foreach($Drg_services as $Drg_service) {
                                    $aervices = \App\HospitalService::whereId($Drg_service->service_id)->first();
                                    if($Drg_service->service_status == 0) {
                                        $service_status = '<small class="label bg-red">Pending</small>';
                                    }
                                    else {
                                        $service_status = '<small class="label bg-blue">Provided</small>';
                                    }
                                    if( $Drg_service->authorized ==0) {
                                        $authorized = '<small class="label bg-red">unauthorized</small>';
                                    }
                                    else {
                                         $authorized = '<small class="label bg-blue">authorized</small>';
                                    }
?>
                                <tr role="row" class="odd"><td >{!! $aervices->name !!}</td><td class="sorting_1">{!! $Drg_service->units !!}</td><td class="sorting_1">{!! $service_status !!}</td><td class="sorting_1">{!! $authorized !!}</td>
                                        <td><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" href="#editp{{ $Drg_service->id }}"></i></tr>
                                
                    <!--edit patient-->
                    <div class="modal fade in" id="editp{{$Drg_service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                {!! Form::model($Drg_service, ['url' => 'patients/progress-edit/'.$Drg_service->id,'method' => 'PATCH'] )!!}
                              
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Edit DRG Progress</h4>
                                </div>
                                <div class="modal-body">

            <div class="col-xs-12 form-group {{ $errors->has('units') ? 'has-error' : '' }}">
                {!! Form::label('units','Units') !!}         <span class="text-red"> *</span>       
                {!! Form::text('units',null,['class' => 'form-control']) !!}
            </div>
                                                <div class="col-xs-12 form-group {{ $errors->has('actual_cost') ? 'has-error' : '' }}">
                {!! Form::label('actual_cost','Actual Cost') !!}         <span class="text-red"> *</span>       
                {!! Form::text('actual_cost',null,['class' => 'form-control']) !!}
            </div>
            <div class="col-xs-12 form-group {{ $errors->has('service_status') ? 'has-error' : '' }}">
                {!! Form::label('service_status','Service status') !!}         <span class="text-red"> *</span>       
                                            <?php  if($Drg_service->service_status == 1) { ?>
                {{ Form::select('service_status', [
   '0' => 'Pending',
   '1' => 'Provided'], null, ['class' => 'form-control','disabled']) }}
      {!! Form::hidden('service_status',null,['class' => 'form-control']) !!}
                                            <?php } else{ ?>
                   {{ Form::select('service_status', [
   '0' => 'Pending',
   '1' => 'Provided'], null, ['class' => 'form-control']) }}
                                            <?php } ?>
            </div>
            <div class="col-xs-12 form-group {{ $errors->has('authorized') ? 'has-error' : '' }}">
                {!! Form::label('authorized','Authorized') !!}         <span class="text-red"> *</span>       
    <?php  if($Drg_service->authorized == 1) { ?>
                {{ Form::select('authorized', [
   '0' => 'Unauthorized',
   '1' => 'Authorized'], null, ['class' => 'form-control','disabled']) }}
   {!! Form::hidden('authorized',null,['class' => 'form-control']) !!}
     <?php } else{ ?>
                   {{ Form::select('authorized', [
   '0' => 'Unauthorized',
   '1' => 'Authorized'], null, ['class' => 'form-control']) }}
   <?php } ?>
            </div>

                          

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                   {!! Form::submit('Save Changes',['class'=>'form-group btn btn-primary'])!!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                                <?php } ?>
                                      </tbody>
<!--                                <tfoot>
                               <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Episode Id</th>
                                    <th>Date Of Admission</th>
                                    <th>Patient Id</th>
                                </tr>
                                
                                </tfoot>-->
    
                          
                            </table>
                            <div class="pull-right">
                            {{ $Drg_services->links() }}
                            </div>
                        </section>
                    </div>
                </div>

            </div>
            <!--body wrapper end-->
@stop
@section('content')

    <!--modal for add pateind-->
    <div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
                        <div class="modal-dialog">
                                              {!!  Form::open(['url'=>'post-admission/'.$patients->pid, 'method'=>'POST','class'=>'form-horizontal']) !!}
                               
                            <div class="modal-content">
                                
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Patient admission detials</h4>
                                </div>
                                <div class="modal-body">
                <div class="form-group">
                                <label class="control-label col-md-2">Admission Date</label>
                                <div class="col-md-10">
                                    <input size="16" type="text" name="admit_date" class="form_datetime form-control">
                                </div>
                            </div>
  
                <div class="form-group">
                                <label class="control-label col-md-2">Discharge Date</label>
                                <div class="col-md-10">
                                    <input size="16" type="text" name="discharge_date" class="form_datetime form-control">
                                </div>
                            </div>
  
                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
                                </div>
                   
                            </div>
                                                          			  {!! Form::close() !!}
                            </div>
                        </div>
                    <!--end of patient add-->
                    <!--edit patient-->
                    <div class="modal fade in" id="editp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                     {!!  Form::open(['url'=>'admission-edit/'.$admission_data->pid, 'method'=>'PATCH','class'=>'form-horizontal']) !!}
                               
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Edit Patient</h4>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Reason for Discharge</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="reason_for_discharge" class="form-control" id="inputEmail1" >
                                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                </div>
<!--                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Episode Id</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputPassword1" placeholder="Episode Id">
                                         <p class="help-block">Example block-level help text here.</p> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Date Of Submission</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputPassword1" placeholder="DAte Of Submission">
                                         <p class="help-block">Example block-level help text here.</p> 
                                    </div>
                                </div>-->
                              </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <button class="btn btn-success" type="submit" id="showtoast">Save changes</button>
                                </div>
                                     {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <!--end of patient add-->
<!--                    <script type="text/javascript">
                    function randomNumber(len) {
    var randomNumber;
    var n = '';

    for(var count = 0; count < len; count++) {
        randomNumber = Math.floor(Math.random() * 10);
        n += randomNumber.toString();
    }
    return n;
}

document.getElementById("ACCOUNT").value = randomNumber(6);
</script>-->
@stop