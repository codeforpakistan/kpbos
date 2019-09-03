<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class achievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $achievements=DB::Table('achievements')->get();
       return view('admin.achievements',array('achievements'=>$achievements));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=$request->file('pic');

        $filename=$file->getClientOriginalName();
        $file->move('public/uploads/achievements/',$filename);

        $data=array(

            'pic'=>$filename,
            'description'=>$request['description'],

        );
        DB::Table('achievements')->insert($data);
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
      $achievement = DB::Table('achievements')->where('id',$id)->get();
      return $achievement;
    }

    public function edit_achievements(Request $request){
        $file=$request->file('pic');
        if(isset($file)){
            $file=$request->file('pic');

            $filename=$file->getClientOriginalName();
            $file->move('public/uploads/achievements/',$filename);

            $data=array(
                'pic'=>$filename,
                'description'=>$request['description'],
            );

            DB::Table('achievements')->where('id',$request['id'])->update($data);
            return back();
        }
        else{

            $data=array(
                'description'=>$request['description'],
            );
            DB::Table('achievements')->where('id',$request['id'])->update($data);
            return back();
        }
    }
}
