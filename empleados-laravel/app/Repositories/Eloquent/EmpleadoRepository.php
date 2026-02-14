<?php

namespace App\Repositories\Eloquent;
use App\Models\Empleado;
use App\Repositories\Interfaces\EmpleadoInterface;

class EmpleadoRepository implements EmpleadoInterface
{
    public function getAllEmpleados()
    {
        return Empleado::all();
    }

    public function getEmpleadoById($id)
    {
        return Empleado::findOrFail($id);
    }

    public function createEmpleado(array $data)
    {
        return Empleado::create($data);
    }

    public function updateEmpleado($id, array $data)
    {
        $empleado = Empleado::findOrFail($id);
        if ($empleado->update($data)) {
            return $empleado;
        }
        return null;
    }

    public function deleteEmpleado($id)
    {
        $empleado = Empleado::findOrFail($id);
        
        if ($empleado->delete()) {
            return true;
        }       
        return false;
    }
    
}