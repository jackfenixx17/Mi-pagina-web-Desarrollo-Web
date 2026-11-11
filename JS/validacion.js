// Referencias a los elementos del formulario
const formulario = document.querySelector("#formularioContacto");
const nombre = document.querySelector("#nombre");
const perfil = document.querySelector("#perfil");

// Casillas de verificación de intereses
const checkFrontend = document.querySelector("#int_frontend");
const checkBackend = document.querySelector("#int_backend");
const checkBd = document.querySelector("#int_bd");

// Elementos para mostrar resultados en la página
const mensajeEstado = document.querySelector("#mensajeEstado");
const cuerpoTabla = document.querySelector("#cuerpoTablaMensajes");
let contadorId = 2;

// Función principal para validar el formulario antes de enviarlo
const validarFormulario = (event) => {
  // Verificar que al menos una casilla de interés esté marcada
  const interesSeleccionado = checkFrontend.checked || checkBackend.checked || checkBd.checked;

  if (interesSeleccionado === false) {
    checkFrontend.setCustomValidity("Selecciona al menos una tecnología de interés.");
  } else {
    checkFrontend.setCustomValidity("");
  }

  // Comprobar si todos los campos cumplen con las reglas del formulario
  if (!formulario.checkValidity()) {
    event.preventDefault();
    formulario.reportValidity();
    return;
  }

  // Simular registro en tabla cuando se ejecuta en la versión estática HTML
  if (cuerpoTabla && mensajeEstado) {
    event.preventDefault();

    // Obtener el motivo seleccionado y las casillas marcadas
    const motivoSeleccionado = document.querySelector('input[name="motivo"]:checked');
    const interesesMarcados = [];
    if (checkFrontend.checked) interesesMarcados.push(checkFrontend.value);
    if (checkBackend.checked) interesesMarcados.push(checkBackend.value);
    if (checkBd.checked) interesesMarcados.push(checkBd.value);

    // Obtener fecha y hora actual formateada
    const ahora = new Date();
    const fechaFormateada = ahora.getFullYear() + "-" +
      String(ahora.getMonth() + 1).padStart(2, "0") + "-" +
      String(ahora.getDate()).padStart(2, "0") + " " +
      String(ahora.getHours()).padStart(2, "0") + ":" +
      String(ahora.getMinutes()).padStart(2, "0") + ":" +
      String(ahora.getSeconds()).padStart(2, "0");

    // Crear nueva fila para la tabla de mensajes
    const nuevaFila = document.createElement("tr");
    nuevaFila.innerHTML = `
      <td>${contadorId++}</td>
      <td>${nombre.value}</td>
      <td>${perfil.value}</td>
      <td>${motivoSeleccionado ? motivoSeleccionado.value : ""}</td>
      <td>${interesesMarcados.join(", ")}</td>
      <td>${fechaFormateada}</td>
    `;
    cuerpoTabla.prepend(nuevaFila);

    // Mostrar confirmación en pantalla y limpiar el formulario
    mensajeEstado.textContent = "¡Mensaje procesado y guardado exitosamente!";
    mensajeEstado.style.display = "block";
    formulario.reset();
  }
};

// Quitar el mensaje de error al marcar alguna casilla
const limpiarErrorIntereses = () => {
  checkFrontend.setCustomValidity("");
};

checkFrontend.addEventListener("click", limpiarErrorIntereses);
checkBackend.addEventListener("click", limpiarErrorIntereses);
checkBd.addEventListener("click", limpiarErrorIntereses);

// Escuchar el envío del formulario
formulario.addEventListener("submit", validarFormulario);