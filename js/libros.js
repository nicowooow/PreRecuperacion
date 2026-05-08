
function cambiarPrecio(datos) {
    fetch("./src/Controller/SignUp.php", {
            method: "POST",
            body: datos
        }
    )
        .then(res => res.json())
        .then(data => {
            console.log(data);
        })
}

function cargarLibros() {
    const listaLibros = document.querySelectorAll('.listaLibro');
    fetch("./src/Controller/GetLibros.php", {})

}

document.getElementById("cambiar-precio").addEventListener('submit', e=>{
    e.preventDefault();
    const form = new FormData(e.currentTarget);
    cambiarPrecio(form);
});