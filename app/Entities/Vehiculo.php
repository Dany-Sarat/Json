<?php
namespace App\Entities;

class Vehiculo
{
    public function __construct(
        public readonly int $id = 0,
        public readonly string $placa,
        public readonly string $modelo,
        public readonly string $color,
        public readonly int $puertas,
    )
    {}
}