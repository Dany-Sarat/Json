<?php
namespace App\Repositories;
use App\Entities\Vehiculo;


interface IVehiculoRepository 
{
    public function save(Vehiculo $vehiculo): bool;
    public function update(int $id, Vehiculo $vehiculo): bool;
}