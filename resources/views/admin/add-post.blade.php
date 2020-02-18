@extends('admin.layouts.master')

@section('style')
<link href="{{ asset('frontend-assets/css/dropzone.css') }}" rel="stylesheet">


@endsection
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
          <div class="card" style="width:70%;">
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
                      <a href="#image" aria-controls="image" role="tab" data-toggle="tab"> <i class="fa fa-file-image-o" aria-hidden="true"></i> Image & Video</a>
                    </li>
                    <li role="presentation">
                      <a href="#external_links" aria-controls="external_links" role="tab" data-toggle="tab"> <i class="fa fa-link" aria-hidden="true"></i> External Link</a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="text">
                      <form method="post" action="" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                          <select name="team" id="textteamdata" class="form-control" required="required" onchange="textteam(this)">
                            <option value="">Select Team</option>
                            @foreach(Feed::teams() as $team)
                         <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                          </select>

                      </div>
                       <div class="form-group">
                          <!-- <select name="role" id="input1/(\w+)/\u\1/g" class="form-control" required="required"> -->
                          <select name="role" id="textroledata" class="form-control" required="required" onchange="textrole(this)">
                            <option value="">Select Role</option>
                            @foreach(Feed::roles() as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                          </select>

                      </div>

                        <div class="form-group">
                          <input type="text" name="post_title" id="texttitledata" class="form-control" placeholder="Title" required maxlength="130" onkeyup="texttitle(this)">
                        </div>
                        <div class="form-group">
                         <textarea rows="100" cols="70" class="tex-editor" id="editor" name="post_description" placeholder="Description...." required></textarea>
                       </div>
                        <div class="form-group pull-left">
                            <input type="text" name="" id="file_name" placeholder="Insert a cover image (optional)">
                            <label for="insert-cover">
                              <button class="btn btn-default image-btn">Insert</button>
                            <input type="file" name="cover_image" id="insert-cover" onchange="document.getElementById('file_name').value = this.value.split('\\').pop().split('/').pop()">
                            </label>
                        </div>
                        <div class="form-group pull-right">
                          <input type="submit" class="btn btn-primary" name="PUBLISH">
                        </div>
                      </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="image">
                      <form method="post" action="" enctype="multipart/form-data" id="freelistingForm">
                      {{ csrf_field() }}
                       <div class="form-group">
                          <select name="team" id="imageteamdata" class="form-control" required="required" onchange="imageteam(this)">
                            <option value="">Select Team</option>
                            @foreach(Feed::teams() as $team)
                         <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                          </select>

                      </div>
                       <div class="form-group">
                          <select name="role" id="imageroledata" class="form-control" required="required" onchange="imagerole(this)">
                            <option value="">Select Role</option>
                            @foreach(Feed::roles() as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                          </select>

                      </div>
                        <div class="form-group">
                          <input type="text" name="post_title" id="imagetitledata" class="form-control" placeholder="Title" required maxlength="130" onkeyup="imagetitle(this)">
                        </div>
                        <div class="input-field">
                          <label class="active">Photos & Videos</label>

                        </div>
                        <div class="form-group pull-left" style="margin-top: 196px;">
                            <input type="text" name="file_name_image" id="file_name_image" placeholder="Insert a cover image (mandatory)">
                            <label for="insert-cover">
                              <button class="btn btn-default image-btn">Insert</button>
                            <input type="file" name="cover_image" id="insert-image" onchange="document.getElementById('file_name_image').value = this.value.split('\\').pop().split('/').pop()">
                            </label>
                        </div>

                      </form>
                       <div class="formbody">
                          <img src="{{asset('/frontend-assets/gif/loader.gif')}}" style="display:none; width: 13%;left: 43%;" class="loader" id="gifid">
                          <div class="form-group">
                            <div class="row" style="display: block;flex-wrap: wrap; margin-right: -15px;margin-left: -15px;">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                <div class="dorgz" style="position: relative;height: 300px;">
                                  <form id='frmTarget' name='dropzone' action="{{url('dashboard/imagepost')}}" class="dropzone" >{{ csrf_field() }}
                                  </form>
                                  <button type="button " class="btn btn-primary" id="buttonfree" style="float: right;margin-top: 58px;">Submit</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="external_links">
                      <form method="post" action="{{ url('dashboard/mediastore') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                       <div class="form-group">
                          <select name="team" id="linkteamdata" class="form-control" required="required" onchange="linkteam(this)">
                            <option value="">Select Team</option>
                            @foreach(Feed::teams() as $team)
                         <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                          </select>

                      </div>
                       <div class="form-group">
                          <select name="role" id="linkroledata" class="form-control" required="required" onchange="linkrole(this)">
                            <option value="">Select Role</option>
                            @foreach(Feed::roles() as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                          </select>

                      </div>
                        <div class="form-group">
                          <input type="text" name="post_title" id="linktitledata" class="form-control" placeholder="Title" maxlength="130" onkeyup="linktitle(this)" required>
                        </div>
                        <div class="form-group">
                          <input type="text" name="link" class="form-control" placeholder="Copy and paste the page link (URL) here" required>
                        </div>
                        <div class="form-group pull-left">
                            <input type="text" name="" id="file_name_links" placeholder="Insert a cover image (optional)">
                            <label for="insert-cover">
                              <button class="btn btn-default image-btn">Insert</button>
                            <input type="file" name="cover_image" id="insert-cover" onchange="document.getElementById('file_name_links').value = this.value.split('\\').pop().split('/').pop()">
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
<script src="{{ asset('/frontend-assets/js/dropzone.js') }}"></script>
  <script src="{{asset('frontend-assets/dashboard/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('frontend-assets/dashboard/ckeditor/js/sample.js')}}"></script>
  <script src="{{asset('frontend-assets/dashboard/ckeditor/js/sf.js')}}"></script>
<script src="{{ asset('frontend-assets/tinymce/tinymce.min.js') }}"></script>
<script>
tinymce.init({
  selector: '.tex-editor',
  statusbar: true,
  setup: function (editor) {
    editor.on('change', function () {
      editor.save();
    });
  },
  height: 200,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code',
    'charactercount'
  ],
  toolbar: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify bullist numlist outdent indent | link'
});
tinymce.PluginManager.add('charactercount', function (editor) {
  var self = this;
  function update() {
    editor.theme.panel.find('#charactercount').text(['Characters: {0}', self.getCount()]);
  }
  editor.on('init', function () {
    var statusbar = editor.theme.panel && editor.theme.panel.find('#statusbar')[0];
    if (statusbar) {
      window.setTimeout(function () {
        statusbar.insert({
          type: 'label',
          name: 'charactercount',
          text: ['Characters: {0}', self.getCount()],
          classes: 'charactercount',
          disabled: editor.settings.readonly
        }, 0);
        editor.on('setcontent beforeaddundo', update);
        editor.on('keyup', function (e) {
            update();
        });
      }, 0);
    }
  });
  self.getCount = function () {
    var tx = editor.getContent({ format: 'raw' });
    var decoded = decodeHtml(tx);
    // here we strip all HTML tags
    var decodedStripped = decoded.replace(/(<([^>]+)>)/ig, "").trim();
    var tc = decodedStripped.length;
    return tc;
  };
  function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
  }
});

function textteam(data){
  $("#imageteamdata").children('[value="'+data.value+'"]').attr('selected', true);
  $("#linkteamdata").children('[value="'+data.value+'"]').attr('selected', true);
}
function imageteam(data){
  $("#textteamdata").children('[value="'+data.value+'"]').attr('selected', true);
  $("#linkteamdata").children('[value="'+data.value+'"]').attr('selected', true);
}
function linkteam(data){
  $("#imageteamdata").children('[value="'+data.value+'"]').attr('selected', true);
  $("#textteamdata").children('[value="'+data.value+'"]').attr('selected', true);
}
function textrole(data){
  $("#imageroledata").children('[value="'+data.value+'"]').attr('selected', true);
  $("#linkroledata").children('[value="'+data.value+'"]').attr('selected', true);
}
function imagerole(data){
  $("#textroledata").children('[value="'+data.value+'"]').attr('selected', true);
  $("#linkroledata").children('[value="'+data.value+'"]').attr('selected', true);
}
function linkrole(data){
  $("#imageroledata").children('[value="'+data.value+'"]').attr('selected', true);
  $("#textroledata").children('[value="'+data.value+'"]').attr('selected', true);
}
// Title
function texttitle(data){
  // alert(data.value);
  $("#imagetitledata").val(data.value);
  $("#linktitledata").val(data.value);
}
function imagetitle(data){
  $("#texttitledata").val(data.value);
  $("#linktitledata").val(data.value);
}
function linktitle(data){
  $("#imagetitledata").val(data.value);
  $("#texttitledata").val(data.value);
}




Dropzone.options.frmTarget = {
autoProcessQueue: false,
acceptedFiles: ".jpg,.png,.mp4,.mkv,.avi",
parallelUploads: 1,
addRemoveLinks: true,
url: "{{ url('dashboard/imagepost')}}",
init: function () {

  var myDropzone = this;

  $("#buttonfree").click(function (e) {
    //alert('hello');
    e.preventDefault();
    var data = $('form#freelistingForm').serializeArray();
    console.log(data);
     myDropzone.on('sending', function(file, xhr, formData){
       for (var i=0; i<data.length; i++){
           formData.append(data[i].name, data[i].value);
       }
       formData.append('cover_image', $('#insert-image')[0].files[0]);
    //formData.append('userName', 'bob');
   });
    myDropzone.processQueue();
    window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "{{url('/dashboard')}}";

    }, 10000);

  });

 }
}


  $('.nav-tabs').on('click', 'li', function() {
      $('.nav-tabs li.active').removeClass('active');
      $(this).addClass('active');
  });
</script>
@endsection
