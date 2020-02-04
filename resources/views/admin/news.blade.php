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
                <a href="{{url('dashboard/add-post')}}" class="btn">Download CSV</a>
                <a href="{{url('dashboard/add-post')}}" class="btn btn-primary">New Post</a>
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
                    <input type="text" class="form-control" id="keyword" placeholder="Search">
                  </div>
                  <div class="form-group">
                    <select class="form-control">
                      <option>Created at</option>
                      <option>04/02/2020</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control">
                      <option>teams</option>
                      <option>Sp-Interior</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control">
                      <option>Roles</option>
                      <option>Salespersonr</option>
                    </select>
                  </div>
                  <!-- <button type="submit" class="btn btn-default">Submit</button> -->
                </form>
                <p class="pull-right mb-0" style="line-height: 36px">22 founds in 115 publications</p>
              </div>
            </div>
            <div class="card">
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
                      <th colspan="3">blank_field</th>
                      <th colspan="3">blank_field</th>
                      <th colspan="3">blank_field</th>
                      
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-right">
                          <a href=""><i class="fa fa-edit text-primary"></i></a>
                          <a href=""> <i class="fa fa-trash text-danger"></i> </a>
                          <a href=""><i class="fa fa-eye text-success"></i></a>
                        </td>
                        <td colspan="2"> <img src="{{asset('frontend-assets/dashboard/img/faces/abc1.jpg')}}" height="70px" width="60px" class="pull-left"> 
                          <span class="pl-10" style="display: flex;">Abc title of news</span>
                        </td>
                        <td colspan="2"> 14/01/2020 12:17</td>
                        <td colspan="3"> Sp-Interior</td>
                        <td colspan="3"> Salesperson. Head of sector</td>
                        <td colspan="3"> 2812</td>
                        <td colspan="3"> 205</td>
                        <td colspan="3"> -</td>
                        <td colspan="3"> -</td>
                        <td colspan="3"> -</td>
                        
                      </tr>
                      <tr>
                        <td class="text-right">
                          <a href=""><i class="fa fa-edit text-primary"></i></a>
                          <a href=""> <i class="fa fa-trash text-danger"></i> </a>
                          <a href=""><i class="fa fa-eye text-success"></i></a>
                        </td>
                        <td colspan="2"> <img src="{{asset('frontend-assets/dashboard/img/faces/abc2.jpg')}}" height="70px" width="60px" class="pull-left"> 
                          <span class="pl-10" style="display: flex;">every news has different tile either more then 50 character</span>
                        </td>
                        <td colspan="2"> 14/01/2020 12:17</td>
                        <td colspan="3"> Sp-Interior</td>
                        <td colspan="3"> Salesperson. Head of sector</td>
                        <td colspan="3"> 2812</td>
                        <td colspan="3"> 205</td>
                        <td colspan="3"> -</td>
                        <td colspan="3"> -</td>
                        <td colspan="3"> -</td>
                        
                      </tr>
                     
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

@endsection
