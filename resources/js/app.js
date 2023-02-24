import "./bootstrap";
import "../scss/app.scss";
import * as bootstrap from "bootstrap";

const myModalEl = new bootstrap.Modal(document.getElementById('example'));
myModalEl.show();
myModalEl.addEventListener('hide.bs.modal', () => {
  // do something...
})