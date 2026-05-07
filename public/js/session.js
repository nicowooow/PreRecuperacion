// como partimos de public/index.html la lógica o backend de php está en
// ../src/*
function session(datos) {
    // console.log(datos)
    fetch("../src/Controller/SignIn.php", {
            method: "POST",
            body: datos
        }
    )
        .then(res => res.json())
        .then(data => console.log(data))
}

window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('login').addEventListener('submit', e => {
        e.preventDefault();
        const form = new FormData(e.target);
        session(form);
    });
})