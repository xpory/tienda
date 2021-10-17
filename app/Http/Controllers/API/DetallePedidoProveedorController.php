<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\DetallePedidoProveedor;
use App\Http\Resources\DetallePedidoProveedor as DetallePedidoProveedorResource;

class DetallePedidoProveedorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallePedidoProveedor = DetallePedidoProveedor::all();
        return $this->sendResponse(DetallePedidoProveedorResource::collection($detallePedidoProveedor), 'Detalle traidos');
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
            'precio_unitario' => 'required|doubleval',
            'cantidad' => 'required|integer',
            'subtotal' => 'required|doubleval'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $detallePedidoProveedor = DetallePedidoProveedor::create($input);
        return $this->sendResponse(new DetallePedidoProveedorResource($detallePedidoProveedor), 'Detalle almacenado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detallePedidoProveedor = DetallePedidoProveedor::find($id);
        if(is_null($detallePedidoProveedor)){
            return $this->sendError('La categoria no existe');
        }
        return $this->sendResponse(new DetallePedidoProveedorResource($detallePedidoProveedor), 'detalle encontrado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'precio_unitario' => 'required|doubleval',
            'cantidad' => 'required|integer',
            'subtotal' => 'required|doubleval'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $detallePedidoProveedor = DetallePedidoProveedor::find($id);
        $detallePedidoProveedor->id_articulo = $input['id_articulo'];
        $detallePedidoProveedor->precio_unitario = $input['precio_unitario'];
        $detallePedidoProveedor->cantidad = $input['cantidad'];
        $detallePedidoProveedor->subtotal = $input['subtotal'];
        $detallePedidoProveedor->save();
        return $this->sendResponse(new DetallePedidoProveedorResource($detallePedidoProveedor), 'Detalle actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detallePedidoProveedor = DetallePedidoProveedor::find($id);
        $detallePedidoProveedor->delete();
        return $this->sendResponse([], 'Detalle eliminado');
    }
}
