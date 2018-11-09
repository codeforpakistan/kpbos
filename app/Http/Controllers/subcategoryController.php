<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class subcategoryController extends Controller
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
        $sub_categories=DB::Table('sub_categories')
             ->select('sub_categories.*','categories.name as cat_name')
            ->leftjoin('categories','categories.id','=','sub_categories.category_id')
            ->get();
//        echo "<pre>";
//        print_r($sub_categories);
//        exit();
        $categories=DB::Table('categories')->get();
      return view('admin.subcategories',array('subcategories'=>$sub_categories,'categories'=>$categories));

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
        // $file=$request->file('file');

        // $filename=$file->getClientOriginalName();
        // $file->move('public/uploads/sectors/',$filename);

      $data=array(
          'category_id'=>$request['category_id'],
          'name'=>$request['name'],
           // 'file_name'=>$filename
      );
        DB::Table('sub_categories')->insert($data);
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
      $subcategories= DB::Table('sub_categories')
          ->select('sub_categories.*','categories.name as cat_name','categories.description as description')
          ->leftjoin('categories','categories.id','=','sub_categories.category_id')
          ->where('category_id',$id)
          ->get();

      return $subcategories;
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
       $subcategory=DB::table('sub_categories')->where('id',$id)->get();
       return $subcategory;

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
       DB::Table('sub_categories')->where('id',$id)->delete();
       return back();
    }

    public function editsubcategory(Request $request){

        $file=$request->file('file');
         if(isset($file)){
             $filename=$file->getClientOriginalName();
             $file->move('public/uploads/sectors/',$filename);
             $data=array(
                 'category_id'=>$request['category_id'],
                 'name'=>$request['name'],
                 'file_name'=>$filename
             );
         }
        else{
            $data=array(
                'category_id'=>$request['category_id'],
                'name'=>$request['name']
            );
        }



        DB::Table('sub_categories')->where('id',$request['id'])->update($data);
        return back();
    }
}
