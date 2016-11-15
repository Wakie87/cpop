@extends('master')
@section('content')
 <div class="row">
    <div class="col-md-12">
      <h1>Doctors</h1>
    </div>
  </div>
  <div class="row">
    <table class="table table-striped">
      <tr>
        <th>No.</th>
        <th>
          <a href="/doctors?order=first_name">First Name</a>
        </th>
        <th>Last Name</th>
        <th>Clinic</th>
        <th>Address</th>
        <th>Provider ID</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
      <a href="{{route('doctors.create')}}" class="btn btn-info pull-right">Create New Doctor</a><br><br>
      <?php $no=1; ?>
      @foreach ($doctors as $doctor)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$doctor->first_name}}</td>
          <td>{{$doctor->last_name}}</td>
          <td>{{$doctor->clinic_name}}</td>
          <td>{{$doctor->full_address}}</td>
          <td>{{$doctor->provider_id}}</td>
          <td>{{$doctor->telephone}}</td>
          <td>
            <form class="" action="{{route('doctors.destroy',$doctor->id)}}" method="post">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              {{link_to_route('doctors.edit', 'Edit', array($doctor->id), array('class' => 'btn btn-primary'))}}
              <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name="Delete" value="Delete">
            </form>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
@stop