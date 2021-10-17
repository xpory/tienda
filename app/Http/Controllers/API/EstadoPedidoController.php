<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\EstadoPedido;
use App\Http\Resources\EstadoPedido as EstadoPedidoResource;

class EstadoPedidoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadoPedido = EstadoPedido::all();
        return $this->sendResponse(EstadoPedidoResource::collection($estadoPedido), 'encabezado traidos');
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
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $estadoPedido = EstadoPedido::create($input);

        return $this->sendResponse(new EstadoPedidoResource($estadoPedido), 'estado de pedido almacenado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadoPedido = EstadoPedido::find($id);
        if(is_null($estadoPedido)){
            return $this->sendError('El encavezado no existe');
        }
        return $this->sendResponse(new EstadoPedidoResource($estadoPedido), 'estadop pedido encontrado ');
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
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $estadoPedido = EstadoPedido::find($id);
        $estadoPedido->nombre = $input['nombre'];
        $estadoPedido->descripcion = $input['descripcion'];
        $estadoPedido->save();
        return $this->sendResponse(new EstadoPedidoResource($estadoPedido), 'Estado de pedido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estadoPedido = EstadoPedido::find($id);
        $estadoPedido->delete();
        return $this->sendResponse([], 'Estado pedido eliminado');
    }
}
