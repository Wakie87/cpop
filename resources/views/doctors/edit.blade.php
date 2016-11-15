@extends('master')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Doctors - Edit</h1>
    </div>
  </div>

  <div class="row">
  {!! Form::model($doctor, ['route' => ['doctors.update', $doctor->id]]) !!}
    <input name="_method" type="hidden" value="PATCH">
    {{csrf_field()}}
    <div class="form-group">
      {!! Form::label('first_name', 'First Name') !!}
      {!! Form::text('first_name', $doctor['first_name'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('last_name', 'Last Name') !!}
      {!! Form::text('last_name', $doctor['last_name'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('clinic_name', 'Clinic Name') !!}
      {!! Form::text('clinic_name', $doctor['clinic_name'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('address', 'Address') !!}
      {!! Form::text('address', $doctor['address'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('suburb', 'Suburb') !!}
      {!! Form::text('suburb', $doctor['suburb'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('state', 'State') !!}
      {!! Form::select('state', ['WA' => 'Western Australia', 'SA' => 'South Australia', 'NSW' => 'New South Wales', 'NT' => 'Northern Territory', 'VIC' => 'Victoria', 'ACT' => 'Australian Capital Territory', 'TAS' => 'Tasmania', 'QLD' => 'Queensland'], $doctor['state'], ['class' => 'form-control', 'placeholder' => 'State']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('postcode', 'Postcode') !!}
      {!! Form::text('postcode', $doctor['postcode'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('telephone', 'Telephone') !!}
      {!! Form::text('telephone', $doctor['telephone'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('fax', 'Fax') !!}
      {!! Form::text('fax', $doctor['fax'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('mobile', 'Mobile') !!}
      {!! Form::text('mobile', $doctor['fax'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('email', 'Email') !!}
      {!! Form::text('email', $doctor['email'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('provider_id', 'Provider ID') !!}
      {!! Form::text('provider_id', $doctor['provider_id'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {{link_to_route('doctors.index', 'Cancel', '', array('class' => 'btn btn-danger'))}}
      {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
    </div>

  {!! Form::close() !!}

  </div>
  @stop