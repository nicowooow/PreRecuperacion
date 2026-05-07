// como partimos de public/index.html la lógica o backend de php está en
// ../src/*
function login(datos) {
    // console.log(datos)
    fetch("../src/Controller/SignIn.php", {
            method: "POST",
            body: datos
        }
    )
        .then(res => res.json())
        .then(data => {
            // console.log(data)
            if (!data.success) {
                document.querySelector(".message-p").textContent = data.message;
            }
            if (data.roleID == 2) {
                document.getElementById('content').hidden = false;
            }
        })
}

function register(datos) {
    // console.log(datos)
    fetch("../src/Controller/SignUp.php", {
            method: "POST",
            body: datos
        }
    )
        .then(res => res.json())
        .then(data => {
                document.querySelector(".message-r").textContent = data.message;
        })
}

window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('login').addEventListener('submit', e => {
        e.preventDefault();
        const form = new FormData(e.target);
        login(form);
    });

    document.getElementById('register').addEventListener('submit', e => {
        e.preventDefault();
        const form = new FormData(e.target);
        register(form);
    });


})