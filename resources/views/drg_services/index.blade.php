@extends('layouts.patient')

<!-- breadcrumbs -->
@section('breadcrumbs')
            <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                    Patient Details
                </h3>
                <!--<span class="sub-title">Welcome to Static Table</span>-->
                <div class="state-information">
                    <ol class="breadcrumb m-b-less bg-less">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">DRG</a></li>
                        <li class="active">Drg Details</li>
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
                                <h3>DRG Budget Details</h3>
                            </div>

                        </div>

                        <br/>

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
                                <div class="row">
                                    <div class="col-lg-3">
                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Service</label>

                                        <select class="form-control" >
                <option value="Post Surgery Stay">Post Surgery Stay</option>
    <option value="X-Ray">X-Ray</option>
    <option value="Pharma">Pharma</option>
    <option value="Surgical Room">Surgical Room</option>
    <option value="Admitting Physician">Admitting Physician</option>
    <option value="Surgical Team">Surgical Team</option>
    <option value="Home Healthcare">Home Healthcare</option>
    <option value="Physical Rehab">Physical Rehab</option>
    <option value="X-Ray">X-Ray</option>
    <option value="Post Surgery Stay">Post Surgery Stay</option>


                </select>
                                    </div>
                                    <div class="col-lg-2">
                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess"> Cost</label>

                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-lg-1">
                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Units</label>

                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-lg-2">
                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Provider</label>

                                         <select class="form-control" >
                <option value="Post Surgery Stay">External</option>
    <option value="X-Ray">Internal</option>



                </select>
                                    </div>
                                    <div class="col-lg-3" style="margin-top:2%;">

                                     <button type="button" class="btn btn-success" onclick="snack()"><i class="fa fa-plus"></i> Add </button>
                                     <button type="button" class="btn btn-info "><i class="fa fa-refresh"></i> Update</button>
                                    </div>
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
                                <th>Type</th>
                                <th class="hidden-xs">Search</th>
                                <th class="">UNITS</th>
                                <th class="">UINTS COST</th>
                                <th>TOTAL COST</th>
                                <th>Provider</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>LCD Monitor</td>
                                <td class="hidden-xs">20 inch Philips LCD Black color monitor</td>
                                <td class="">$ 1000</td>
                                <td class="">2</td>
                                <td>$ 2000</td>
                                <td>$ 2000</td>


                            </tr>


                            </tbody>
                        </table>



                    </div>
                </div>

            </div>
            <!--body wrapper end-->

@stop