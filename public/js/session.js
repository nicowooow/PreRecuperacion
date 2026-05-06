// como partimos de public/index.html la lógica o backend de php está en
// ../src/*
function session() {
    fetch("../src/Controller/Producto.php")
        .then(res => res.json())
        .then(data=> console.log(data) )
}

window.addEventListener('DOMContentLoaded', () => {
    console.log(session())
})