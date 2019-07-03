@extends('layouts.yandex.app')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      <p>Table to display Generated Links.</p>
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
              <strong>Link removed.</strong>
          </div>
          <?php \Session::forget('success');?>
      @endif
      <div class="tile">
        <div class="tile-body table-responsive">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th style="width: 20px">No</th>
                <th>Created</th>
                <th>Real Link</th>
                <th>Generated Link</th>
                <th style="width: 70px">Copy Url</th>
                @if(Auth::user()->role_id == 1)
                  <th style="width: 50px">Delete</th>
                @else
                @endif

              </tr>
            </thead>
            <tbody>
                @foreach ($yans as $key=>$yan)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{date("d/m/Y",strtotime($yan->created_at))}}</td>
                  <td>{{$yan->real_link}}</td>
                  <td>{{$yan->new_link}}</td>
                  <td>
                    <input type="hidden" name="" id="copy_path" value="{{$yan->new_link}}">
                    <button class="btn btn-success btn-sm copy_button" type="button">Copy Link</button>
                  </td>
                  @if(Auth::user()->role_id == 1)
                    <td><a class="btn btn-danger btn-sm text-white" href="{{ route('delete', $video->id) }}">Delete</a></td>
                  @else
                  @endif

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
  $('#sampleTable').DataTable();

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
