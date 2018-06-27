<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role as Role;

class RoleController extends Controller
{
    public function getAllUsers()
    {
    	return Role::all();
    }

    public function insertOne(Request $request)
    {    	
    	$role = new Role;
     	$role->name = $request->input('name');
      	$role->save();
      	return response([
        	'status' => 'add 1',
        	'data' => [
        		'role' =>$newUser->roles[0]->name,
        		'password' => $password,
        	]
      	]);
	}
	public function deleteOne(Request $request)
    {
      if($request->input('id') !== null){
        $roleToDelete = Role::find($request->input('id'));
        if($roleToDelete !== null) {
          $roleToDelete->delete();
          return response()->json([
            'success' => 'Role deleted',
            'succesMessage' => 'Role deleted'
          ]);
        }
      }
      return response()->json([
        'error' => 'Cannot delete role',
        'errorMessage' => 'Syntax error'
      ]);
    }
     public function updateOne(Request $request)
    {
       $name = $request->input('name');
       if($request->id !== null){
       	$role = Role::find($request->id);
       	if($role !== null) {
       		$newName = $name;
          $role->name = $newName;
          $role->save();
          return response()->json([
            'succes' =>'role update',
            'succesMessage' => Role::find($request->id)
          ]);
       	}
    }
	return response()->json([
	'error' => 'Cannot find role',
	'errir Message' => 'Wrong data send inside request, or no role match this id'
	]);
    }
}
