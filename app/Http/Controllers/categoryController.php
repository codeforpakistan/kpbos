<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class categoryController extends Controller
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
       $categories=DB::Table('categories')->get();
       return view('admin.categories',array('categories'=>$categories));
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
        $file->move('public/uploads/sectors/',$filename);

       $data=array(
           'name'=>$request['name'],
           'description'=>$request['description'],
           'bg_pic'=>$filename
       );
        DB::table('categories')->insert($data);
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
        return DB::Table('categories')->where('id',$id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       DB::Table('categories')->where('id',$id)->delete();
        return back();
    }

    public function editcategory(Request $request){

        $file=$request->file('pic');
        if(isset($file)){
            $file=$request->file('pic');

            $filename=$file->getClientOriginalName();
            $file->move('public/uploads/sectors/',$filename);

            $data=array(
                'name'=>$request['name'],
                'description'=>$request['description'],
                'bg_pic'=>$filename
            );
            DB::Table('categories')->where('id',$request['id'])->update($data);
            return back();
        }
        else{
            $data=array(
                'name'=>$request['name'],
                'description'=>$request['description'],
            );
            DB::Table('categories')->where('id',$request['id'])->update($data);
            return back();
        }
    }
}
