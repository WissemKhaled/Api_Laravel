<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;

class UserController extends Controller
{
    public function getAllUsers()
    {
    	return User::all()->load('roles');
    }

    public function getOneUser(Request $request)
    {
    	$user = User::find($request->id);
    	if($user == null) {
    		return response([
    			'status' => 'User not find'
    		]);
    	} else {
        $user->load('roles');
    		return response([
	       		'status' => 'show 1', 
	       		'data' => $user
       		]);
    	}

    }

    public function deleteOne(Request $request)
    {
      if($request->input('id') !== null){
        $userToDelete = User::find($request->input('id'));
        if($userToDelete !== null) {
          $userToDelete->delete();
          return response()->json([
            'success' => 'User deleted',
            'succesMessage' => 'User deleted'
          ]);
        }
      }
      return response()->json([
        'error' => 'Cannot delete user',
        'errorMessage' => 'Syntax error'
      ]);
      // Ma methode
      /*
    	User::destroy($request->id);
    	if($user == null) {
    		return response([
    			'status' => 'User not find'
    		]);
    	} else {
    		return response([
       			'status' => 'delete 1',
       		]);
    	}*/

    }

    public function insertOne(Request $request)
    {
      
      $user = new User;
      // My methode
      $user->name = $request->name;
      $user->password = bcrypt('$request->name');
      $user->save();
      $user->roles()->attach($request->input('role') !== null ? $request->input('role') :1);
      return response()->json([
        'status' => 'add 1',
        'succesMessage' => $password
      ]);
      //Another methode
      /* if($request->input('name') !== null) {

        // @TODO find a solution less greedy 

        if(User::where('name', request->name)->get()->first() === null) {
        $user->name = $request->input('name');
        $password = st_random(15);
        $user->password = bcrypt($password);
        $user->save();
        return response()->json([
        'success' => 'New user create',  
        'succesMessage' => $password
        ]);
      }
      }
      return response()->json([
      'error' => 'Cannot Insert User',
      'errorMessage' => 'Read the docs, you're have some bug maybe'
      ]);
      */

    }
    public function updateOne(Request $request)
    {/*
    	$user = User::find($request->id);
		if($user == null) {
    		return response([
    			'status' => 'User not find'
    		]);
    	} else {
	    	$user->name = $request->name;
	       	$user->password = bcrypt($request->password);
	       	$user->save();
	       	return response([
	       		'status' => 'update 1',
	       		'data' => $user
       		]);
       }
       /*/
       $name = $request->input('name');
       if($request->id !== null){
       	$user = User::find($request->id);
       	if($user !== null) {
       		$newName = $name;
          $user->name = $newName;
          $user->save();
          return response()->json([
            'succes' =>'user update',
            'succesMessage' => User::find($request->id)
          ]);
       	}
       }
		return response()->json([
		'error' => 'Cannot find user',
		'errir Message' => 'Wrong data send inside request, or no user match this id'
		]);     
  }

    public function insertMany(Request $request) {
    	$users = [];
    	for ($i = 0; $i < count($request->name); $i ++) { 
    		$user = new User;
    		$user->name = $request->name[$i];
    		$user->password = bcrypt($request->password[$i]);
    		$user->save();
    		$users[$i] = $user;
    	}
    	return response()->json ([
    		'status' => 'insert done',
    		'data' => $users
    	]);
    }
}
