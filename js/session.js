function login(datos) {
    fetch("./src/Controller/SignIn.php", {
            method: "POST",
            body: datos
        }
    )
        .then(res => res.json())
        .then(data => {
            // console.log(data)
            if (!data.success) {
                document.querySelector(".message-p").textContent = data.message;
                return
            }
            document.getElementById('session').hidden = true;
            document.querySelector(".username").textContent = data.user.username;

            document.querySelector(".message-p").textContent = "";
            document.getElementById('content').hidden = false;

            if (data.user.roleId === 2) {
                document.getElementById('content-admin').hidden = false;
            }

            listarLibros();
        })
}

function register(datos) {
    fetch("./src/Controller/SignUp.php", {
            method: "POST",
            body: datos
        }
    )
        .then(res => res.json())
        .then(data => {
            document.querySelector(".message-r").textContent = data.message;
        })
}

function logout(datos) {
    fetch("./src/Controller/LogOut.php"
    )
        .then(res => res.json())
        .then(data => {
            document.getElementById('session').hidden = false;
            document.querySelector(".username").textContent = "";
            document.getElementById('content').hidden = true;
        })
}

// agregando eventos
document.getElementById('login').addEventListener('submit', e => {
    e.preventDefault();
    const form = new FormData(e.currentTarget);
    login(form);
    e.currentTarget.reset();
});

document.getElementById('register').addEventListener('submit', e => {
    e.preventDefault();
    const form = new FormData(e.currentTarget);
    register(form);
    e.currentTarget.reset();
});

document.getElementById('logout').addEventListener('click', logout);


