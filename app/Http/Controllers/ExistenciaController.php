<?php

namespace App\Http\Controllers;

use App\Models\Existencia;
use App\Http\Requests\StoreExistenciaRequest;
use App\Http\Requests\UpdateExistenciaRequest;
use Illuminate\Http\Request;

class ExistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function consultar(Request $request){
        try{
            if($request->has("query")){
                $item = Existencia::where('item_id','LIKE','%'.$request->get('query').'%')->get();
                return response()->json([
                    "isRequest"=> true,
                    "success" => true,
                    "messageError" => false,
                    "message" => "Consulta con : ".$request->get('query'),
                    "data" => $item
                ]);
            }else{
                $item = Existencia::all();
                return response()->json([
                    "isRequest"=> true,
                    "success" => true,
                    "messageError" => false,
                    "message" => "Todos los items",
                    "data" => $item
                ]);
            }
        }catch(\Exception $e){
            $message = $e->getMessage();
            $code = $e->getCode();
            return response()->json([
                "isRequest"=> true,
                "success" => false,
                "messageError" => true,
                "message" => $message." Code: ".$code,
                "data" => []
            ]);
        }   
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create_data(array $array){
        return Existencia::create($array);
    }
    public function store(StoreExistenciaRequest $request)
    {
        try{
            $response = $this->create_data($request->all());
            return response()->json([
                "isRequest"=> true,
                "success" => true,
                "messageError" => false,
                "message" =>  "Creado Correctamente",
                "data" => $response
            ]);
        }catch(\Exception $e){
            $message = $e->getMessage();
            $code = $e->getCode();
            return response()->json([
                "isRequest"=> true,
                "success" => false,
                "messageError" => true,
                "message" => $message." Code: ".$code,
                "data" => []
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Existencia $existencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Existencia $existencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_data(array $array, Existencia $existencia){
        return $existencia->update($array);
    }
    public function update(UpdateExistenciaRequest $request, Existencia $existencia)
    {
        try{
            $response = $this->update_data($request->all(), $existencia);
            return response()->json([
                "isRequest"=> true,
                "success" => $response,
                "messageError" => !$response,
                "message" => $response ? "Datos actualizados correctamente" : "Datos no actualizados",
                "data" => $response
            ]);
        }catch(\Exception $e){
            $message = $e->getMessage();
            $code = $e->getCode();
            return response()->json([
                "isRequest"=> true,
                "success" => false,
                "messageError" => true,
                "message" => $message." Code: ".$code,
                "data" => []
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Existencia $existencia)
    {
        try{
            $response = $existencia->delete();
            return response()->json([
                "isRequest"=> true,
                "success" => $response,
                "messageError" => !$response,
                "message" => $response ? "Datos eliminados correctamente" : "Los datos no pudieron ser eliminados",
                "data" => $response
            ]);
        }catch(\Exception $e){
            $message = $e->getMessage();
            $code = $e->getCode();
            return response()->json([
                "isRequest"=> true,
                "success" => false,
                "messageError" => true,
                "message" => $message." Code: ".$code,
                "data" => []
            ]);
        }
    }
}