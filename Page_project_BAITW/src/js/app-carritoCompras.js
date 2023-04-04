function addProducto(id, token){
    let url = '../php/carrito-compras/index-carrito.php';
    let formData = new FormData();
    formData.append('id', id);
    formData.append('token', token);

    fetch(url,{
        method: 'POST',
        body: formData
    }).then(response => response.json())
    .then(data => {
        if (data.hasOwnProperty('ok') && data.ok) {
            let elemento = document.getElementById("num_cart");
            let numero = parseInt(data.numero);
            elemento.innerHTML = numero;
        }
    });
}
