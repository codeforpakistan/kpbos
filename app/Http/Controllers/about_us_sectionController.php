<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
class about_us_sectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $file=$request->file('pic');

        $filename=$file->getClientOriginalName();
        $file->move('public/uploads/about_us_section/',$filename);

        $data=array(
            'title'=>$request['title'],
            'pic'=>$filename,
            'description'=>$request['description']
        );
        DB::Table('about_us_sections')->insert($data);
        return back();

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
       $single= DB::Table('about_us_sections')->where('id',$id)->get();
       return $single;
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
        DB::Table('about_us_sections')->where('id',$id)->delete();
        return back();
    }
    public function editaboutus_section(Request $request){
        echo "hello bilawla";

        $file=$request->file('pic');
        if(isset($file)){

            $file=$request->file('pic');

            $filename=$file->getClientOriginalName();
            $file->move('public/uploads/about_us_section/',$filename);

            $data=array(
                'title'=>$request['title'],
                'pic'=>$filename,
                'description'=>$request['description']
            );
            DB::Table('about_us_sections')->where('id',$request['section_id'])->update($data);
            return back();
        }
        else{


            $data=array(
                'title'=>$request['title'],
                'description'=>$request['description']
            );
            DB::Table('about_us_sections')->where('id',$request['section_id'])->update($data);
            return back();
        }


    }

}
