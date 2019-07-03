@extends('layouts.upload.app')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-cog"></i> Upload new videos</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Settings</li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6">
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible" id="myAlert">
              <strong>Ftp setting updated</strong>
          </div>
          <?php \Session::forget('success');?>
      @endif
      <div class="tile">
        <h3 class="tile-title">FTP Settings</h3>
        <div class="tile-body">
          <form method="post" action="{{ route('settings') }}">
            @csrf

            <div class="form-group">
              <label class="control-label">Ftp Url</label>
              <input class="form-control" type="text" placeholder="" name='ftp_url' value="{{ isset($setting) ? $setting->ftp_url : '' }}" required>
            </div>
            <div class="form-group">
              <label class="control-label">Ftp Path</label>
              <input class="form-control" type="text" placeholder="" name='ftp_path' value="{{ isset($setting) ? $setting->ftp_path : ''}}" required>
            </div>
            <div class="form-group">
              <label class="control-label">Ftp Usename</label>
              <input class="form-control" type="text" placeholder="" name='ftp_username' value="{{ isset($setting) ? $setting->ftp_username : ''  }}" required>
            </div>
            <div class="form-group">
              <label class="control-label">Ftp Password</label>
              <input class="form-control" type="text" placeholder="" name='ftp_password' value="{{ isset($setting) ? $setting->ftp_password : ''  }}" required>
            </div>

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</main>
@endsection

@section('script')


@endsection
