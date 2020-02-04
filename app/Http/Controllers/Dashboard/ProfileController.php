<?php

namespace App\Http\Controllers\Dashboard;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Storage;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function show_partner()
    {
        $partner_data = DB::table('fa_partner')->orderBy('p_id','desc')->get();

        foreach($partner_data as &$qoutes){

          $qoutes->qoute = DB::table('fa_quote')->where('p_id','=',$qoutes->p_id)->orderBy('id','desc')->get();
          $qoutes->peddingqoute = DB::table('fa_quote')->where('p_id','=',$qoutes->p_id)->where('status','Pending')->orderBy('id','desc')->get();
          $qoutes->wonqoute = DB::table('fa_quote')->where('p_id','=',$qoutes->p_id)->where('status','Won')->orderBy('id','desc')->get();
          $qoutes->lossqoute = DB::table('fa_quote')->where('p_id','=',$qoutes->p_id)->where('status','Loss')->orderBy('id','desc')->get();
        }
        //dd($partner_data);
        return view('admin.user', compact('partner_data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
