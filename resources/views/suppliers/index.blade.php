@extends('master')
@section('content')
 <div class="row">
    <div class="col-md-12">
      <h1>Suppliers</h1>
    </div>
  </div>
  <div class="row">
    <table class="table table-striped">
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Fax</th>
        <th>Actions</th>
      </tr>
      <a href="{{route('suppliers.create')}}" class="btn btn-info pull-right">Create New Supplier</a><br><br>
      <?php $no=1; ?>
      @foreach ($suppliers as $supplier)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$supplier->name}}</td>
          <td>{{$supplier->address}}, {{$supplier->suburb}}, {{$supplier->state}}, {{$supplier->postcode}}</td>
          <td>{{$supplier->telephone}}</td>
          <td>{{$supplier->fax}}</td>
          <td>
            <form class="" action="{{route('suppliers.destroy',$supplier->id)}}" method="post">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              {{link_to_route('suppliers.edit', 'Edit', array($supplier->id), array('class' => 'btn btn-primary'))}}
              <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name="name" value="delete">
            </form>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
@stop