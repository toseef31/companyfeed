@extends('admin.layouts.master')
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
            <a class="navbar-brand" href="#pablo"><strong>News</strong></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">
              <li>
                <a href="{{url('dashboard/add-post')}}" class="btn top-btn">Download CSV</a>
                <a href="{{url('dashboard/add-post')}}" class="btn btn-primary top-btn">New Post</a>
              </li>
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
            <div class="row">
              <div class="col-md-12 mb-20">
                <form class="form-inline pull-left" action="">
                  <div class="form-group">
                    <input type="text" class="form-control" id="keyword" placeholder="Search" onkeyup="searchByname(this.value)">
                  </div>
                  <div class="form-group">
                    <select class="form-control">
                      <option>Created at</option>
                      <option>04/02/2020</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="team" id="" class="form-control" onchange="teams(this);">
                            <option value="">Select Team</option>
                            @foreach(Feed::teams() as $team)
                         <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                          </select>
                  </div>
                  <div class="form-group">
                      <select name="role" id="input1/(\w+)/\u\1/g" class="form-control" onchange="postion(this);">
                            <option value="">Select Role</option>
                            @foreach(Feed::roles() as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                          </select>
                  </div>
                  <!-- <button type="submit" class="btn btn-default">Submit</button> -->
                </form>
                <p class="pull-right mb-0" style="line-height: 36px">22 founds in 115 publications</p>
              </div>
            </div>
            @if(Session::has('post'))
               <div class="alert alert-success">
                  {{ Session::get('post') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               @endif
               @if(Session::has('delnum'))
               <div class="alert alert-success">
                  {{ Session::get('delnum') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               @endif
            <div class="card" id="showresponce">
              <!-- <div class="card-header">
                <h4 class="card-title"> Jobs List</h4>
              </div> -->

              <div class="card-body">
                <div class="table-responsive">

                  <table class="table">
                    <thead>
                      <th colspan="2"></th>
                      <th colspan="2">Title</th>
                      <th colspan="">Created at</th>
                      <th colspan="3">Team</th>
                      <th colspan="3">Roles</th>
                      <th colspan="3">Targeted Audience</th>
                      <th colspan="3">Likes</th>
                      <th colspan="3">Dislike</th>
                      <th colspan="3">blank_field</th>
                      <th colspan="3">blank_field</th>

                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                      <tr>
                        <td class="text-right">
                          @if($post->content)
                          <a href="{{url('dashboard/edit-post-text/'.$post->id)}}"><i class="fa fa-edit text-primary"></i></a>
                          @elseif($post->image_url)
                          <a href="{{url('dashboard/edit-post-image/'.$post->id)}}"><i class="fa fa-edit text-primary"></i></a>
                          @else
                          <a href="{{url('dashboard/edit-post-link/'.$post->id)}}"><i class="fa fa-edit text-primary"></i></a>
                          @endif
                          <a href="{{ url('dashboard/deletepost/'.$post->id) }}"> <i class="fa fa-trash text-danger"></i> </a>
                          <!-- <a href=""><i class="fa fa-eye text-success"></i></a> -->
                        </td>
                             <?php
                        $cover_image=url('frontend-assets/dashboard/img/faces/abc1.jpg');
                        if($post->cover_image){
                            $cover_image=$post->cover_image;
                        }else{
                          $cover_image=url('frontend-assets/dashboard/img/faces/abc1.jpg');
                        }

                        ?>
                        <td colspan="2"> <img src="{{ $cover_image}}" height="70px" width="60px" class="pull-left">
                          <span class="pl-10" style="display: flex;">{{$post->title}}</span>
                        </td>
                        <td colspan="2"> {{$post->created_at}}</td>
                        <td colspan="3"> {{$post->t_name}}</td>
                        <td colspan="3"> {{$post->p_name}}</td>
                        <td colspan="3"> 2812</td>
                        <td colspan="3"> {{$post->likes}}</td>
                        <td colspan="3"> {{$post->dislikes}}</td>
                        <td colspan="3"> -</td>
                        <td colspan="3"> -</td>

                      </tr>
                      @endforeach

                    </tbody>
                  </table>
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
<script>
function teams(data){
 var id =data.value;
  $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'get',
          url: "{{url('dashboard/teamsearch/')}}/"+id,
         success: function (response) {
console.log(response);
          $('#showresponce').html(response);


        }

     });
}


function postion(data){
 var id =data.value;
  $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'get',
          url: "{{url('dashboard/postionsearch/')}}/"+id,
         success: function (response) {
         console.log(response);
          $('#showresponce').html(response);


        }

     });
}

function searchByname(searchkeyword){
  // alert(searchkeyword);
    $.ajax({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          url: "{{url('/dashboard/search')}}",
          data: {
            "searchkeyword": searchkeyword
            },
          success: function (response) {
              $('#showresponce').html(response);

          }
        });
  }

</script>
@endsection
