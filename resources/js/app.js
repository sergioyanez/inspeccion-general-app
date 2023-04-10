import "./bootstrap";
import "../scss/app.scss";
import * as bootstrap from "bootstrap";

// ES6 Modules or TypeScript
import Swal from "sweetalert2";

document.addEventListener("DOMContentLoaded", function() {

    let selectCasado = document.getElementById('selectCasado');
    let divConyuge2 = document.getElementById('divConyuge2');
    let divConyuge = document.getElementById('divConyuge');

    let tipo = document.getElementById("tipo_inmueble");
    let caja = document.getElementById("fecha_alquiler");
    let fechaVencimiento = document.getElementById("fechaVencimiento");

    let tipoBaja = document.getElementById("tipo_baja");
    //  let tipo_baja_id = document.getElementById("tipo_baja_id");
    let bajaProvisoria = document.getElementById("provisoria");
    let fechaVencimientoProvisoria = document.getElementById(
        "fechaVencimientoProvisoria"
    );
    let bajaPermanente = document.getElementById("permanente");
    let fechaVencimientoPermanente = document.getElementById(
        "fechaVencimientoPermanente"
    );

    let estado_baja_id = document.getElementById("estado_baja_id");
    // let bajaProvisoria_1 = document.getElementById("provisoria_1");
    // let fechaVencimientoProvisoria_1 = document.getElementById("fechaVencimientoProvisoria_1");
    // let bajaPermanente_1 = document.getElementById("permanente_1");
    // let fechaVencimientoPermanente_1 = document.getElementById("fechaVencimientoPermanente_1");

    //console.log(tipoBaja.value);
    cajaFechaVencimiento("none");
    cajaBajaPermanente("none");
    cajaBajaProvisoria("none");

    // cajaBajaProvisoria_1("none");
    // cajaBajaPermanente_1("none");

    function cajaFechaVencimiento(d) {
        if (caja) {
            caja.style.display = d;
        }
    }

    function cajaBajaProvisoria(d) {
        if (bajaProvisoria) {
            bajaProvisoria.style.display = d;
        }
    }

    function cajaBajaPermanente(d) {
        if (bajaPermanente) {
            bajaPermanente.style.display = d;
        }
    }

    if (selectCasado) {
        divConyuge2.style.display = 'none';
        divConyuge.style.display = 'none';

        selectCasado.addEventListener("change", function() {
            if (Number(selectCasado.value) === 2) {
                divConyuge2.style.display = 'block';
                divConyuge.style.display = 'block';
            } else {
                divConyuge2.style.display = 'none';
                divConyuge.style.display = 'none';
            }
        });
    }

    if (tipoBaja) {
        console.log(fechaVencimientoProvisoria.value);

        if (Number(tipoBaja.value) === 1) {
            cajaBajaProvisoria("block");
            cajaBajaPermanente("none");
            fechaVencimientoProvisoria.required = true;
            fechaVencimientoPermanente.required = false;

        }
        if (Number(tipoBaja.value) === 2) {
            cajaBajaProvisoria("none");
            cajaBajaPermanente("block");
            fechaVencimientoProvisoria.required = false;
            fechaVencimientoPermanente.required = true;
        }
        if (Number(tipoBaja.value) === 3) {
            cajaBajaProvisoria("none");
            cajaBajaPermanente("block");
            fechaVencimientoProvisoria.required = false;
            fechaVencimientoPermanente.required = true;
        }
        tipoBaja.addEventListener("change", function() {
            if (Number(this.value) === 1) {
                cajaBajaProvisoria("block");
                cajaBajaPermanente("none");
                fechaVencimientoProvisoria.required = true;
                fechaVencimientoPermanente.required = false;
            }
            if (Number(this.value) === 2) {
                cajaBajaProvisoria("none");
                cajaBajaPermanente("block");
                fechaVencimientoProvisoria.required = false;
                fechaVencimientoPermanente.required = true;
            }
            if (Number(this.value) === 3) {
                cajaBajaProvisoria("none");
                cajaBajaPermanente("block");
                fechaVencimientoProvisoria.required = false;
                fechaVencimientoPermanente.required = true;
            }
            if (Number(this.value) != 1 && Number(this.value) != 2 && Number(this.value) != 3) {
                cajaBajaPermanente("none");
                cajaBajaProvisoria("none");
                fechaVencimientoProvisoria.required = false;
                fechaVencimientoPermanente.required = false;
            }
        });
    }

    if (tipo) {
        if (Number(tipo.value) === 1) {
            cajaFechaVencimiento("block");
            fechaVencimiento.required = true;
        } else {
            cajaFechaVencimiento("none");
            fechaVencimiento.required = false;
        }
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

    const selectAviso = document.getElementById("selectAviso");
    let cajaPDFAviso = document.getElementById("cajaPDFAviso");
    let cajaDetalleAviso = document.getElementById("cajaDetalleAviso");

    if (selectAviso) {
        if (selectAviso.value == 'telefonica') {
            cajaPDFAviso.style.display = "none";
            cajaDetalleAviso.style.display = "block";
        } else {
            cajaPDFAviso.style.display = "block";
            cajaDetalleAviso.style.display = "none";
        }
        selectAviso.addEventListener("change", function() {
            if (this.value === 'telefonica') {
                cajaPDFAviso.style.display = "none";
                cajaDetalleAviso.style.display = "block";
            } else {
                cajaPDFAviso.style.display = "block";
                cajaDetalleAviso.style.display = "none";
            }
        });
    }
});

const btnsDelete = document.getElementsByClassName("btnsDelete");

if (btnsDelete) {
    for (let i = 0; i < btnsDelete.length; i++) {
        btnsDelete[i].addEventListener("click", () => {
            alert(btnsDelete[i].value);
        });
    }
}

const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-orange ms-2",
        cancelButton: "btn btn-secundary",
    },
    buttonsStyling: false,
});

function alert(id) {
    swalWithBootstrapButtons
        .fire({
            title: "¿Estas seguro?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Volver",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                window.location =
                    "http://127.0.0.1:8000/usuario/eliminar/" + id;
            } else {
                Swal.DismissReason.cancel;
            }
        });
}

const divModal = document.getElementById("example");

if (divModal) {
    const myModalEl = new bootstrap.Modal(divModal);
    if (myModalEl) {
        myModalEl.show();
    }
}

if (!divModal) {
    const existmodalPerfil = document.getElementById("ExistmodalPerfil");

    if (existmodalPerfil && modalperfil) {
        console.log("Entró");
        const modalperfil = document.getElementById("modalperfil");
        const myModalPerfil = new bootstrap.Modal(modalperfil);
        if (myModalPerfil) {
            myModalPerfil.show();
        }
    }
}

const inputSuccess = document.getElementById("alertSuccess");

if (inputSuccess) {
    alertSuccess(inputSuccess.value);
}

function alertSuccess(mensaje) {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: mensaje,
        showConfirmButton: false,
        timer: 1500,
    });
}

document.addEventListener("DOMContentLoaded", function() {
    let fechaPrimerHabilitacion = document.getElementById(
        "fechaPrimerHabilitacion"
    );
    let certificado = document.getElementById("certificadoHabilitacion");
    fechaPrimerHabilitacion.addEventListener("change", () => {
        if (fechaPrimerHabilitacion.value !== "") {
            certificado.required = true;
        } else {
            certificado.required = false;
        }
    });
});