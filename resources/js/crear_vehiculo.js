const vehiculo = {
    placa: document.getElementById("placa"),
    modelo: document.getElementById("modelo"),
    color: document.getElementById("color"),
    puertas: document.getElementById("puertas"),
}

const crear_vehiculo_form = document.getElementById("crear_vehiculo_form")
const mensajeError = document.getElementById("mensaje_error")
const mensajeExito = document.getElementById("mensaje_exito")

crear_vehiculo_form.addEventListener("submit", async (e) => {
    e.preventDefault();

    if (verificarCamposVacíos(vehiculo)) {
        setTimeout(() => {
            mensajeError.style.display = "none"
            mensajeError.textContent = " "
        }, 3000);
        mensajeError.style.display = "block"
        mensajeError.textContent = "Error, asegurese de llenar todos los campos*";

        return
    }

    try {
        const response = await axios.post(import.meta.env.VITE_API_URL, {
            placa: vehiculo.placa.value,
            modelo: vehiculo.modelo.value,
            color: vehiculo.color.value,
            puertas: vehiculo.puertas.value
        })

        setTimeout(() => {
            mensajeExito.style.display = "none"
            mensajeExito.textContent = ""
        }, 3000);
    
        mensajeExito.style.display = "block"
        mensajeExito.textContent = "Se creó el vehiculo con éxito!!"
        vehiculo.placa.value = ""
        vehiculo.modelo.value = ""
        vehiculo.color.value = ""
        vehiculo.puertas.value = ""
    } catch (error) {
        setTimeout(() => {
            mensajeError.style.display = "none"
            mensajeError.textContent = " "
        }, 3000);
            
        let respuestaError = "";

        for(let errorMsg in error.response.data) {
            respuestaError = respuestaError +  error.response.data[errorMsg] + '<br>'
        }

        mensajeError.style.display = "block"
        mensajeError.innerHTML = respuestaError;
    }
})

const verificarCamposVacíos = (vehiculo) => {
    return vehiculo.placa.value === "" ||
        vehiculo.modelo.value === "" ||
        vehiculo.color.value === "" ||
        vehiculo.puertas.value === ""
}