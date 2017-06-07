@extends('layouts.patient')


<!-- breadcrumbs -->
@section('breadcrumbs')
            <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                    Drg Details
                </h3>
                <!--<span class="sub-title">Welcome to Static Table</span>-->
                <div class="state-information">
                    <ol class="breadcrumb m-b-less bg-less">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Drg</a></li>
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


                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading ">
                                DRG Details &nbsp;&nbsp;
                                <button type="button" class="btn btn-info m-b-10" data-toggle="modal" title="Add budget details" href="#myModal"><i class="fa fa-plus"></i></button>
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <table class="table data-table row-details-data-table" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S/L</th>
                                    <th>DRG Code</th>
                                    <th>DRG Description</th>
                                    <th>CMS Payout</th>
                                    <th>Alcohol</th>
                                    <th>Tobacco</th>
                                    <th>Obesity</th>
                                    <th>Dementia</th>
                                     <th>Vision Impairment</th>
                                     <th>Action</th>
                                </tr>
                                </thead>
                            <tbody>
                                <?php $drgs = App\Drg::paginate(10); foreach($drgs as $drg) { ?>
                                <tr role="row" class="odd"><td >{!! $drg->id !!}</td><td class="sorting_1">{!! $drg->title !!}</td><td class="sorting_2">{!! $drg->description !!}</td><td class="sorting_3">{!! $drg->cms_payout !!}</td><td class="sorting_3">{!! $drg->alcohol !!}</td><td class="sorting_4">{!! $drg->tobacco !!}</td><td class="sorting_3">{!! $drg->obesity !!}</td><td class="sorting_3">{!! $drg->dementia !!}</td><td class="sorting_3">{!! $drg->vision_impairment !!}</td><td><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" href="#editp"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td></tr>
                                <?php } ?>
                                      </tbody>
<!--                                <tfoot>
                               <tr>
                                    <th>DRG Code</th>
                                    <th>DRG Description</th>
                                    <th>CMS Payout</th>
                                    <th>Alcohol</th>
                                    <th>Tobacco</th>
                                    <th>Obesity</th>
                                    <th>Dementia</th>
                                     <th>Vision Impairment</th>
                                </tr>
                                
                                </tfoot>-->
    
                          
                            </table>
                            <div class="pull-right">
                            {{ $drgs->links() }}
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
                                              {!!  Form::open(['route'=>'drgs.store', 'method'=>'post','class'=>'form-horizontal']) !!}
                               
                            <div class="modal-content">
                                
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Add DRG</h4>
                                </div>
                                <div class="modal-body">

                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">DRG Code</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="title" class="form-control" id="inputEmail1" placeholder="DRG Code">
                                        
                                    </div>
                                </div>
                                
               
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">DRG Description</label>
                                    <div class="col-lg-10">
                                        <input name="description" type="text" class="form-control" id="inputEmail1" placeholder="DRG Description">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">CMS Payout</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="cms_payout" class="form-control" id="inputEmail1" placeholder="CMS Payout">
                                        
                                    </div>
                                </div>
                            <div class="form-group">
                    
                                    <label class="label-info label col-lg-12 ">Additional Pay Conditions</label>
                                   
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Alcohol</label>
                                    <div class="col-lg-10">
                                        <input type="text" name='alcohol' class="form-control" id="inputEmail1" placeholder="Alcohol">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tobacco</label>
                                    <div class="col-lg-10">
                                        <input type="text" name='tobacco' class="form-control" id="inputEmail1" placeholder="Tobacco">
                                        
                                    </div>
                                </div>

                            <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Obesity</label>
                                    <div class="col-lg-10">
                                        <input type="text" name='obesity' class="form-control" id="inputEmail1" placeholder="Obesity">
                                        
                                    </div>
                                </div>
                            <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Dementia</label>
                                    <div class="col-lg-10">
                                        <input type="text" name='dementia' class="form-control" id="inputEmail1" placeholder="Dementia">
                                        
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Vision Impairment</label>
                                    <div class="col-lg-10">
                                        <input type="text" name='vision_impairment' class="form-control" id="inputEmail1" placeholder="Vision Impairement ">
                                        
                                    </div>
                                </div>
                        </div>

                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </div>
                   
                            </div>
                                                          			  {!! Form::close() !!}
                            </div>
                        </div>
           
                    <!--end of drg add-->
                    <!--edit drg-->
                    <div class="modal fade in" id="editp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Edit Drg</h4>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Name</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Episode Id</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputPassword1" placeholder="Episode Id">
                                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Date Of Submission</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputPassword1" placeholder="DAte Of Submission">
                                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                </div>

                                
                                
                                
                            </form>

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <button class="btn btn-success" type="button" id="showtoast">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end of drg add-->
                    <!--edit drg-->
                    <div class="modal fade in" id="editp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Edit Drg</h4>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Name</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
                                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Episode Id</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputPassword1" placeholder="Episode Id">
                                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Date Of Submission</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputPassword1" placeholder="DAte Of Submission">
                                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                                    </div>
                                </div>

                                
                                
                                
                            </form>

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <button class="btn btn-success" type="button" id="showtoast">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
@stop