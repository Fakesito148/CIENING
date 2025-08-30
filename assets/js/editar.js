function toggleEdit(id) {
    document.getElementById('edit-form-' + id).style.display = 'block';
}

function cancelarEdit(id) {
    document.getElementById('edit-form-' + id).style.display = 'none';
}

function guardarCambios(id) {
    const nombre = document.getElementById('nombre-' + id).value;
    const cantidad = document.getElementById('cantidad-' + id).value;
    const estado = document.getElementById('estado-' + id).value;

    // Usamos fetch para enviar los cambios al servidor sin recargar
    fetch('controllers/editar_ajax.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${id}&nombre=${nombre}&cantidad=${cantidad}&estado=${estado}`
    })
    .then(response => response.text())
    .then(data => {
        // Actualizar la tarjeta
        document.querySelector('#card-' + id + ' .nombre').innerText = nombre;
        document.querySelector('#card-' + id + ' .cantidad').innerText = cantidad;
        document.querySelector('#card-' + id + ' .estado-text').innerText = estado;
        // Ocultar formulario
        cancelarEdit(id);
    })
    .catch(err => console.log(err));
}

