@extends('master')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Create Supplier</h1>
    </div>
  </div>

  <div class="row">
  {!! Form::open(['route' => ['suppliers.store']]) !!}
    {{csrf_field()}}
    <div class="form-group">
      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', '', ['class' => 'form-control']) !!}
      {!! $errors->first('name','<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group{{ ($errors->has('name')) ? $errors->first('name') : '' }}">
      {!! Form::label('address', 'Address') !!}
      {!! Form::text('address', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('suburb', 'Suburb') !!}
      {!! Form::text('suburb', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('state', 'State') !!}
      {!! Form::select('state', ['WA' => 'Western Australia', 'SA' => 'South Australia', 'NSW' => 'New South Wales', 'NT' => 'Northern Territory', 'VIC' => 'Victoria', 'ACT' => 'Australian Capital Territory', 'TAS' => 'Tasmania', 'QLD' => 'Queensland'], '', ['class' => 'form-control', 'placeholder' => 'State']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('postcode', 'Postcode') !!}
      {!! Form::text('postcode', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('telephone', 'Telephone') !!}
      {!! Form::text('telephone', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('fax', 'Fax') !!}
      {!! Form::text('fax', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {{ link_to_route('suppliers.index', 'Cancel', '', array('class' => 'btn btn-danger')) }}
      {{ Form::submit('Save', ['class' => 'btn btn-success']) }}
    </div>

  {!! Form::close() !!}

  </div>
  @stop