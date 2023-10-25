let eliminaModal = document.getElementById('modalEliminar')
eliminaModal.addEventListener('show.bs.modal', function(event) {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')

    let modalInput = eliminaModal.querySelector('.modal-footer input')
    modalInput.value = id
})