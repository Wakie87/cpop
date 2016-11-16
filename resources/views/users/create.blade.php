@extends('master')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Create Doctor</h1>
    </div>
  </div>

  <div class="row">
  {!! Form::open(['route' => ['doctors.store']]) !!}
    {{csrf_field()}}
       <div class="form-group">
      {!! Form::label('first_name', 'First Name') !!}
      {!! Form::text('first_name', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('last_name', 'Last Name') !!}
      {!! Form::text('last_name', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('reg_id', 'Registration ID') !!}
      {!! Form::text('reg_id', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password" class="control-label">Password</label>

      <div>
          <input id="password" type="password" class="form-control" name="password" required>

          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group">
        <label for="password-confirm" class="control-label">Confirm Password</label>
        <div>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>

    <div class="form-group">
      {{ Form::checkbox('status', '1', true) }}
      Status
    </div>

    <div class="form-group">
      {{link_to_route('users.index', 'Cancel', '', array('class' => 'btn btn-danger'))}}
      {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
    </div>

  {!! Form::close() !!}

  </div>
  @stop