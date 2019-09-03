<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class about_usController extends Controller
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
        //
        $about_us= DB::Table('about_us')->take(1)->orderBY('id','DESC')->get();
        $about_us_section=DB::Table('about_us_sections')->get();
        return view('admin.about_us',array('about_us'=>$about_us,'about_us_sections'=>$about_us_section));
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
            'description'=>$request['description']
        );

        DB::Table('about_us')->insert($data);
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
        return DB::Table('about_us')->where('id',$id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::Table('about_us')->where('id',$id)->delete();
        return back();
    }

    public function editaboutus(Request $request){


        $data=array(
            'description'=>$request['description']
        );
        DB::Table('about_us')
             ->where('id',$request['id'])
            ->update($data);
        return back();

    }
}
