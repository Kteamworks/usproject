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
                            <header class="panel-heading ">
                                DRG Progress of {!! $patients->fname.' '. $patients->lname; !!}&nbsp;&nbsp;
                                <!--<button type="button" class="btn btn-info m-b-10" data-toggle="modal" href="#myModal"><i class="fa fa-plus"></i></button>-->
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                                
                            </header>
<?php $title = App\Drg::whereId($patients->drg_id)->first(); ?>
<header class="panel-heading ">Group: <b>{!! $title->title !!}</b></header>
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