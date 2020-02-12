<?php
namespace App\Classes;
use DB;
use Session;
use Carbon\Carbon;
use Hash;

class Feed {

  public function teams(){

       $company_id=Session::get('chat_admin')->company_id;
       $team= DB::table('wingg_app_team')->where('company_id',$company_id)->get();
        return $team;
    }

     public function roles(){

       $company_id=Session::get('chat_admin')->company_id;
       $role= DB::table('wingg_app_position')->where('company_id',$company_id)->get();
        return $role;
    }
}
?>
