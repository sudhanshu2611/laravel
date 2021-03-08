<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalApi extends Controller
{
    //
	private $data;
	public function __construct($data){
		$this->data=$data;
	}
	
	public function getCurrentData(){
		
		return $this->data;
	}
	public static function getCurrentDataFunction(){
		
		return app(ExternalApi::class)->getCurrentData();
	}
	
	public static function setCurrentDataFunction($data){
		
		$externalapi= app(ExternalApi::class);
		$externalapi->data=$data;
		return $externalapi;
	}
}
