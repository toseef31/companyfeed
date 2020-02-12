

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
                          <a href=""><i class="fa fa-edit text-primary"></i></a>
                          <a href="{{ url('dashboard/deletepost/'.$post->id) }}"> <i class="fa fa-trash text-danger"></i> </a>
                          <a href=""><i class="fa fa-eye text-success"></i></a>
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
            