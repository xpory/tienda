<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Empleado;
use App\http\Resources\Empleado as EmpleadoResource;

class EmpleadoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado = Empleado::all();
        return $this->sendResponse(EmpleadoResource::collection($empleado), 'Empleados traidos');
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
            'id_usuario' => 'required|integer',
            'sueldo' => 'required|doubleval',
            'precio_hora_extra' => 'required|doubleval',
            'precio_hora_nocturna' => 'required|doubleval',
            'sueldo' => 'required|doubleval',
            'isss' => 'required|doubleval',
            'afp_confia' => 'required|doubleval',
            'afp_crecer' => 'required|doubleval',
            'renta' => 'required|doubleval'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $empleado = Empleado::create($input);
        return $this->sendResponse(new EmpleadoResource($empleado), 'Empleado almacenado');
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
        $empleado = Empleado::find($id);
        if(is_null($empleado)){
            return $this->sendError('El empleado no existe');
        }
        return $this->sendResponse(new EmpleadoResource($empleado), 'empleado encontrado');
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
            'id_usuario' => 'required|integer',
            'sueldo' => 'required|doubleval',
            'precio_hora_extra' => 'required|doubleval',
            'precio_hora_nocturna' => 'required|doubleval',
            'sueldo' => 'required|doubleval',
            'isss' => 'required|doubleval',
            'afp_confia' => 'required|doubleval',
            'afp_crecer' => 'required|doubleval',
            'renta' => 'required|doubleval'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $empleado = Empleado::find($id);
        $empleado->id_usuario = $input['id_usuario'];
        $empleado->sueldo = $input['sueldo'];
        $empleado->precio_hora_extra = $input['precio_hora_extra'];
        $empleado->precio_hora_nocturna = $input['precio_hora_nocturna'];
        $empleado->isss = $input['isss'];
        $empleado->afp_confia = $input['afp_confia'];
        $empleado->afp_crecer = $input['afp_crecer'];
        $empleado->renta = $input['renta'];
        $empleado->save();
        return $this->sendResponse(new EmpleadoResource($empleado), 'Empleado actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return $this->sendResponse([], 'Empleado eliminado');
    }
}
