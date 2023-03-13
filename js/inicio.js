//Código para aparacer menú desplegable en dispositivos con pantalla pequeña
const menu = document.querySelector(".menu");
const menuDesplegable = document.querySelector(".menu-desplegable");
menuDesplegable.addEventListener("click", () => { menu.classList.toggle("menu-visible")});

function compraRealizada() {
  document.getElementById("compra").innerHTML = "Compra realizada";
  window.alert("Compra realizada");
}

function comprar(producto) {
  window.open("comprar.html?producto=" + producto)
}

