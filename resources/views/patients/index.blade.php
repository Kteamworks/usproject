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
                        <li><a href="#">Patient</a></li>
                        <li class="active">Patient Details</li>
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
                                Pateint Details &nbsp;&nbsp;
                                <button type="button" class="btn btn-info m-b-10" data-toggle="modal" href="#myModal"><i class="fa fa-plus"></i></button>
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <table class="table data-table row-details-data-table" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Eisode Id</th>
                                    <th>Date Of Birth</th>
                                    <th>DRG</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            <tbody>
                                <?php $patients = App\Patient::paginate(10); foreach($patients as $patient) { 
                                    $drg_name = App\Drg::whereId($patient->drg_id)->first(); ?>
                                <tr role="row" class="odd"><td >{!! $patient->id !!}</td><td class="sorting_1">{!! $patient->fname !!}</td><td class="sorting_2">{!! $patient->episode_id !!}</td><td class="sorting_3">{!! $patient->DOB !!}</td><td class="sorting_4">{!! $drg_name->title !!}</td>
                                    <td><a href="{{route('patients.show', $patient->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a> | <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" href="#editp"></i> | <i class="fa fa-trash-o" aria-hidden="true"></i></td></tr>
                                <?php } ?>
                                      </tbody>
                                <tfoot>
                               <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Episode Id</th>
                                    <th>Date Of Birth</th>
                                    <th>Patient Id</th>
                                    <th>Action</th>
                                </tr>
                                
                                </tfoot>
    
                          
                            </table>
                            <div class="pull-right">
                            {{ $patients->links() }}
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
                                              {!!  Form::open(['route'=>'patients.store', 'method'=>'post','class'=>'form-horizontal']) !!}
                               
                            <div class="modal-content">
                                
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Add patient</h4>
                                </div>
                                <div class="modal-body" style="padding:0px;">
                                <section class="panel">
                <header class="panel-heading tab-dark ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#home" aria-expanded="true">Patient Details</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#about" aria-expanded="false">Contact </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#profile" aria-expanded="false">DRG Selection </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#contact" aria-expanded="false">Personal History</a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
                            <section class="panel">
                        <?php $drg_names = App\Drg::all() ?>
                        <div class="panel-body">
                             <!--<input type="hidden" name="episode_id" class="form-control" id="inputEmail1" value="DRGEP002" placeholder="Name">-->
      <!--<INPUT TYPE=hidden NAME="pid" ID="ACCOUNT" VALUE="">-->
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="fname" class="form-control" id="inputEmail1" placeholder="First Name">
                                        <input type="text" name="lname" class="form-control" id="inputEmail1" placeholder="Last Name">
                                        
                                    </div>
                                </div>
                                
                <div class="form-group">
                <label class="col-lg-2 col-sm-2 control-label">Gender</label>

                <div class="col-lg-10 col-md-8">


                <select class="form-control" name="sex">
                <option></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
        
                </select>
                </div>

                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">License ID</label>
                                    <div class="col-lg-10">
                                        <input name="drivers_license" type="text" class="form-control" id="inputEmail1" placeholder="License ID">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">BLood Group</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="blood_group" class="form-control" id="inputEmail1" placeholder="Blood Group">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Age</label>
                                    <div class="col-lg-10">
                                        <input type="text" name='age' class="form-control" id="inputEmail1" placeholder="Age">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Zip Code</label>
                                    <div class="col-lg-10">
                                        <input type="text" name='postal_code' class="form-control" id="inputEmail1" placeholder="Zip Code">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                <label class="col-lg-2 col-sm-2 control-label">State</label>

                <div class="col-lg-10 col-md-8">


                <select class="form-control" id="e4" name='state'>
                <option value=""> </option><option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="GA">Georgia</option>
<option value="HI">Havaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Lousiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennslyvania</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
<option value="GU">Guam</option>
<option value="PR">Puerto Rico</option>
<option value="VI">Virgin Islands</option>
        
                </select>
                </div>

                </div>
                <div class="form-group">
                                <label class="control-label col-md-2">Date Of Birth</label>
                                <div class="col-md-10">
                                    <input size="16" type="text" name="DOB" value="2012-06-15 14:45" readonly class="form_datetime form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">SSN</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputEmail1" placeholder="SSN">
                                        
                                    </div>
                                </div>
                                  <div class="form-group">
                <label class="col-lg-2 col-sm-2 control-label">Martial Status</label>

                <div class="col-lg-10 col-md-8">


                <select class="form-control" id="e4" name="status" >
                <option></option>
                <option value="AF">Married</option>
                <option value="AX">Unmarried</option>
                <option value="AX">Divorced</option>
                <option value="AX">Widowed</option>

        
                </select>
                </div>

                </div>
                <div class="form-group">
                                <label class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name='phone_home' placeholder="" data-mask="(999) 999-9999" class="form-control">
                                    <span class="help-inline">(999) 999-9999</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-10">
                                    <input type="text" name="country_code" placeholder="Country"  class="form-control">
                                    <!-- <span class="help-inline">(999) 999-9999</span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">City</label>
                                <div class="col-sm-10">
                                    <input type="text" name="city" placeholder="City"  class="form-control">
                                    <!-- <span class="help-inline">(999) 999-9999</span> -->
                                </div>
                            </div>
                
      
                        </div>
                    </section>

                        </div>
                        <div id="about" class="tab-pane">
<section class="panel1">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">
Address:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name='street' class="form-control" id="inputEmail1" placeholder="Address">
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Emergency Contact: </label>
                                    <div class="col-lg-10">
                                        <input type="contact_relationship" class="form-control" id="inputEmail1" placeholder="Emergency Contact">
                                        
                                    </div>
                                </div>
<!--                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Work Phone:</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" id="inputEmail1" placeholder="Work Phone">
                                        
                                    </div>
                                </div>-->
<!--                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Trusted Email:</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" id="inputEmail1" placeholder="Trusted Email">
                                        
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Guardian Name (in case of minor):</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="guardiansname" class="form-control" id="inputEmail1" placeholder="Guardian Name">
                                        
                                    </div>
                                </div>
<!--                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Home Phone:</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" id="inputEmail1" data-mask="(999) 999-9999">
                                        
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">   Contact Email::</label>
                                    <div class="col-lg-10">
                                        <input type="email" name="email" class="form-control" id="inputEmail1" placeholder="Contact Email">
                                        
                                    </div>
                                </div>
</section>
                        </div>
                        <div id="profile" class="tab-pane">
                            <section class="panel1">
                               
                                                               <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">DRG</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="drg_id">
                <option>--select--</option>
                <?php foreach($drg_names as $drg) { ?>
                <option value="{!! $drg->id !!}">{!! $drg->title !!}</option>
               <?php  } ?>
                </select>
                                    </div>
                                </div>
                                  
</section>
                        </div>
                        <div id="contact" class="tab-pane">
                            <div class=" col-md-4">
                                    <div style="padding: 4px;">
                                    <label class="  control-label">
Alcoholic:</label>
                                        
                                    </div>
                                    <div style="padding: 4px;">
                                        <label class="  control-label">Smoker:  </label>

                                    </div>
                                    <div style="padding: 4px;">
                                        <label class="  control-label">Obesity:</label>

                                        
                                    </div>
                                    <div style="padding: 4px;">
                                        <label class="  control-label">Dementia:</label>

                                       

                                    </div>
                                    <div style="padding: 4px;">
                                        <label class="  control-label">Vision impairment:</label>

                                       

                                    </div>
                                    
                                </div>
                                <div class=" col-md-6">
                                    <div style="    padding: 5px;">
                                    
                                        <input type="radio" name="alcoholic" checked value="yes" class="iCheck-flat"> Yes
                                        <input type="radio" name="alcoholic" checked value="no" class="iCheck-flat"> No
                                        
                                    </div>
                                    <div style="    padding: 5px;">
                                        <!-- <label class="  control-label">Smoker:  </label> -->

                                        <input type="radio" name="smoker" value="yes" class="iCheck-flat"> Yes
                                        <input type="radio" name="smoker" value="no"  class="iCheck-flat"> No

                                    </div>
                                    <div style="    padding: 5px;">
                                        <!-- <label class="  control-label">Obesity:</label> -->

                                        <input type="radio" name="obesity" value="yes" class="iCheck-flat"> Yes
                                        <input type="radio" name="obesity" value="no" class="iCheck-flat"> No

                                    </div>
                                    <div style="    padding: 5px;">
                                        <!-- <label class="  control-label">Dementia:</label> -->

                                        <input type="radio" name="dementia" value="yes" class="iCheck-flat"> Yes
                                        <input type="radio" name="dementia" value="no"  class="iCheck-flat"> No

                                    </div>
                                    <div style="    padding: 5px;">
                                        <!-- <label class="  control-label">Vision impairment:</label> -->

                                        <input type="radio" name="vision_impairment" value="yes" class="iCheck-flat"> Yes
                                        <input type="radio" name="vision_impairment" value="no" class="iCheck-flat"> No

                                    </div>
                                    
                                </div>
                        </div>
                    </div>
                </div>
            </section>

                                  
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
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Edit Patient</h4>
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