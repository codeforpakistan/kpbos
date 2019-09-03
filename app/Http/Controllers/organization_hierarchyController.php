<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class organization_hierarchyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members=DB::Table('members')->get();
        return view('admin.organization_hierarchy',array('members'=>$members));
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
        $file->move('public/uploads/members/',$filename);

        $data=array(
            'name'=>$request['name'],
            'pic'=>$filename,
            'designation'=>$request['designation'],
            'contact_no'=>$request['contact_no']
        );
        DB::Table('members')->insert($data);
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
        return DB::Table('members')->where('id',$id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::Table('members')->where('id',$id)->delete();
        return back();
    }
    
    public function edit_member(Request $request){
        $file=$request->file('pic');
        if(isset($file)){
            $file=$request->file('pic');

            $filename=$file->getClientOriginalName();
            $file->move('public/uploads/members/',$filename);

            $data=array(
                'name'=>$request['name'],
                'pic'=>$filename,
                'designation'=>$request['designation'],
                'contact_no'=>$request['contact_no']
            );

            DB::Table('members')->where('id',$request['id'])->update($data);
            return back();
        }
        else{

            $data=array(
                'name'=>$request['name'],

                'designation'=>$request['designation'],
                'contact_no'=>$request['contact_no']
            );
            DB::Table('members')->where('id',$request['id'])->update($data);
            return back();
        }
    }
}
