<?php

namespace App\Http\Controllers\Vehiculo;

use App\Entities\Vehiculo;
use App\Http\Controllers\Controller;
use App\Services\VehiculoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class VehiculoController extends Controller
{
    public function __construct(
        public readonly VehiculoService $vehiculoService,
    )
    {}

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            "placa" => "required|unique:vehiculos",
            "modelo" => "required",
            "color" => "required",
            "puertas" => "required|regex:/^\d+$/"
        ]);

        if($validator->fails()) {
            return new JsonResponse($validator->errors(), 
                Response::HTTP_BAD_REQUEST,
            );
        }

        $nuevoVehiculo = new Vehiculo(
            id: 0, 
            placa: $request->placa, 
            modelo: $request->modelo, 
            color: $request->color, 
            puertas: $request->puertas);

        $response = $this->vehiculoService->save($nuevoVehiculo);

        if($response) {
            return new JsonResponse([
                "msg" => "el vehiculo se registró con éxito",
            ],
                Response::HTTP_CREATED,
            );
        }

        return new JsonResponse([
            "msg" => "hubo un error al registrar el vehiculo", 
        ],
            Response::HTTP_INTERNAL_SERVER_ERROR,
        );
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            "puertas" => "regex:/^\d+$/",
        ]);

        if($validator->fails()) 
        {
            return new JsonResponse(
                $validator->errors(),
                Response::HTTP_BAD_REQUEST,
            );
        }

        $vehiculoActualizar = $this->vehiculoService->findById($id);

        if($vehiculoActualizar === null) {
            return new JsonResponse([
                "msg" => "vehiculo no encontrado"
            ],
                Response::HTTP_NOT_FOUND,
            );
        }

        $vehiculoActualizado = new Vehiculo(
            id: $vehiculoActualizar->id,
            placa: ($request->has("placa")) ? $request->placa : $vehiculoActualizar->placa,
            modelo: ($request->has("modelo")) ? $request->modelo : $vehiculoActualizar->modelo ,
            color: ($request->has("color")) ? $request->color : $vehiculoActualizar->color,
            puertas: ($request->has("puertas")) ? $request->puertas : $vehiculoActualizar->puertas,
        );


        $response = $this->vehiculoService->update($vehiculoActualizado->id, $vehiculoActualizado);
        
        if($response === false) {
            return new JsonResponse([
                "msg" => "ocurrió un error al actualizar",
            ],
                Response::HTTP_INTERNAL_SERVER_ERROR,
            );
        }

        return new JsonResponse([
            "msg" => "se actualizó correctamente",
        ],
            Response::HTTP_OK,
        );
    }
}
