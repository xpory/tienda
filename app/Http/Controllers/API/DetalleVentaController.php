<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\DetalleVenta;
use App\Http\Resources\DetalleVenta as DetalleVentaResource;

class DetalleVentaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalleVenta = DetalleVenta::all();
        return $this->sendResponse(DetalleVentaResource::collection($detalleVenta), 'Detalle traidos');
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
        $input = $request->all();
        $validator = Validator::make($input,[
            'id_articulo' => 'required|integer',
            'cantidad' => 'required|integer',
            'subtotal' => 'required|doubleval'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $detalleVenta = DetalleVenta::create($input);
        return $this->sendResponse(new DetalleVentaResource($detalleVenta), 'Detalle almacenado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleVenta = DetalleVenta::find($id);
        if(is_null($detalleVenta)){
            return $this->sendError('El detalle no existe');
        }
        return $this->sendResponse(new DetalleVentaResource($detalleVenta), 'detalle encontrado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $input = $request->all();
        $validator = Validator::make($input,[
            'id_articulo' => 'required|integer',
            'cantidad' => 'required|integer',
            'subtotal' => 'required|doubleval'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $detalleVenta = DetalleVenta::find($id);
        $detalleVenta->id_articulo = $input['id_articulo'];
        $detalleVenta->cantidad = $input['cantidad'];
        $detalleVenta->subtotal = $input['subtotal'];
        $detalleVenta->save();
        return $this->sendResponse(new DetalleVentaResource($detalleVenta), 'Detalle actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalleVenta = DetalleVenta::find($id);
        $detalleVenta->delete();
        return $this->sendResponse([], 'Detalle eliminado');
    }
}
