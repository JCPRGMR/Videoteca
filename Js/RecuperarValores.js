
function gestionarLocalStorage(idInput) {
    var input = document.getElementById(idInput);
    if (input) {
        // Si el valor está presente en el localStorage, cargarlo en el input
        var valor = localStorage.getItem(idInput);
        if (valor !== null) {
            input.value = valor;
        }
        input.addEventListener("input", function() {
            localStorage.setItem(idInput, input.value);
        });
    } else {
        console.error("No se encontró ningún elemento con el ID especificado: " + idInput);
    }
}
var gp_ids = document.querySelectorAll("input, textarea");
gp_ids.forEach(element => {
    gestionarLocalStorage(element.id)
});