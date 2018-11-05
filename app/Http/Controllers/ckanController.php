<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CkanApi;
use DateTime;

class ckanController extends Controller
{
    //

    public function ckan(){
        echo "Hello bilawal u are here";

        $url = 'http://demo.ckan.org/api/3/action/group_list';

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec ($ch);
        $info = curl_getinfo($ch);
        $http_result = $info ['http_code'];

      echo "<pre>";
      print_r($output);

        echo "<pre>";
        print_r($info);

        echo "<pre>";
        print_r($http_result);
      exit();

        echo "done";

    }

    public function ckanapi(){

        $info=   CkanApi::dataset()->all();
        echo "<pre>";
        print_r($info);
        exit();
        $count= count($info);
        for($i=0;$i<=$count;$i++){
            $result2 = $info['result']['results'][$i];
            echo $result2['notes'];
            echo "<pre>";
            print_r($result2);
        }
        exit();
        $result2 = $info['result']['results'][0];
        echo "<pre>";
        print_r($result2);
        exit();

    }
    public function datasetcreate(Request $request){
        $name=$request['name'];
        $title=$request['title'];

         return CkanApi::dataset()->create([
        'name' => $name . rand(1, 1000),
        'title' => $name . rand(1, 1000),
        'owner_org' => 'bos',
        'private' => 'False',
            ]);
    }
    public function search(Request $request){


        $keyword = preg_replace('/\s+/', '_', $request->input('keyword'));


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://13.76.133.211/api/3/action/package_search?q=".$keyword,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Postman-Token: 17c52f14-c925-4d38-a339-34d02ac9e239"
            ),
        ));

        $response = curl_exec($curl);
        $response_data = json_decode($response);

//        echo "<pre>";
//        print_r($response_data);
//        exit();

        return view('partials.data',array('response_data'=>$response_data));


        $result2 = $response_data->result;
        foreach ($result2->results as $key => $value){
            foreach ($value->resources as $key2 => $value2) {
                echo "<pre>";
                var_dump('link ' . $value2->url.' description : '.$value2->description );
            }
            echo '<pre>';
            var_dump('dataset description: '.$value->notes);
            echo '<pre>';
            var_dump('dataset Title: '.$value->title);
        }


    }




}
