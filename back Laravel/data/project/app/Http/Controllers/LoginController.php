<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(request $request)
    {
    	if($request->input('name') !== null && $request->input('password') !== null) {
    		if(User::where('name', $request->input('name'))->get()->first() !== null){
    			if(Hash::check($request->input('password'), User::where('name', $request->input('name'))->get()->first()->password)) {
     				return "Hey ! Tu veux un cookie ?";       				
    			}			
    		}
    	}
    	dd($request->input('name'));
    }
}
