<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
   return all users
     */
    public function index()
    {
        //
      
         $users = User::all();
    return response()->json($users);
    }

  

    /*
     insert new user to our DB
     */
    public function store(Request $request)
    {
        //
         $user = new User();
       // $user->id= $request->id;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password for security
        $user->save();
      

        return response()->json(['message' => 'User created successfully'], 201);

    }

    /*
     return one user
     */
    public function show($id)
    {
    
        //
        $user = User::findOrFail($id); 

        return response()->json($user);
    }

 

    /**
     * Update user if need be
     */
    public function update(Request $request,  $id)
    {
        //
        $user = User::findOrFail($id);
        $user->update($request->all());
        echo "updating...";
          $user->update($request->validated());
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //

           $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message'  => 'User deleted successfully']); 
    }
}
