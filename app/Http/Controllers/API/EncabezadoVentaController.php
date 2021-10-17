<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\EncabezadoVenta;
use App\Http\Resources\EncabezadoVenta as EncabezadoVentaResource;
class EncabezadoVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encabezadoVenta = EncabezadoVenta::all();
        return $this->sendResponse(EncabezadoVentaResource::collection($encabezadoVenta), 'encabezado traidos');
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
            'id_empleado' => 'required|integer',
            'id_usuario' => 'required|integer',
            'numero_caja' => 'required|integer',
            'deposito' => 'required|doubleval',
            'devolucion' => 'required|doubleval',
            'total' => 'required|doubleval',
            'creado' => 'required',
            'descuento' => 'required|doubleval',
            'es_enlinea' => 'required|boolean',
            'id_estado_venta' => 'required|integer',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $encabezadoVenta = EncabezadoVenta::create($input);

        return $this->sendResponse(new EncabezadoVentaResource($encabezadoVenta), 'encabezado almacenado');
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
        $encabezadoVenta = EncabezadoVenta::find($id);
        if(is_null($encabezadoVenta)){
            return $this->sendError('El encavezado no existe');
        }
        return $this->sendResponse(new EncabezadoVentaResource($encabezadoVenta), 'Encavezado encontrado ');
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
            'id_empleado' => 'required|integer',
            'id_usuario' => 'required|integer',
            'numero_caja' => 'required|integer',
            'deposito' => 'required|doubleval',
            'devolucion' => 'required|doubleval',
            'total' => 'required|doubleval',
            'creado' => 'required',
            'descuento' => 'required|doubleval',
            'es_enlinea' => 'required|boolean',
            'id_estado_venta' => 'required|integer',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $encabezadoVenta = EncabezadoVenta::find($id);
        $encabezadoVenta->id_empleado = $input['id_usuario'];
        $encabezadoVenta->id_usuario = $input['sueldo'];
        $encabezadoVenta->numero_caja = $input['precio_hora_extra'];
        $encabezadoVenta->deposito = $input['precio_hora_nocturna'];
        $encabezadoVenta->devolucion = $input['isss'];
        $encabezadoVenta->total = $input['afp_confia'];
        $encabezadoVenta->creado = $input['afp_crecer'];
        $encabezadoVenta->descuento = $input['renta'];
        $encabezadoVenta->es_enlinea = $input['renta'];
        $encabezadoVenta->id_estado_venta = $input['renta'];
        $encabezadoVenta->save();
        return $this->sendResponse(new EncabezadoVentaResource($encabezadoVenta), 'Ecabezado actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encabezadoVenta = EncabezadoVenta::find($id);
        $encabezadoVenta->delete();
        return $this->sendResponse([], 'Empleado eliminado');
    }
}
