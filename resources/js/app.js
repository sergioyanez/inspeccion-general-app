import "./bootstrap";
import "../scss/app.scss";
import * as bootstrap from "bootstrap";

// ES6 Modules or TypeScript
import Swal from 'sweetalert2';

const btnsDelete = document.getElementsByClassName('btnsDelete');

if(btnsDelete){
  for (let i=0;i<btnsDelete.length;i++) {
    btnsDelete[i].addEventListener('click', ()=>{
      alert(btnsDelete[i].value);
    });
  }
}

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-orange ms-2',
    cancelButton: 'btn btn-secundary'
  },
  buttonsStyling: false
})

function alert(id){
  swalWithBootstrapButtons.fire({
    title: '¿Estas seguro?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Confirmar',
    cancelButtonText: 'Volver',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      window.location="http://127.0.0.1:8000/usuario/eliminar/"+id;
    } else {
      Swal.DismissReason.cancel
    }
     
  });
}

const divModal = document.getElementById('example');

if(divModal){
  const myModalEl = new bootstrap.Modal(divModal);
  if(myModalEl){
    myModalEl.show();
  }
}

const ExistmodalPerfil = document.getElementById('ExistmodalPerfil');
const modalperfil = document.getElementById('modalperfil');

if(modalperfil && ExistmodalPerfil){
  const myModalPerfil = new bootstrap.Modal(modalperfil);
  if(myModalPerfil){
    myModalPerfil.show();
  }
}