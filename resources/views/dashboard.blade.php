@extends('layouts.app')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      <p>Table to display analytical video uploaded</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Dashboard</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible" id="myAlert">
              <strong>Video removed.</strong>
          </div>
          <?php \Session::forget('success');?>
      @endif
      <div class="tile">
        <div class="tile-body">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th style="width: 20px">No</th>
                <th>Title</th>
                <th>Real Title</th>
                <th>Path</th>
                <th>Created</th>
                <th style="width: 70px">Copy Url</th>
                <th style="width: 50px">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($videos as $key=>$video)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$video->title}}</td>
                  <td>{{$video->real_title}}</td>
                  <td>{{$video->path}}</td>
                  <td>{{$video->created_at}}</td>
                  <td>
                    <input type="hidden" name="" id="copy_path" value="{{$video->path}}">
                    <button class="btn btn-success btn-sm copy_button" type="button">Copy URL</button>
                  </td>
                  <td><a class="btn btn-danger btn-sm text-white" href="{{ route('delete', $video->id) }}">Delete</a></td>
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

    "targets": [5,6], // column or columns numbers

    "orderable": false,  // set orderable for selected columns

    }],
  });

  $('.copy_button').click(function(){
    var temp_el = $("<input>");
    temp_el.attr('id', 'copy_text')
    $("body").append(temp_el);
    $('#copy_text').val($(this).prev().val()).select();
    document.execCommand("copy");
    $('#copy_text').remove();
    $.notify({
      title: "Copy url was succeeded.",
      message: "",
      icon: 'fa fa-check'
    },{
      type: "success"
    });
  })
</script>
@endsection
