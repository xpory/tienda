<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Articulo;
use App\Http\Resources\Articulo as ArticuloResource;

class ArticuloController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulo = Articulo::all();
        return $this->sendResponse(ArticuloResource::collection($articulo), 'Articulos traidos');
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
            'id_categoria' => 'required',
            'codigo' => 'required',
            'nombre' => 'required',
            'id_proveedor' => 'required',
            'precio_venta' => 'required',
            'stock' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'estado' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $articulo = Articulo::create($input);
        return $this->sendResponse(new ArticuloResource($articulo), 'Articulo creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::find($id);
        if(is_null($articulo)){
            return $this->sendError('El articulo no existe');
        }
        return $this->sendResponse(new ArticuloResource($articulo), 'Articulo encontrado.');
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
            'id_categoria' => 'required',
            'codigo' => 'required',
            'nombre' => 'required',
            'id_proveedor' => 'required',
            'precio_venta' => 'required',
            'stock' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'estado' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $articulo = Articulo::find($id);
        $articulo->id_categoria = $input['id_categoria'];
        $articulo->codigo = $input['codigo'];
        $articulo->nombre = $input['nombre'];
        $articulo->id_proveedor = $input['id_proveedor'];
        $articulo->precio_venta = $input['precio_venta'];
        $articulo->stock = $input['stock'];
        $articulo->descripcion = $input['descripcion'];
        $articulo->imagen = $input['imagen'];
        $articulo->estado = $input['estado'];
        $articulo->save();
        return $this->sendResponse(new ArticuloResource($articulo), 'Articulo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        return $this->sendResponse([], 'Articulo eliminado.');
    }
}
