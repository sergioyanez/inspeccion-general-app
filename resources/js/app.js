'use strict';
import "./bootstrap";
document.addEventListener("DOMContentLoaded", function() {

    let tipo = document.getElementById("tipo_inmueble");
    let caja = document.getElementById("fecha_alquiler");
    let fechaVencimiento = document.getElementById("fechaVencimiento");
    let secretariaCargada = document.getElementById("secretariaCargada");
    let secretariaNoCargada = document.getElementById("secretariaNoCargada");



    cajaFechaVencimiento("none");
    cajaSecretaria("none");

    function cajaSecretaria(d) {
        if (!secretariaCargada) {
            secretariaCargada.style.display = d;
        } else {
            secretariaNoCargada.style.display = d;
        }
    }

    function cajaFechaVencimiento(d) {
        if (caja) {
            caja.style.display = d;
        }
    }

    if (secretariaCargada) {
        secretariaCargada.addEventListener("change", function() {
            if (Number(this.value) != null) {
                cajaSecretaria("block");
            } else {
                cajaSecretaria("none");
            }
        });
    }

    if (secretarianoCargada) {
        secretariaCargada.addEventListener("change", function() {
            if (Number(this.value) != null) {
                cajaSecretaria("block");
            } else {
                cajaSecretaria("none");
            }
        });
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