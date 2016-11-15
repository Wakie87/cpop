@extends('master')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Suppliers - Edit</h1>
    </div>
  </div>

  <div class="row">
  {!! Form::model($supplier, ['route' => ['suppliers.update', $supplier->id]]) !!}
    <input name="_method" type="hidden" value="PATCH">
    {{csrf_field()}}
    <div class="form-group">
      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', $supplier['name'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('address', 'Address') !!}
      {!! Form::text('address', $supplier['address'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('suburb', 'Suburb') !!}
      {!! Form::text('suburb', $supplier['suburb'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('state', 'State') !!}
      {!! Form::select('state', ['WA' => 'Western Australia', 'SA' => 'South Australia', 'NSW' => 'New South Wales', 'NT' => 'Northern Territory', 'VIC' => 'Victoria', 'ACT' => 'Australian Capital Territory', 'TAS' => 'Tasmania', 'QLD' => 'Queensland'], $supplier['state'], ['class' => 'form-control', 'placeholder' => 'State']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('postcode', 'Postcode') !!}
      {!! Form::text('postcode', $supplier['postcode'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('telephone', 'Telephone') !!}
      {!! Form::text('telephone', $supplier['telephone'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('fax', 'Fax') !!}
      {!! Form::text('fax', $supplier['fax'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {{link_to_route('suppliers.index', 'Cancel', '', array('class' => 'btn btn-danger'))}}
      {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
    </div>

  {!! Form::close() !!}

  </div>
  @stop