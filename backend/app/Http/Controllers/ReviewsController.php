<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json((Review::all())
                                , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
          /*var_dump($request->all());
        echo "<hr />";
        var_dump($id);*/
        //Crear la revision
        $revision = new Review();
        $revision->title = $request->title;
        $revision->text = $request->text;
        $revision->rating = $request->rating;
        $revision->bootcamp_id = $id;
        $revision->user_id = $id;
        $revision->save();
        //enviar response
        return response()->json([ 
            "success" => true,
            "data" => $revision
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            return response()->json(  [ "success" => true ,
                                       "data" => Review::find($id)
                                      ] , 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $revision = Review::find($id);
        $revision->update(
            $request->all()
        );
        return response()->json(["sucess" => true,
                                 "data" => $revision
                                 ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
