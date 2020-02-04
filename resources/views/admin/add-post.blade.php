@extends('admin.layouts.master')

<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/image_uploader/dist/image-uploader.min.css')}}">
@section('content')
<div class="wrapper">
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
            </button>
          </div>
          <a class="navbar-brand" href="#pablo"><strong>New Post</strong></a><br>
          <span>Publish news in text, image, video format or an external link</span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
          <ul class="navbar-nav">
            <li class="nav-item btn-rotate dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                <p>
                  <span class="d-lg-none d-md-block">Some Actions</span>
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ url('dashboard/logout') }}">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- <div class="panel-header panel-header-sm">
    </div> -->
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <!-- <div class="card-header">
              <h4 class="card-title"> Add User</h4>
            </div> -->
            <div class="row" style="margin: 0;">
              <div class="col-md-12">

                <div role="tabpanel">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                      <a href="#text" aria-controls="home" role="tab" data-toggle="tab"> <i class="fa fa-file" aria-hidden="true"></i> Text</a>
                    </li>
                    <li role="presentation">
                      <a href="#image" aria-controls="image" role="tab" data-toggle="tab"> <i class="fa fa-file-image-o" aria-hidden="true"></i> Image</a>
                    </li>
                    <li role="presentation">
                      <a href="#external_links" aria-controls="external_links" role="tab" data-toggle="tab"> <i class="fa fa-link" aria-hidden="true"></i> External Link</a>
                    </li>
                  </ul>
                
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="text">
                      <form method="post" action="">
                        <div class="form-group">
                          <input type="text" name="post_title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                          <textarea rows="100" cols="70" class="ckeditor" id="editor" name="job_description" placeholder="Description...." required>{{ old('job_description') }}</textarea>
                        </div>
                        <div class="form-group pull-left">
                            <input type="text" name="file_name" id="file_name" placeholder="Insert a cover image (optional)">
                            <label for="insert-cover">
                              <button class="btn btn-default">Insert</button>
                            <input type="file" name="img1" id="insert-cover" onchange="document.getElementById('file_name').value = this.value.split('\\').pop().split('/').pop()">
                            </label>
                        </div>
                        <div class="form-group pull-right">
                          <input type="submit" class="btn btn-primary" name="PUBLISH">
                        </div>
                      </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="image">
                      <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                          <input type="text" name="img_title" class="form-control" placeholder="Title">
                        </div>
                        <div class="input-field">
                          <label class="active">Photos</label>
                          <div class="input-images-1" style="padding-top: .5rem;"></div>
                        </div>
                        <div class="form-group pull-left">
                            <input type="text" name="file_name_image" id="file_name" placeholder="Insert a cover image (mandatory)">
                            <label for="insert-cover">
                              <button class="btn btn-default">Insert</button>
                            <input type="file" name="img1" id="insert-cover" onchange="document.getElementById('file_name_image').value = this.value.split('\\').pop().split('/').pop()">
                            </label>
                        </div>
                        <div class="form-group pull-right">
                          <input type="submit" class="btn btn-primary" name="PUBLISH">
                        </div>
                      </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="external_links">
                      <form method="post" action="">
                        <div class="form-group">
                          <input type="text" name="post_title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                          <input type="text" name="link" class="form-control" placeholder="Copy and paste the page link (URL) here">
                        </div>
                        <div class="form-group pull-left">
                            <input type="text" name="file_name_links" id="file_name" placeholder="Insert a cover image (optional)">
                            <label for="insert-cover">
                              <button class="btn btn-default">Insert</button>
                            <input type="file" name="img1" id="insert-cover" onchange="document.getElementById('file_name_links').value = this.value.split('\\').pop().split('/').pop()">
                            </label>
                        </div>
                        <div class="form-group pull-right">
                          <input type="submit" class="btn btn-primary" name="PUBLISH">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="{{asset('frontend-assets/dashboard/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('frontend-assets/dashboard/ckeditor/js/sample.js')}}"></script>
  <script src="{{asset('frontend-assets/dashboard/ckeditor/js/sf.js')}}"></script>
  <script src="{{asset('frontend-assets/image_uploader/dist/image-uploader.min.js')}}"></script>
<script>
  $('.input-images-1').imageUploader();

  $('.nav-tabs').on('click', 'li', function() {
      $('.nav-tabs li.active').removeClass('active');
      $(this).addClass('active');
  });
</script>
@endsection
