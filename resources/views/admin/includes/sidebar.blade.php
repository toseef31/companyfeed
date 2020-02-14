<div class="sidebar" data-color="#072f44" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
       
        <a href="{{url('/')}}" class="simple-text logo-normal">
          <!-- Hotel Booking -->
          <div class="logo-image-big">
            <img src="{{asset('frontend-assets/dashboard/images/logo.svg')}}">
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
   
         
          <li>
            <a href="{{url('/dashboard')}}">
              <!-- <i class="fa fa-home"></i> -->
              <p>Home</p>
            </a>
          </li>

          <li><a href="#created_at" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="created_at">Created at</a>
            <ul class="collapse show" id="created_at">
              <li><a href="{{url('dashboard/posts?date=1 day')}}">today</a></li>
              <li><a href="{{url('dashboard/posts?date=2 day')}}">Yesterday</a></li>
              <li><a href="{{url('dashboard/posts?date=1 week')}}">Last week</a></li>
              <li><a href="{{url('dashboard/posts?date=15 days')}}">Last 15 days</a></li>
              <li><a href="{{url('dashboard/posts?date=1 month')}}">Last month</a></li>
            </ul>
          </li>
          <li><a href="#team" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="team">Team</a>
            <ul class="collapse show" id="team">
              @foreach(Feed::teams() as $team)
              <li><a href="{{url('dashboard/team-post/'.$team->id)}}">{{$team->name}}</a></li>
              @endforeach
              <!-- <li><a href="">Northeast 2</a></li>
              <li><a href="">North</a></li>
              <li><a href="">SP-Capital</a></li>
              <li><a href="">SP-Interior</a></li>
              <li><a href="">South 1</a></li>
              <li><a href="">South 2</a></li>
              <li><a href="">...</a></li> -->
            </ul>
          </li>
          <li><a href="#role" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="role">Role</a>
            <ul class="collapse show" id="role">
              @foreach(Feed::roles() as $role)
              <li><a href="{{url('dashboard/roles-post/'.$role->id)}}">{{$role->name}}</a></li>
              @endforeach
            </ul>
          </li>
           
        </ul>
      </div>
    </div>
