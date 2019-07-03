@extends('layouts.upload.app')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-upload"></i> Upload new videos</h1>
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
        <h3 class="tile-title">Select video to upload</h3>
        <div class="tile-body">
          <form class="row" action="{{route('fileupload')}}" method="post">
            @csrf
            <div class="form-group col-md-3">
              <span class="btn btn-success fileinput-button">

                  <span>Select file</span>
                  <!-- The file input field used as target for the file upload widget -->
                  <input id="fileupload" type="file" name="file">
              </span>
              <!-- <input id="fileupload" type="file" name="file"> -->
              <button type="button" class="btn btn-primary" name="button" id="start-upload"><i class="fa fa-upload"></i>Upload</button>
            </div>

          </form>
          <div class="progress mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
          </div>
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
<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:

    var file_upload = $('#fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            $("#start-upload").one('click', function (e) {
                e.preventDefault();
                data.submit();
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('.progress-bar').css(
                'width',
                progress + '%'
            );
        },
        done: function (e, data) {
            console.log(data.result.success)
            if(data.result.success){
              // $('.progress-bar').css(
              //     'width',
              //     0 + '%'
              // );
              // $.notify({
            	// 	title: "Update Complete",
            	// 	message: "",
            	// 	icon: 'fa fa-check'
            	// },{
            	// 	type: "success"
            	// });
              window.location.href="{{ route('dashboard') }}"
            } else {
              $('.progress-bar').css(
                  'width',
                  0 + '%'
              );
              $.notify({
            		title: "Update Complete",
            		message: "",
            		icon: 'fa fa-check'
            	},{
            		type: "alert"
            	});
            }

        },
        error: function (e,data){
          $('.progress-bar').css(
              'width',
              0 + '%'
          );
          $.notify({
            title: "Upload failed.",
            message: "",
            icon: 'fa fa-check'
          },{
            type: "danger"
          });
        }
    })
});
</script>

@endsection
