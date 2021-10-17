<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\PedidosProveedor;
use App\Http\Resources\PedidosProveedor as PedidosProveedorResource;

class PedidosProveedorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidosProveedor = PedidosProveedor::all();
        return $this->sendResponse(PedidosProveedorResource::collection($pedidosProveedor), 'Pedidos proveedor traidos');
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
            'id_proveedor' => 'required|integer',
            'id_detalle_pedido_proveedor' => 'required',
            'fecha_solicitud' => 'required',
            'id_estado_pedido' => 'required',
            'total' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $pedidosProveedor = PedidosProveedor::create($input);

        return $this->sendResponse(new PedidosProveedorResource($pedidosProveedor), 'Pedido al proveedor almacenado');
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
        $pedidosProveedor = PedidosProveedor::find($id);
        if(is_null($pedidosProveedor)){
            return $this->sendError('pedido al proveedor no existe');
        }
        return $this->sendResponse(new PedidosProveedorResource($pedidosProveedor), 'estadop pedido encontrado ');
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
            'id_proveedor' => 'required|integer',
            'id_detalle_pedido_proveedor' => 'required',
            'fecha_solicitud' => 'required',
            'id_estado_pedido' => 'required',
            'total' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $pedidosProveedor = PedidosProveedor::find($id);
        $pedidosProveedor->id_proveedor = $input['nombre'];
        $pedidosProveedor->id_detalle_pedido_proveedor = $input['id_detalle_pedido_proveedor'];
        $pedidosProveedor->fecha_solicitud = $input['fecha_solicitud'];
        $pedidosProveedor->id_estado_pedido = $input['id_estado_pedido'];
        $pedidosProveedor->total = $input['total'];
        $pedidosProveedor->save();
        return $this->sendResponse(new PedidosProveedorResource($pedidosProveedor), 'Pedidos al proveedor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedidosProveedor = PedidosProveedor::find($id);
        $pedidosProveedor->delete();
        return $this->sendResponse([], 'Pedidos al proveedor eliminado');
    }
}
