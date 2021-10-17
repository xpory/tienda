<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Proveedor;
use App\Http\Resources\Proveedor as ProveedorResource;
class ProveedorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedor = Proveedor::all();
        return $this->sendResponse(ProveedorResource::collection($proveedor), 'proveedores traidos');
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
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
            'estado' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $proveedor = Proveedor::create($input);

        return $this->sendResponse(new ProveedorResource($proveedor), 'el proveedor a sido almacenado');
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
        $proveedor = Proveedor::find($id);
        if(is_null($proveedor)){
            return $this->sendError('El proveedor no existe');
        }
        return $this->sendResponse(new ProveedorResource($proveedor), 'el proveedor a sido encontrado ');
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
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
            'estado' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $proveedor = Proveedor::find($id);
        $proveedor->nombre = $input['nombre'];
        $proveedor->telefono = $input['telefono'];
        $proveedor->direccion = $input['direccion'];
        $proveedor->correo = $input['correo'];
        $proveedor->estado = $input['estado'];
        $proveedor->save();
        return $this->sendResponse(new ProveedorResource($proveedor), 'el proveedor a sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        return $this->sendResponse([], 'Proveedor a sido eliminado');
    }
}
