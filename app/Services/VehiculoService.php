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

    public function save(Vehiculo $vehiculo): bool
    {
        return $this->vehiculoRepository->save($vehiculo);
    }

    public function update(int $id, Vehiculo $vehiculo): bool
    {
        return $this->vehiculoRepository->update($id, $vehiculo);
    }

    public function findById(int $id): ?Vehiculo
    {
        return $this->vehiculoRepository->findById($id);
    }
}