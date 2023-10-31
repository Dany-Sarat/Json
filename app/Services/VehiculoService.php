<?php
namespace App\Services;

use App\Entities\Vehiculo;
use App\Repositories\IVehiculoRepository;

class VehiculoService
{
    public function __construct(
        public readonly IVehiculoRepository $vehiculoRepository,
    )
    {}

    public function save(Vehiculo $vehiculo)
    {
        return $this->vehiculoRepository->save($vehiculo);
    }

    public function update(int $id, Vehiculo $vehiculo)
    {
        return $this->vehiculoRepository->update($id, $vehiculo);
    }
}