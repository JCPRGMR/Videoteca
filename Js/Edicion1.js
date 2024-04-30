var btnEditar = document.getElementById("editar");
var gp_ids = document.querySelectorAll("input[type='search'], input[type='text'], textarea");

btnEditar.addEventListener("click", function(){
    btnEditar.className = "f-row jc-c a-c color4 br10 negrita mayus hp10 pointer";
    btnEditar.textContent = "Cancelar";
    btnEditar.id = "cancelarEdicion";
    gp_ids.forEach(element => {
        document.getElementById(element.id).readOnly = false;
    });

    var btnCancelarEdicion = document.getElementById("cancelarEdicion");
    btnCancelarEdicion.addEventListener("click", function(){
        window.location.reload();
    });
});
