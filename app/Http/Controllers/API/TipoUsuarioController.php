<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\TipoUsuario;
use App\Http\Resources\TipoUsuario as TipoUsuarioResource;

class TipoUsuarioController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoUsuario = TipoUsuario::all();
        return $this->sendResponse(TipoUsuarioResource::collection($tipoUsuario), 'Tipos de usuarios traidos');
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
        $tipoUsuario = TipoUsuario::create($input);
        return $this->sendResponse(new TipoUsuarioResource($tipoUsuario), 'Tipo de usuario creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoUsuario = TipoUsuario::find($id);
        if(is_null($tipoUsuario)){
            return $this->sendError('El tipo de usuario no existe');
        }
        return $this->sendResponse(new TipoUsuarioResource($tipoUsuario), 'Tipo de usuario encontrado.');
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
            'descripcion' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $tipoUsuario = TipoUsuario::find($id);
        $tipoUsuario->nombre = $input['nombre'];
        $tipoUsuario->descripcion = $input['descripcion'];
        $tipoUsuario->save();
        return $this->sendResponse(new TipoUsuarioResource($tipoUsuario), 'Tipo de usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoUsuario = TipoUsuario::find($id);
        $tipoUsuario->delete();
        return $this->sendResponse([], 'Tipo de usuario eliminado.');
    }
}
