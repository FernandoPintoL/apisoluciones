<?php

namespace App\Http\Controllers;

use App\Models\TipoCambio;
use App\Http\Requests\StoreTipoCambioRequest;
use App\Http\Requests\UpdateTipoCambioRequest;
use Illuminate\Http\Request;

class TipoCambioController extends Controller
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
                $item = TipoCambio::where('id','LIKE','%'.$request->get('query').'%')->get();
                return response()->json([
                    "isRequest"=> true,
                    "success" => true,
                    "messageError" => false,
                    "message" => "Consulta con : ".$request->get('query'),
                    "data" => $item
                ]);
            }else{
                $item = TipoCambio::all();
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
    public function store(StoreTipoCambioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoCambio $tipoCambio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoCambio $tipoCambio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoCambioRequest $request, TipoCambio $tipoCambio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoCambio $tipoCambio)
    {
        //
    }
}