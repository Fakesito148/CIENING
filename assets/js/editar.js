function toggleEdit(id) {
    document.getElementById('edit-form-' + id).style.display = 'block';
}

function cancelarEdit(id) {
    document.getElementById('edit-form-' + id).style.display = 'none';
}

function guardarCambios(id, seccion) {
    const nombre = document.getElementById('nombre-' + id).value;
    const cantidad = document.getElementById('cantidad-' + id).value;
    const estado = document.getElementById('estado-' + id).value;

    fetch('controllers/editar_ajax.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${id}&nombre=${nombre}&cantidad=${cantidad}&estado=${estado}&seccion=${seccion}`
    })
    .then(response => response.text())
.then(data => {
    data = data.trim(); // quitar espacios o saltos de línea
    if(data !== "OK"){
        alert("Error: " + data);
        return;
    }
    // actualizar tarjeta en DOM
    document.querySelector('#card-' + id + ' .nombre').innerText = nombre;
    document.querySelector('#card-' + id + ' .cantidad').innerText = cantidad;
    document.querySelector('#card-' + id + ' .estado-text').innerText = estado;
    cancelarEdit(id);
})

    .catch(err => console.log(err));
}
