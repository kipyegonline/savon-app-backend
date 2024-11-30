<?php

namespace App\Http\Controllers;

use App\Models\photos;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $photos= photos::all();
    return response()->json($photos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         //
         $photo = new photos();
       // $photo->id= $request->id;
        $photo->album_id = $request->album_id;
        $photo->title = $request->title;
         $photo->image_url = $request->image_url;
       
        $photo->save();
        return response()->json(['message' => 'Photo uploaded successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function show(photos $id)
    {
        //
          $photo = photos::findOrFail($id); 

        return response()->json($photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function edit(photos $photos)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
           $photo = photos::findOrFail($id);
       
        $photo->update(["title"=>$request->title]);
     
          
        return response()->json(["Message"=>"Title updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function destroy(photos $photos)
    {
        //
    }
}
