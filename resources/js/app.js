import "./bootstrap";
import "../scss/app.scss";
import * as bootstrap from "bootstrap";

const myModal = new bootstrap.Modal(document.getElementById('example'));
if(myModal){
    myModal.show();
}