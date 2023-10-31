<x-layouts.app>
    <h1 class="font-light text-3xl text-center my-5">Nuevo Vehiculo</h1>

    <p class="hidden p-2 text-center bg-red-200 text-red-900 rounded-md w-1/2 mx-auto" id="mensaje_error"> 
    </p>

    <p class="hidden text-center bg-emerald-300 text-gray-900 w-1/2 rounded-md p-2 mx-auto" id="mensaje_exito">
    </p>

    <div class="max-w-5xl mx-auto my-5 shadow-xl p-5">
        <form class="w-full" id="crear_vehiculo_form">
            <div class="flex flex-col gap-2">
                <label  for="placa" class="text-lg">Placa:</label>
                <input class="border rounded-md border-gray-300 focus:border-none focus:outline-2 focus:outline-blue-300 p-2" 
                    type="text" class="" name="placa" id="placa" placeholder="Placa...">
            </div>

            <div class="flex flex-col gap-2">
                <label  for="placa" class="text-lg">Modelo:</label>
                <input class="border rounded-md border-gray-300 focus:border-none focus:outline-2 focus:outline-blue-300 p-2" 
                    type="text" class="" name="modelo" id="modelo" placeholder="Modelo...">
            </div>

            <div class="flex flex-col gap-2">
                <label  for="placa" class="text-lg">Color:</label>
                <input class="border rounded-md border-gray-300 focus:border-none focus:outline-2 focus:outline-blue-300 p-2" 
                    type="text" class="" name="color" id="color" placeholder="Color...">
            </div>

            <div class="flex flex-col gap-2">
                <label  for="placa" class="text-lg">No. Puertas:</label>
                <input class="border rounded-md border-gray-300 focus:border-none focus:outline-2 focus:outline-blue-300 p-2" 
                    type="text" class="" name="puertas" id="puertas" placeholder="Puertas...">
            </div>    

            <div class="flex justify-center">
                <input class="my-5 bg-blue-500 text-gray-200 rounded-md p-2 hover:cursor-pointer" type="submit" value="Crear Nuevo">
            </div>
        </form>
    </div>

    <div class="flex justify-center">
        <a href="{{route("home.index")}}" class="p-2 bg-gray-200 border border-gray-400 rounded-md">ir a inicio</a>
    </div>

    @vite(["resources/js/crear_vehiculo.js"])
</x-layouts.app>