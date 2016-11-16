@extends('master')
@section('content')
 <div class="row">
    <div class="col-md-12">
      <h1>Users</h1>
    </div>
  </div>
  <div class="row">
    <table class="table table-striped" data-toggle="table">
    <thead>
      <tr>
        <th>No.</th>
        <th data-sortable="true">First Name</th>
        <th data-sortable="true">Last Name</th>
        <th>Registration ID</th>
        <th>Type</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
      </thead>
      <a href="{{route('users.create')}}" class="btn btn-info pull-right">Create New Pharmacist</a><br><br>
      <?php $no=1; ?>
      @foreach ($users as $user)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$user->first_name}}</td>
          <td>{{$user->last_name}}</td>
          <td>{{$user->reg_id}}</td>
          <td>{{$user->type}}</td>
          <td>
            @if ($user->status == 1)
            Enabled
            @elseif ($user->status == 0) 
            Disabled
            @endif
          </td>
          <td>
            <form class="" action="{{route('users.destroy',$user->id)}}" method="post">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              {{link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-primary'))}}
              <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name="Delete" value="Delete">
            </form>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
@stop