<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('checkadmin');
    }

    public function index()
    {
      $news= DB::Table('news_and_events')->get();
      return view('admin.news',array('news'=>$news));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array(
            'title'=>$request['title'],
            'description'=>$request['description'],
            'page_content'=>$request['page_content']
        );
        DB::Table('news_and_events')->insert($data);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return DB::Table('news_and_events')->where('id',$id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('news_and_events')->where('id',$id)->delete();
        return back();
    }
    
    public function editnews(Request $request){
        $id=$request['id'];
        $data=array(
            'title'=>$request['title'],
            'description'=>$request['description'],
            'page_content'=>$request['page_content']
        );
        DB::Table('news_and_events')->where('id',$id)->update($data);
        return back();
    }
}
