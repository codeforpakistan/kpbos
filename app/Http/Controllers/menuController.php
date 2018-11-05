<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class menuController extends Controller
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
       $menus=DB::Table('menus')->get();
       return view('admin.menus',array('menus'=>$menus));
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
       $data=array(
           'name'=>$request['name'],
           'page_content'=>$request['page_content']
       );
       DB::table('menus')->insert($data);
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
      $menu= DB::table('menus')->where('id',$id)->get();
        return $menu;
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
        $data=array(
            'name'=>$request['name']
        );
        DB::table('menus')->where('id',$id)->update($data);
        return back();
    }
    public function editmenus(Request $request){
        $id= $request['id'];
        $data=array(
            'name'=>$request['name'],
            'page_content'=>$request['page_content']
        );
        DB::table('menus')->where('id',$id)->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('menus')->where('id',$id)->delete();
        return back();
    }
}
