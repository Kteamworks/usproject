@extends('layouts.login')
@section('content')

@if(Session::has('status'))
<div class="alert alert-success alert-dismissable">
    <i class="fa  fa-check-circle"> </i> <b> Success </b>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{Session::get('status')}}
</div>

@endif

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissable">
    <i class="fa  fa-check-circle"> </i> <b> Alert !</b>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{Session::get('error')}}
</div>
@else

@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <b>Alert !</b>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif
@endif
@section('body')
      <h2 class="form-heading">login</h2>
      <div class="container log-row">
      <img src="img/bg.png" style="position: absolute;left: 0;
    bottom: 0;">
          {!!  Form::open(['route'=>'post.login', 'method'=>'post','class'=>'form-signin']) !!}
              <div class="login-wrap">
     {!! Form::text('email',null,['placeholder'=> 'Email/User ID' ,'class' => 'form-control']) !!}
                 {!! Form::password('password',['placeholder'=>'Password','class' => 'form-control']) !!}
 
                  <button class="btn btn-lg btn-success btn-block" type="submit">LOGIN</button>
                  
                  <label class="checkbox-custom check-success">
                      <input type="checkbox" value="remember-me" id="checkbox1"> <label for="checkbox1">Remember me</label>
                      <a class="pull-right" data-toggle="modal" href="#forgotPass"> Forgot Password?</a>
                  </label>

                  <!-- <div class="registration">
                      Don't have an account yet?
                      <a class="" href="registration.html">
                          Create an account
                      </a>
                  </div> -->

              </div>
			  {!! Form::close() !!}
              <!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forgotPass" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Forgot Password ?</h4>
                          </div>
                          <div class="modal-body">
                              <p>Enter your e-mail address below to reset your password.</p>
                              <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                              <button class="btn btn-success" type="button">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- modal -->


@stop
