<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculoDto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "id",
        "marca",
        "modelo",
        "color",
        "puertas"
    ];

    protected $table = "vehiculos";
}
