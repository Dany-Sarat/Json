const id = document.getElementById("id")

const vehiculo = {
    placa: document.getElementById("placa"),
    modelo: document.getElementById("modelo"),
    color: document.getElementById("color"),
    puertas: document.getElementById("puertas"),
}

const actualizar_vehiculo_form = document.getElementById("actualizar_vehiculo_form")
const mensajeError = document.getElementById("mensaje_error")
const mensajeExito = document.getElementById("mensaje_exito")

actualizar_vehiculo_form.addEventListener("submit", async (e) => {
    e.preventDefault()

    if(verificarIdVacio(id)) {
        setTimeout(() => {
            mensajeError.style.display = "none"
            mensajeError.textContent = " "
        }, 3000);
        mensajeError.style.display = "block"
        mensajeError.textContent = "Debe ingresar un id*";

        return
    }

    if(isNaN(id.value)) {
        setTimeout(() => {
            mensajeError.style.display = "none"
            mensajeError.textContent = " "
        }, 3000);
        mensajeError.style.display = "block"
        mensajeError.textContent = "El id es un número*";

        return
    }

    try {
        const response = await axios.put(`${import.meta.env.VITE_API_URL}/${id.value}`, {
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
        mensajeExito.textContent = "Se actualizó el vehiculo con éxito!!"
        vehiculo.placa.value = ""
        vehiculo.modelo.value = ""
        vehiculo.color.value = ""
        vehiculo.puertas.value = "0"
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


const verificarIdVacio = (id) => {
    return id.value === ""
}




