document.getElementById("Buscador").addEventListener("input", function() {
    let valorBusqueda = this.value.toLowerCase().trim();
    let filas = document.querySelectorAll("#body tr");

    filas.forEach(function(fila) {
        let contenidoFila = fila.textContent.toLowerCase().trim();
        if (contenidoFila.includes(valorBusqueda)) {
            fila.style.display = "";
        } else {
            fila.style.display = "none";
        }
    });
});