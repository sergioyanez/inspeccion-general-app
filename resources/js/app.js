import "./bootstrap";

let tipo = document.getElementById("tipo_inmueble");
let caja = document.getElementById("fecha_alquiler");
cajaFechaVencimiento("none");

function cajaFechaVencimiento(d) {
    if (caja) {
        caja.style.display = d;
    }
}

if (tipo) {
    tipo.addEventListener("change", function () {
        if (Number(this.value) === 1) {
            cajaFechaVencimiento("block");
        } else {
            cajaFechaVencimiento("none");
        }
    });
}
