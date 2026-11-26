<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RolServices;
use App\Http\Requests\RequestRol;

class RolController extends Controller
{
    public function __construct(private RolService $rolService)
    {
    }

    // api/v1/rol/find post {}

    public function index()
    {
        $registros = $this->rolService->getAll();

        return response()->json([
            'message'  => "Se listaron los roles correctamente",
            'data' => $registros
        ], 200);
    }

    public function store(RequestRol $request)
    {
        $registroRol = $this->rolService->create($request->validated());

        return response()->json([
            'message' => 'El rol se creo correctamente',
            'datosRegistrados' => $registroRol
        ], 201);
    }

    public function show(string $id)
    {
        $registro = $this->rolService->getById($id);

        if(!registro)
        {
            return response()->json([
                'message' => 'No se encontro el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' =>'Se listo el registro correctamente',
            'data'=>$registro
        ], 200);
    }


    public function update(RequestRol $request, string $id)
    {
        $registroActualizado = $this->rolService->update($id, $request->validated());

              if(!registroActualizado)
        {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' =>'Se actualizo el registro correctamente',
            'data'=>$registroActualizado
        ], 200);
    }

    public function destroy(string $id)
    {
        $validar = $this->rolService->delete($id);
                      if(!validar)
        {
            return response()->json([
                'message' => 'No se encontro el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' =>'El rol se elimino correctamente',
        ], 200);
    }
}

