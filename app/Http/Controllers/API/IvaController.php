<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Iva;
use App\Http\Resources\Iva as IvaResource;
class IvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iva = Iva::all();
        return $this->sendResponse(IvaResource::collection($iva), 'iva traidos');
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
            'cantidad' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $iva = Iva::create($input);

        return $this->sendResponse(new IvaResource($iva), 'iva almacenado');
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
        $iva = Iva::find($id);
        if(is_null($iva)){
            return $this->sendError('El iva no existe');
        }
        return $this->sendResponse(new IvaResource($iva), 'iva encontrado ');
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
            'cantidad' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $iva = Iva::find($id);
        $iva->nombre = $input['iva'];
        $iva->cantidad = $input['cantidad'];
        $iva->save();
        return $this->sendResponse(new IvaResource($iva), 'iva actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iva = Iva::find($id);
        $iva->delete();
        return $this->sendResponse([], 'Iva eliminado');
    }
}
