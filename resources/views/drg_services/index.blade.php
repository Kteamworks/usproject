@extends('layouts.patient')

<!-- breadcrumbs -->
@section('breadcrumbs')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        Drg Services
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">DRG</a></li>
            <li class="active">Drg Services</li>
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

    <div class="panel invoice">
        <div class="panel-body">
            <div class="row">

                <div class="col-xs-6">
                    <h3>DRG Services</h3>
                </div>

            </div>
<!-- check whether success or not -->
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
            <div class="row">
                <div class="col-xs-4">

                    <!--  <address>
                         <strong>DRG CODE:-470</strong>
                         <br><strong>DRG Description:</strong> Knee Replacement Surgery
                         <br><strong>CMS Payout</strong> $25000
                         <br><strong>Additional pay conditions:</strong>
                         <br>Alcohol: $1000
<br>Tobacco: $1000
<br>Obesity:$1000
<br>Dementia: $1000
<br>Vision Impairment: $1000

                     </address>
                 </div> -->

                </div>
                <br/>
                <div class="form-group">
                    <!-- <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Service</label> -->
                    <div class="col-lg-12">
                        <h3 id="conn" style="display:none;">Successfully Saved</h3>
                        <div id="show" style="display:none;">
                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-9">
                                    <img src="{{asset("img/loading.gif")}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {!!  Form::open(['route'=>'drg-services.store', 'method'=>'post','id'=>'form']) !!}

                            <div class="col-lg-2">
                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Drg</label>

                                <select class="form-control" name="drg">
                                    <?php $drgs = App\Drg::all();
                                    foreach ($drgs as $drg) { ?>
                                        <option value="{!! $drg->id !!}">{!! $drg->title !!}</option>
<?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Service</label>

                                <select class="form-control" name="service">
                                    <?php $services = \App\HospitalService::all();
                                    foreach ($services as $service) { ?>
                                        <option value="{!! $service->id !!}">{!! $service->name !!}</option>
<?php } ?>

                                </select>
                            </div>

                            <div class="col-lg-1">
                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Units</label>

                                <input type="text" class="form-control" name='units'  placeholder="">
                            </div>
                            <div class="col-lg-2">
                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Provider</label>

                                <select class="form-control" name='provider' >
                                    <option value="external">External</option>
                                    <option value="internal">Internal</option>
                                </select>
                            </div>
                            <div class="col-lg-2" style="margin-top:2%;">

                                <button type="submit" class="btn btn-success" ><i class="fa fa-plus"></i> Add </button>
                                <!--<button type="button" class="btn btn-info "><i class="fa fa-refresh"></i> Update</button>-->
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
                <br/>
                <br/>
                <br/>


                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Service Name</th>
                           <!--<th class="hidden-xs">Description</th>-->
                            <th class="">UNITS</th>
                            <th class="">UINTS COST</th>
                            <th>TOTAL COST</th>
                            <th>Provider</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $drg_services = \App\DrgServices::all(); 
                        foreach($drg_services as $drg_service) {     
                        $services = \App\HospitalService::whereId($drg_service->service_id)->first();  
                        $total_cost = $services->budget_cost * $drg_service->units; ?>
                        <tr>
                            <td>{!! $drg_service->id !!}</td>
                            <td>{!! $services->name !!}</td>
                            <td class="hidden-xs">{!! $drg_service->units !!}</td>
                            <td class="">{!! $services->budget_cost !!}</td>
                            <td class="">{!! $total_cost !!}</td>
                            <td>{!! $drg_service->provider !!}</td>

                        </tr>
                        <?php } ?>

                    </tbody>
                </table>



            </div>
        </div>

    </div>
    <!--body wrapper end-->

    @stop