<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Categoria;
use App\Http\Resources\Categoria as CategoriaResource;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::all();
        return $this->sendResponse(CategoriaResource::collection($categoria), 'Categoria traidos');
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
            'descripcion' => 'required',
            'estado' => 'required|boolean'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $categoria = Categoria::create($input);
        return $this->sendResponse(new CategoriaResource($categoria), 'Categoria creada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        if(is_null($categoria)){
            return $this->sendError('La categoria no existe');
        }
        return $this->sendResponse(new CategoriaResource($categoria), 'Categoria encontrada.');
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required|boolean'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $categoria = Categoria::find($id);
        $categoria->nombre = $input['nombre'];
        $categoria->descripcion = $input['descripcion'];
        $categoria->estado = $input['estado'];
        $categoria->save();
        return $this->sendResponse(new CategoriaResource($categoria), 'Categoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return $this->sendResponse([], 'Tipo de usuario eliminado.');
    }
}
