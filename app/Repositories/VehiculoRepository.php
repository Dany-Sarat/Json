<?php
namespace App\Repositories;

use App\Entities\Vehiculo;
use App\Models\VehiculoDto;

class VehiculoRepository implements IVehiculoRepository
{
    public function __construct()
    {
    }

    public function save(Vehiculo $vehiculo): bool
    {
        $vehiculoDto = new VehiculoDto();
        $vehiculoDto->marca = $vehiculo->placa;
        $vehiculoDto->modelo = $vehiculo->modelo;
        $vehiculoDto->color = $vehiculo->color;
        $vehiculoDto->puertas = $vehiculo->puertas;
        
        return $vehiculoDto->save();
    }

    public function update(int $id, Vehiculo $vehiculo): bool
    {
        $vehiculoDto =  VehiculoDto::find($id);

        if($vehiculoDto == null) {
            return false;
        }

        $vehiculoDto->placa = $vehiculo->placa;
        $vehiculoDto->modelo = $vehiculo->modelo;
        $vehiculoDto->color = $vehiculo->color;
        $vehiculoDto->puertas = $vehiculo->puertas;

        return $vehiculoDto->save();
    }

}