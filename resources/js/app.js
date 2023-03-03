import "./bootstrap";
import "../scss/app.scss";
import * as bootstrap from "bootstrap";

// ES6 Modules or TypeScript
import Swal from "sweetalert2";

document.addEventListener("DOMContentLoaded", function () {
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
        tipo.addEventListener("change", function () {
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
