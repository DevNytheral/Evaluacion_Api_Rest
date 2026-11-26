<?php
 
namespace App\Http\Controllers;
 
use App\Services\UsuarioService;
use App\Http\Requests\RequestUsuario;
 
class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService)
    {
    }
 
    // api/v1/rol/find post {}
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->usuarioService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los usuarios correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(RequestUsuario $request)
    {
        $registroUsuario = $this->usuarioService->create($request->validated());
               
        return response()->json([
            'message' => 'El rol se creó correctamente',
            'datosRegistrados' => $registroUsuario
        ], 201);
    }
 
   //Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->usuarioService->getById($id);
 
        if(!registro)
        {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'se listó el registro correctamente',
            'data'=>$registro
        ], 200);
    }
 
 
    //Actualizar un registro
    public function update(RequestUsuario $request, string $id)
    {
        $registroActualizado = $this->usuarioService->update($id, $request->validated());
 
              if(!registroActualizado)
        {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'se actualizó el registro correctamente',
            'data'=>$registroActualizado
        ], 200);
    }
 
    //Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->usuarioService->delete($id);
               if(!validar)
        {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' =>'El rol se eliminó correctamente',
        ], 200);
    }
}