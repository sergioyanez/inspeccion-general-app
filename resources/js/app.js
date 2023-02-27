'use strict';
import { isEmpty } from "lodash";
import "./bootstrap";
document.addEventListener("DOMContentLoaded", function() {

    let tipo = document.getElementById("tipo_inmueble");
    let caja = document.getElementById("fecha_alquiler");
    let fechaVencimiento = document.getElementById("fechaVencimiento");
    let secretariaCargada = document.getElementById("secretariaCargada");
    let secretariaNoCargada = document.getElementById("secretariaNoCargada");
    let obrasParticularesCargada = document.getElementById("obrasParticularesCargada");
    let obrasParticularesNoCargada = document.getElementById("obrasParticularesNoCargada");
    let tablCargada = document.getElementById("tablCargada");
    let tablNoCargada = document.getElementById("tablNoCargada");
    let bromatologiaCargada = document.getElementById("bromatologiaCargada");
    let bromatologiaNoCargada = document.getElementById("bromatologiaNoCargada");
    let tishCargada = document.getElementById("tishCargada");
    let tishNoCargada = document.getElementById("tishNoCargada");
    let juzgadoFaltasCargada = document.getElementById("juzgadoFaltasCargada");
    let juzgadoFaltasNoCargada = document.getElementById("juzgadoFaltasNoCargada");
    let bomberosCargada = document.getElementById("bomberosCargada");
    let bomberosNoCargada = document.getElementById("bomberosNoCargada");
    let inspeccionGeneralCargada = document.getElementById("inspeccionGeneralCargada");
    let inspeccionGeneralNoCargada = document.getElementById("inspeccionGeneralNoCargada");
    let regDeudoresAlimentosMorososCargada = document.getElementById("regDeudoresAlimentosMorososCargada");
    let regDeudoresAlimentosMorososNoCargada = document.getElementById("regDeudoresAlimentosMorososNoCargada");
    cajaFechaVencimiento("none");
    cajaSecretaria("none");
    cajaObrasParticulares("none");
    cajaTABL("none");
    cajaBromatologia("none");
    cajaTish("none");
    cajaJuzgadoFaltas("none");
    cajaBomberos("none");
    cajaInspeccionGeneral("none");
    cajaRegDeudoresAlimentosMorosos("none");

    function cajaRegDeudoresAlimentosMorosos(d) {
        if (isEmpty(regDeudoresAlimentosMorososCargada)) {
            regDeudoresAlimentosMorososCargada.style.display = "block";
            regDeudoresAlimentosMorososNoCargada.style.display = d;
        } else {
            regDeudoresAlimentosMorososNoCargada.style.display = "block";
            regDeudoresAlimentosMorososCargada.style.display = d;
        }
    }

    function cajaInspeccionGeneral(d) {
        if (isEmpty(inspeccionGeneralCargada)) {
            inspeccionGeneralCargada.style.display = "block";
            inspeccionGeneralNoCargada.style.display = d;
        } else {
            inspeccionGeneralNoCargada.style.display = "block";
            inspeccionGeneralCargada.style.display = d;
        }
    }

    function cajaBomberos(d) {
        if (isEmpty(bomberosCargada)) {
            bomberosCargada.style.display = "block";
            bomberosNoCargada.style.display = d;
        } else {
            bomberosNoCargada.style.display = "block";
            bomberosCargada.style.display = d;
        }
    }

    function cajaJuzgadoFaltas(d) {
        if (isEmpty(juzgadoFaltasCargada)) {
            juzgadoFaltasCargada.style.display = "block";
            juzgadoFaltasNoCargada.style.display = d;
        } else {
            juzgadoFaltasNoCargada.style.display = "block";
            juzgadoFaltasCargada.style.display = d;
        }
    }

    function cajaTish(d) {
        if (isEmpty(tishCargada)) {
            tishCargada.style.display = "block";
            tishNoCargada.style.display = d;
        } else {
            tishNoCargada.style.display = "block";
            tishCargada.style.display = d;
        }
    }

    function cajaBromatologia(d) {
        if (isEmpty(bromatologiaCargada)) {
            bromatologiaCargada.style.display = "block";
            bromatologiaNoCargada.style.display = d;
        } else {
            bromatologiaNoCargada.style.display = "block";
            bromatologiaCargada.style.display = d;
        }
    }

    function cajaTABL(d) {
        if (isEmpty(tablCargada)) {
            tablCargada.style.display = "block";
            tablNoCargada.style.display = d;
        } else {
            tablNoCargada.style.display = "block";
            tablCargada.style.display = d;
        }
    }

    function cajaObrasParticulares(d) {
        if (isEmpty(secretariaCargada)) {
            obrasParticularesCargada.style.display = "block";
            obrasParticularesNoCargada.style.display = d;
        } else {
            obrasParticularesNoCargada.style.display = "block";
            obrasParticularesCargada.style.display = d;
        }
    }

    function cajaSecretaria(d) {
        if (isEmpty(secretariaCargada)) {
            secretariaCargada.style.display = "block";
            secretariaNoCargada.style.display = d;
        } else {
            secretariaNoCargada.style.display = "block";
            secretariaCargada.style.display = d;
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

    // if (secretariaNoCargada) {
    //     secretariaCargada.addEventListener("change", function() {
    //         if (Number(this.value) != null) {
    //             cajaSecretaria("block");
    //         } else {
    //             cajaSecretaria("none");
    //         }
    //     });
    // }

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