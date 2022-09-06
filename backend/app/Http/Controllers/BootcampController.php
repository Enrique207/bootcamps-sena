<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBootcampRequest;
use App\Http\Resources\BootcampResource;
use App\Http\Resources\BootcampCollection;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "aqui se va a mostrar todo los bootcamp";
        return response()->json(new BootcampCollection(Bootcamp::all())
                                , 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest $request)
    {
        //1. establecer reglas de validacion
        //2 Crear objeto validador
        //3. validar
        //verificar que llego aqui 
        //Del payload
        
        $b = Bootcamp::create(
            $request->all()
        );
        return response(["success"=> true,
                        "data"=>$b], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo "mostrar un bootcamp cuyo id es: $id";
                return response()->json([ 'success' => true,
                                        "data" =>  new BootcampResource(Bootcamp::find($id))
                                        ], 200 );
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
        //1. Seleccionar el bootcamp por id
        $bootcamp = Bootcamp::find($id);  
        //2. Actualizar
        $bootcamp->update(
            $request->all()
        );
    
        //3. Hacer el Response respectivo
        return response()->json( ["success"=> true,
                                  "data"=> new BootcampResource ($bootcamp)
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
        //1. seleccionar el bootcamp por id
        $bootcamp = Bootcamp::find($id); 
        //2. Eliminar
        $bootcamp->delete(); 
        //3. Responder 
        return response()->json(["success"=> true,
                                 "message"=> "Bootcamp eliminado",
                                "data"=> new BootcampCollection ($bootcamp->id)
                                ] , 200);
    }
}
