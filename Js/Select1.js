function Activar(input, div){
    var inp = document.getElementById(input)
    var group = document.getElementById(div)
    inp.addEventListener("focus", function(){
        group.style.visibility = "visible"
    })
    inp.addEventListener("focusout", function(){
        setTimeout(() => {
            group.style.visibility = "hidden"
        }, 300);
    })
}
Activar("area", "g_area")
Activar("tipo", "g_tipo")

function LabelToInput(input, labelId){
    document.getElementById(input).value = document.getElementById(labelId).textContent;
}
