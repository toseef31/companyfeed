<div class="sidebar" data-color="#072f44" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <!-- <a href="{{url('/')}}" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{asset('frontend-assets/dashboard/images/logo.svg')}}">
          </div>
        </a> -->
        <a href="{{url('/')}}" class="simple-text logo-normal">
          <!-- Hotel Booking -->
          <div class="logo-image-big">
            <img src="{{asset('frontend-assets/dashboard/images/logo.svg')}}">
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <!-- @if(Session::get('chat_admin')->role =='admin')
          <li class="active ">
            <a href="{{url('/dashboard')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @endif -->
          @if(Session::get('chat_admin')->role =='admin' || Session::get('chat_admin')->role =='a')
          <li>
            <a href="#home"  data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="home">
              <!-- <i class="fa fa-home"></i> -->
              <p>Home</p>
            </a>
            <ul class="collapse show" id="home">
              <li><a href="#created_at" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="created_at">Created at</a>
                <ul class="collapse show" id="created_at">
                  <li><a href="">today</a></li>
                  <li><a href="">Yesterday</a></li>
                  <li><a href="">Last week</a></li>
                  <li><a href="">Last 15 days</a></li>
                  <li><a href="">Last month</a></li>
                </ul>
              </li>
              <li><a href="#team" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="team">Team</a>
                <ul class="collapse show" id="team">
                  <li><a href="">Northeast 1</a></li>
                  <li><a href="">Northeast 2</a></li>
                  <li><a href="">North</a></li>
                  <li><a href="">SP-Capital</a></li>
                  <li><a href="">SP-Interior</a></li>
                  <li><a href="">South 1</a></li>
                  <li><a href="">South 2</a></li>
                  <li><a href="">...</a></li>
                </ul>
              </li>
              <li><a href="#role" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="role">Role</a>
                <ul class="collapse show" id="role">
                  <li><a href="">Cashier</a></li>
                  <li><a href="">Head of sector</a></li>
                  <li><a href="">Store manager</a></li>
                  <li><a href="">Salesperson</a></li>
                  <li><a href="">...</a></li>
                </ul>
              </li>
            </ul>

          </li>
           @endif
        </ul>
      </div>
    </div>
