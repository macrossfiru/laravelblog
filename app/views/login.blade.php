@extends('templates.main')
@section('content')
<div class="col-md-4 offset4 well">
  {{Form::open(['login'])}}
  <!-- Check for login errors -->
  @if(Session::has('login_errors'))
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Incorrect login.</div>
  @endif
  <!-- username field -->
  <p>{{ Form::label('username', 'Username') }}</p>
  <p>{{ Form::text('username')}} </p>
  <!-- password field -->
  <p>{{ Form::label('password', 'Password') }}</p>
  <p>{{ Form::password('password') }}</p>
  <!-- submit button -->
  <p>{{ Form::submit('Login', ['class'=>'btn-large']) }}</p>
  {{Form::close()}}
</div>
@endsection
