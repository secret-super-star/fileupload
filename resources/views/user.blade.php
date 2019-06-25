@extends('layouts.app')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Users</h1>
      <p>Table to display analytical users</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Users</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body table-responsive">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th style="width: 50px">No</th>
                <th>Name</th>
                <th>email</th>
                <th style="width: 100px">Role</th>
                <th style="width: 100px">Edit</th>
                <th style="width: 100px">Delete</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($users as $key=>$user)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  @if($user->role_id == 1)
                    <td>Admin</td>
                  @else
                    <td>User</td>
                  @endif

                  <td><button class="btn btn-warning btn-sm" type="button">Edit</button></td>
                  <td><button class="btn btn-danger btn-sm" type="button">Delete</button></td>
                </tr>
                @endforeach



            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@section('script')

<script src="{{asset('template/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">
  $('#sampleTable').DataTable({
    "columnDefs": [ {

    "targets": [4,5], // column or columns numbers

    "orderable": false,  // set orderable for selected columns

    }],
  });
</script>
@endsection
