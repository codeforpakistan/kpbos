<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class mediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.media');
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
        $file=$request->file('file');

        $filename=$file->getClientOriginalName();
        $file->move('public/uploads/media/',$filename);

        $data=array(
            'file_type'=>$request['file_type'],
             'event_name'=>$request['event_name'],
            'file_name'=>$filename
        );
        DB::Table('media')->insert($data);
        return back();

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
        DB::Table('media')->where('id',$id)->delete();
        return back();
    }

    public function media_images(){
       $images=DB::Table('media')->where('file_type','image')->get();
        return view('admin.media_images',array('images'=>$images));
    }
    public function media_videos(){
        $videos=DB::Table('media')->where('file_type','video')->get();
        return view('admin.media_videos',array('videos'=>$videos));
    }
}
