<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $albums = Album::all();
    return response()->json($albums);
    }

   
    public function store(Request $request)
    {
        //
        $album= new Album();
        ["user_id"=>$user_id,'title'=>$title]=$request;
      
        $album::create(["user_id"=>$user_id,'title'=>$title]);
           return response()->json(['message' => 'album created successfully'], 201);

    }

  

    /*
   we simpliy remove an album
     */
    public function destroy($id)
    {
        //
          $album = Album::findOrFail($id);
         $album ->delete();
        return response()->json(['message'  => 'Album deleted successfully']); 
    
    }
}
