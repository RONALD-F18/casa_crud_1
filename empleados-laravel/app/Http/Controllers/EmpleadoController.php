<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use App\Services\EmpleadoService;

class EmpleadoController extends Controller
{
    protected $empleadoService;

    public function __construct(EmpleadoService $empleadoService)
    {
        $this->empleadoService = $empleadoService;
    }

    public function index()
    {
        $empleados = $this->empleadoService->getAllEmpleados();
        return response()->json($empleados);
    }

    public function show($id)
    {
        $empleado = $this->empleadoService->getEmpleadoById($id);
        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        return response()->json($empleado);
    }

    public function store(EmpleadoRequest $request)
    {
        $data = $request->validated();
        $empleado = $this->empleadoService->createEmpleado($data);
        return response()->json($empleado, 201);
    }

    public function update(EmpleadoRequest $request, $id)
    {
        $data = $request->validated();
        $empleado = $this->empleadoService->updateEmpleado($id, $data);
        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        return response()->json($empleado);
    }

    public function destroy($id)
    {
        $deleted = $this->empleadoService->deleteEmpleado($id);
        if (!$deleted) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        return response()->json(['message' => 'Empleado eliminado']);
    }
}
