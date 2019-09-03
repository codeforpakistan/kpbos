<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CkanApi;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
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
			CURLOPT_URL => "http://13.76.133.211/api/3/action/package_search?q=".$keyword."&rows=200",
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
		$response_data_pg = json_decode($response);

        $page = Input::get('page', 1); // Get the ?page=1 from the url
        $perPage = 10; // Number of items per page
        $offset = ($page * $perPage) - $perPage;
        $response_data = new LengthAwarePaginator(
        	array_slice($response_data_pg->result->results, $offset, $perPage, true), // Only grab the items we need
    		count($response_data_pg->result->results), // Total items
    		$perPage,
    		$page,
    		['path' => $request->url(), 'query' => $request->query()]
    	);
        return view('partials.data',array('response_data'=>$response_data,'total_datasets'=>$response_data_pg));
    }
}
