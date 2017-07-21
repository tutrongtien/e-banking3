<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegiserAPIController extends Controller
{
	// get all name city
    public function loadCity() 
    {
    	$string = file_get_contents("../app/file/City_district_VN/tinh_tp.json");   
		$json_file = json_decode($string, true);

		return response($json_file, 201);
    }

    //get all district of city
    public function loadDistrictByCity(Request $request) 
    {
    	$data = $request->all();
		$string = file_get_contents("../app/file/City_district_VN/quan_huyen.json");   
		$json_file = json_decode($string, true);

		foreach($json_file as $json){		
			if($json['parent_code'] == $data['code']){
				$arr[] = $json;
			}
		}

		return response($arr, 201);
    }
}
