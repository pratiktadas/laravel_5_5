<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Excel;
use App\Exports\UsersExport;

class AuthenticationController extends Controller
{
    
	public function authenticate(Request $request){
		$credentials = $request->only('email','password');
		//dd(JWTAuth::attempt(["email" => $request->email, "password" => $request->password]));
		if(!$token = JWTAuth::attempt($credentials)){
			return response()->json("invalid credentials");
		}

		return response()->json([
			"token" => $token,
			"status" => "success" 
		]);	
	}


	public function get_users(){
		$users = User::get()->toArray();
		return response()->json($users);
	}


	public function export_to_excel(Request $request){
		/*$data = User::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {

			$excel->sheet('mySheet', function($sheet) use ($data)
	     	{
				$sheet->fromArray($data);
	        });
		})->download($type);*/	
		return Excel::download(new UsersExport, 'users.xlsx');
	}

}
