@extends('layouts.yandex.app')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-upload"></i> Generate Link</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Upload</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <form class="row" action="{{route('generate')}}" method="post">
            @csrf
            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="real_link" value="" required>
              <button type="submit" class="btn btn-primary" name="button" id="start-upload">Generate</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@section('script')
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{{asset('js/jquery.ui.widget.js')}}"></script>
<script src="{{asset('js/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('js/jquery.fileupload.js')}}"></script>

<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<!-- The basic File Upload plugin -->
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->

@endsection
