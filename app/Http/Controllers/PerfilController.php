<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Http\Requests\StorePerfilRequest;
use App\Http\Requests\UpdatePerfilRequest;
use Illuminate\Http\Request;

class PerfilController extends Controller
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
                $item = Perfil::where('name','LIKE','%'.$request->get('query').'%')->get();
                return response()->json([
                    "isRequest"=> true,
                    "success" => true,
                    "messageError" => false,
                    "message" => "Consulta con : ".$request->get('query'),
                    "data" => $item
                ]);
            }else{
                $item = Perfil::all();
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
        return Perfil::create($array);
    }
    public function store(StorePerfilRequest $request)
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
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perfil $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_data(array $array, Perfil $perfil){
        return $perfil->update($array);
    }
    public function update(UpdatePerfilRequest $request, Perfil $perfil)
    {
        try{
            $response = $this->update_data($request->all(), $perfil);
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
    public function destroy(Perfil $perfil)
    {
        try{
            $response = $perfil->delete();
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