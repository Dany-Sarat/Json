<x-layouts.app>
    <h1 class="text-center my-5 font-light text-3xl">Vehiculos</h1>

    <div class="flex flex-col gap-4">
        <a href="{{route("vehiculos.create")}}" class="rounded-md bg-blue-500 p-4 block max-w-[200px] mx-auto text-gray-200">
            Crear Nuevo Vehiculo
        </a>
    
        <a href="{{route("vehiculos.update")}}" class="rounded-md bg-yellow-500 p-4 block max-w-[200px] mx-auto text-gray-800">
            Actualizar Vehiculo
        </a>
    </div>
</x-layouts.app>