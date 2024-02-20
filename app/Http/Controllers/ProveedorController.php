<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use Illuminate\Http\Request;

class ProveedorController extends Controller
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
                $item = Proveedor::where('propietario','LIKE','%'.$request->get('query').'%')->get();
                return response()->json([
                    "isRequest"=> true,
                    "success" => true,
                    "messageError" => false,
                    "message" => "Consulta con : ".$request->get('query'),
                    "data" => $item
                ]);
            }else{
                $item = Proveedor::all();
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
        return Proveedor::create($array);
    }
    public function store(StoreProveedorRequest $request)
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
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_data(array $array, Proveedor $proveedor){
        return $proveedor->update($array);
    }
    public function update(UpdateProveedorRequest $request, Proveedor $proveedor)
    {
        try{
            $response = $this->update_data($request->all(), $proveedor);
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
    public function destroy(Proveedor $proveedor)
    {
        try{
            $response = $proveedor->delete();
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