<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "estamos en el controller de items";
    }

    public function consultar(Request $request){
        try{
            if($request->has("query")){
                $item = Item::where('detalle','LIKE','%'.$request->get('query').'%')->get();
                return response()->json([
                    "isRequest"=> true,
                    "success" => true,
                    "messageError" => false,
                    "message" => "Consulta con : ".$request->get('query'),
                    "data" => $item
                ]);
            }else{
                $item = Item::all();
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
    public function store(StoreItemRequest $request)
    {
        try{
            $item = Item::create($request->all());
            return response()->json([
                "isRequest"=> true,
                "success" => true,
                "messageError" => false,
                "message" => "Creado Correctamente",
                "data" => $item
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
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        try{
            $response = $item->update($request->all());
            return response()->json([
                "isRequest"=> true,
                "success" => true,
                "messageError" => false,
                "message" => "Datos actualizados correctamente",
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
    public function destroy(Item $item)
    {
        try{
            $request = $item->update(["isHabilitado"=> !$item->isHabilitado]);
            return response()->json([
                "isRequest"=> true,
                "success" => true,
                "messageError" => false,
                "message" => "Datos deshabilitado correctamente",
                "data" => $request
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

    public function build(Item $item)
    {
        try{
            $request = $item->update(["isHabilitado"=> true]);
            return response()->json([
                "isRequest"=> true,
                "success" => true,
                "messageError" => false,
                "message" => "Datos deshabilitado correctamente",
                "data" => $request
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

    public function uploadimage(Request $request){
        try{
            if($request->hasFile('file')){
                $extension = $request->file('file')->getClientOriginalExtension();
                $filename= $request->get("id").'.'.$extension;
                $path = $request->file('file')->storeAs('items', $filename);
                $item = Item::find($request->get("id"))->first();
                $item->update(['photo_path'=> "/storage/app/".$path]);
            }
            return response()->json([
                "isRequest"=> true,
                "success" => $request->hasFile('file'),
                "messageError" => !$request->hasFile('file'),
                "message" => $request->hasFile('file') ? "Archivos subidos" : "Archivos no subidos",
                "data" => []
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