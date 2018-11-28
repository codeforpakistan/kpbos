<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class publicationuploadController extends Controller
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
    $uploads=DB::Table('publication_uploads')->get();

     $publications=DB::Table('publications')->get();

     return view('admin.publication_uploads',array('uploads'=>$uploads,'publications'=>$publications));
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

            $file=$request->file('image');

            $filename=$file->getClientOriginalName();
            $file->move('public/uploads/publications/',$filename);

        $file=$request->file('cover');
        if(isset($file)){
            $coverpic=$file->getClientOriginalName();
            $file->move('public/uploads/publications/',$coverpic);
        }
        else{
            $coverpic='';
        }





        $data=array(
           'publication_id'=>$request['publication_id'],
           'file_name'=>$filename,
           'file_cover_pic'=>$coverpic,
           'file_title'=>$request['file_title'],
           'period'=>$request['period'],
           'created_at'=>$request['upload_date'],
           'type'=>$request['type']
        );
        DB::Table('publication_uploads')->insert($data);
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

        $data=DB::Table('publication_uploads')->where('id',$id)->get();
        $publications=DB::Table('publications')->get();
        return view('admin.edit_publication_uploads',array('data'=>$data,'publications'=>$publications));

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
       DB::Table('publication_uploads')->where('id',$id)->delete();
        return back();
    }

    public function update_publications_uploads(Request $request){
        $file=$request->file('image');
        if(isset($file)){
            $image=$file->getClientOriginalName();
            $file->move('public/uploads/publications/',$image);
        }
        else{
            $image=$request['old_image'];
        }



        $file=$request->file('cover');
        if(isset($file)){
            $coverpic=$file->getClientOriginalName();
            $file->move('public/uploads/publications/',$coverpic);
        }
        else{
            $coverpic=$request['old_cover'];
        }


        $data=array(
            'publication_id'=>$request['publication_id'],
            'file_name'=>$image,
            'file_cover_pic'=>$coverpic,
            'file_title'=>$request['file_title'],
            'period'=>$request['period'],
            'type'=>$request['type']
        );
        DB::Table('publication_uploads')->where('id',$request['id'])->update($data);
        return redirect('publications_uploads');



    }
}
