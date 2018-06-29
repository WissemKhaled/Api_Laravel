<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;

class UserController extends Controller
{
    public function getAllUsers()
    {
    	return response()->json([
            'succes' => 'succes', 
            'succesMessage' => User::all()->load('roles')
          ]);
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


    }
    public function updateOne(Request $request)
    {
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

