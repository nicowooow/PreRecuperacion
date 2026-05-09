function cambiarPrecio(datos) {
    fetch("./src/Controller/CambiarPrecio.php", {
            method: "POST",
            body: datos
        }
    )
        .then(res => res.json())
        .then(data => {
            // console.log(data);
            document.querySelector('.message-cp').textContent = data.message;
            if (data.success) listarLibros();
        })
}

function listarLibros() {
    const listaLibros = document.querySelector('.lista-libros');
    fetch("./src/Controller/ListarLibros.php")
        .then(res => res.json())
        .then(data => {
            let lista = "<tr>" +
                "<th style='padding: .7rem 1rem'>Titulo</th>" +
                "<th style='padding: .7rem 1rem'>Isnb</th>" +
                "<th style='padding: .7rem 1rem'>Precio</th>" +
                "</tr>";
            data.forEach((libro) => {
                lista += `<tr>
                            <td style='padding: 0 1rem' data-id='${libro.id}'>${libro.titulo}</td>
                            <td style='padding: 0 1rem'> ${libro.isbn}</td>
                            <td style='padding: 0 1rem'>${libro.precio}</td>
                           <tr>`;
            })
            listaLibros.innerHTML = lista;
        })

}

function BuscarLibros(datos) {
    const query = new URLSearchParams(datos);
    console.log(query)
    const listaLibros = document.querySelector('.lista-libros');
    fetch(`./src/Controller/BuscarLibros.php?${query}`)
        .then(res => res.json())
        .then(data => {
            let lista = "<tr>" +
                "<th style='padding: .7rem 1rem'>Titulo</th>" +
                "<th style='padding: .7rem 1rem'>Isnb</th>" +
                "<th style='padding: .7rem 1rem'>Precio</th>" +
                "</tr>";
            data.forEach((libro) => {
                lista += `<tr>
                            <td style='padding: 0 1rem' data-id='${libro.id}'>${libro.titulo}</td>
                            <td style='padding: 0 1rem'> ${libro.isbn}</td>
                            <td style='padding: 0 1rem'>${libro.precio}</td>
                           <tr>`;
            })
            listaLibros.innerHTML = lista;
        })


}

document.getElementById("cambiar-precio").addEventListener('submit', e => {
    e.preventDefault();
    const form = new FormData(e.currentTarget);
    cambiarPrecio(form);
});

document.getElementById("libro-busqueda").addEventListener('submit', e => {
    e.preventDefault();
    const form = new FormData(e.currentTarget);
    BuscarLibros(form);
});