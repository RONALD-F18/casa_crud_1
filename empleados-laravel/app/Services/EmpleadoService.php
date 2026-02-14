<?php

namespace App\Services;
use App\Repositories\Interfaces\EmpleadoInterface;

class EmpleadoService
{
    protected $empleadoRepository;

    public function __construct(EmpleadoInterface $empleadoRepository)
    {
        $this->empleadoRepository = $empleadoRepository;
    }

    public function getAllEmpleados()
    {
        return $this->empleadoRepository->getAllEmpleados();
    }

    public function getEmpleadoById($id)
    {
        return $this->empleadoRepository->getEmpleadoById($id);
    }

    public function createEmpleado(array $data)
    {
        return $this->empleadoRepository->createEmpleado($data);
    }

    public function updateEmpleado($id, array $data)
    {
        return $this->empleadoRepository->updateEmpleado($id, $data);
    }

    public function deleteEmpleado($id)
    {
        return $this->empleadoRepository->deleteEmpleado($id);
    }
}