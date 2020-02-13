<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id=$request->session()->get('chat_admin')->id;
        $posts=DB::table('wingg_app_post')->select('wingg_app_post.*','wingg_app_position.name AS p_name','wingg_app_team.name AS t_name')
        ->join('wingg_app_user','wingg_app_user.company_id','=','wingg_app_post.company_id')
        ->join('wingg_app_postteam','wingg_app_postteam.post_id','=','wingg_app_post.id')
        ->join('wingg_app_postposition','wingg_app_postposition.post_id','=','wingg_app_post.id')
        ->join('wingg_app_team','wingg_app_team.id','=','wingg_app_postteam.team_id')
        ->join('wingg_app_position','wingg_app_position.id','=','wingg_app_postposition.position_id')
        ->where('wingg_app_user.id','=',$user_id)->get();
       //dd($posts);
        return view('admin.news',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')){
           //dd($request->input());
        $company_id=$request->session()->get('chat_admin')->company_id;
            $input['title']=$request->input('post_title');
            $input['content']=$request->input('post_description');
            $input['company_id']=$company_id;
            $input['dislikes']=0;
            $input['likes']=0;
            $input['created_at']=  date('Y-m-d H:i:s');
            $input['updated_at']=  date('Y-m-d H:i:s');
             $image = $request->file('cover_image');
//dd($image);
            if ($image !="") {
            $profilePicture = 'cover_image-'.time().'-'.rand(000000,999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('cover/images');
            $image->move($destinationPath, $profilePicture);
            $imagepath='http://phplaravel-355796-1161525.cloudwaysapps.com/cover/images/'.$profilePicture;
            $input['cover_image']=$imagepath;
            }
        
           $post_id=DB::table('wingg_app_post')->insertGetId( $input);

           $team['team_id']=$request->input('team');
           $team['post_id']=$post_id;
           $wingg_app_postteam=DB::table('wingg_app_postteam')->insertGetId($team);

           $position['position_id']=$request->input('role');
           $position['post_id']=$post_id;
           $wingg_app_postposition=DB::table('wingg_app_postposition')->insertGetId($position);
           $request->session()->flash('post', 'Post Create Sussessfully');
            return redirect('/dashboard');
        }
       return view('admin.add-post');
    }

public function imagestore(Request $request)
    {
        if($request->isMethod('post')){
         //  dd($request->all());
        $company_id=$request->session()->get('chat_admin')->company_id;
            $input['title']=$request->input('post_title');
            $input['content']=$request->input('post_description');
            $input['company_id']=$company_id;
            $input['dislikes']=0;
            $input['likes']=0;
            $input['created_at']=  date('Y-m-d H:i:s');
            $input['updated_at']=  date('Y-m-d H:i:s');
             $image = $request->file('cover_image');
             $file = $request->file('file');
//dd($image);
            if ($image !="") {
            $profilePicture = 'cover_image-'.time().'-'.rand(000000,999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('cover/images');
            $image->move($destinationPath, $profilePicture);
            $imagepath='http://phplaravel-355796-1161525.cloudwaysapps.com/cover/images/'.$profilePicture;
            $input['cover_image']=$imagepath;
            }

            if ($file !="") {
            $profilePictures = 'cover_image-'.time().'-'.rand(000000,999999).'.'.$file->getClientOriginalExtension();
            $destinationPaths = public_path('cover/images');
            $file->move($destinationPaths, $profilePictures);
            $imagepaths='http://phplaravel-355796-1161525.cloudwaysapps.com/cover/images/'.$profilePictures;
            $input['image_url']=$imagepaths;
            }
        
           $post_id=DB::table('wingg_app_post')->insertGetId( $input);

           $team['team_id']=$request->input('team');
           $team['post_id']=$post_id;
           $wingg_app_postteam=DB::table('wingg_app_postteam')->insertGetId($team);

           $position['position_id']=$request->input('role');
           $position['post_id']=$post_id;
           $wingg_app_postposition=DB::table('wingg_app_postposition')->insertGetId($position);
            $request->session()->flash('post', 'Post Create Sussessfully');
            //return redirect('/dashboard');
        }
       return view('admin.add-post');
    }


  public function mediastore(Request $request)
    {
        if($request->isMethod('post')){
           //dd($request->input());
        $company_id=$request->session()->get('chat_admin')->company_id;
            $input['title']=$request->input('post_title');
            $input['media_url']=$request->input('link');
            $input['company_id']=$company_id;
            $input['dislikes']=0;
            $input['likes']=0;
            $input['created_at']=  date('Y-m-d H:i:s');
            $input['updated_at']=  date('Y-m-d H:i:s');
             $image = $request->file('cover_image');
//dd($image);
            if ($image !="") {
            $profilePicture = 'cover_image-'.time().'-'.rand(000000,999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('cover/images');
            $image->move($destinationPath, $profilePicture);
            $imagepath='http://phplaravel-355796-1161525.cloudwaysapps.com/cover/images/'.$profilePicture;
            $input['cover_image']=$imagepath;
            }
        
           $post_id=DB::table('wingg_app_post')->insertGetId( $input);

           $team['team_id']=$request->input('team');
           $team['post_id']=$post_id;
           $wingg_app_postteam=DB::table('wingg_app_postteam')->insertGetId($team);

           $position['position_id']=$request->input('role');
           $position['post_id']=$post_id;
           $wingg_app_postposition=DB::table('wingg_app_postposition')->insertGetId($position);
            $request->session()->flash('post', 'Post Create Sussessfully');
            return redirect('/dashboard');
        }
       return view('admin.add-post');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function deletepost(Request $request,$id)
    {
        DB::table('wingg_app_postteam')->where('post_id',$id)->delete();
        DB::table('wingg_app_postposition')->where('post_id',$id)->delete();
        DB::table('wingg_app_post')->where('id',$id)->delete();
        $request->session()->flash('delnum', 'Post delete Successfully');
        return redirect('/dashboard');
    }


 public function teamsearch($id)
    {
        $posts=DB::table('wingg_app_post')->select('wingg_app_post.*','wingg_app_position.name AS p_name','wingg_app_team.name AS t_name')
        ->join('wingg_app_user','wingg_app_user.company_id','=','wingg_app_post.company_id')
        ->join('wingg_app_postteam','wingg_app_postteam.post_id','=','wingg_app_post.id')
        ->join('wingg_app_postposition','wingg_app_postposition.post_id','=','wingg_app_post.id')
        ->join('wingg_app_team','wingg_app_team.id','=','wingg_app_postteam.team_id')
        ->join('wingg_app_position','wingg_app_position.id','=','wingg_app_postposition.position_id')
        ->where('wingg_app_postteam.team_id','=',$id)->get();
        //dd($posts);
         return view('admin.ajaxnews',compact('posts'));
    }

    public function postionsearch($id)
    {
        $posts=DB::table('wingg_app_post')->select('wingg_app_post.*','wingg_app_position.name AS p_name','wingg_app_team.name AS t_name')
        ->join('wingg_app_user','wingg_app_user.company_id','=','wingg_app_post.company_id')
        ->join('wingg_app_postteam','wingg_app_postteam.post_id','=','wingg_app_post.id')
        ->join('wingg_app_postposition','wingg_app_postposition.post_id','=','wingg_app_post.id')
        ->join('wingg_app_team','wingg_app_team.id','=','wingg_app_postteam.team_id')
        ->join('wingg_app_position','wingg_app_position.id','=','wingg_app_postposition.position_id')
        ->where('wingg_app_postposition.position_id','=',$id)->get();
        //dd($posts);
         return view('admin.ajaxnews',compact('posts'));
    }

 public function search(Request $request)
    {
        $keyword = $request->searchkeyword;
        $posts=DB::table('wingg_app_post')->select('wingg_app_post.*','wingg_app_position.name AS p_name','wingg_app_team.name AS t_name')
        ->join('wingg_app_user','wingg_app_user.company_id','=','wingg_app_post.company_id')
        ->join('wingg_app_postteam','wingg_app_postteam.post_id','=','wingg_app_post.id')
        ->join('wingg_app_postposition','wingg_app_postposition.post_id','=','wingg_app_post.id')
        ->join('wingg_app_team','wingg_app_team.id','=','wingg_app_postteam.team_id')
        ->join('wingg_app_position','wingg_app_position.id','=','wingg_app_postposition.position_id')
        ->where('wingg_app_post.title', 'like', '%' . $keyword . '%')->get();
        //dd($posts);
         return view('admin.ajaxnews',compact('posts'));
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
