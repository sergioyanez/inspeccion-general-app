'use strict';
import "./bootstrap";
document.addEventListener("DOMContentLoaded", function() {

    let tipo = document.getElementById("tipo_inmueble");
    let caja = document.getElementById("fecha_alquiler");
    let fechaVencimiento = document.getElementById("fechaVencimiento");
    cajaFechaVencimiento("none");

    function cajaFechaVencimiento(d) {
        if (caja) {
            caja.style.display = d;
        }
    }

    if (tipo) {
        tipo.addEventListener("change", function() {
            if (Number(this.value) === 1) {
                cajaFechaVencimiento("block");
                fechaVencimiento.required = true;
            } else {
                cajaFechaVencimiento("none");
                fechaVencimiento.required = false;
            }
        });
    }
});


