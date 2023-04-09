//añadir al Carrito
function addProducto(id, token){
    let url = '../php/carrito-compras/index-carrito.php';
    let formData = new FormData();
    formData.append('id', id);
    formData.append('token', token);

    fetch(url,{
        method: 'POST',
        body: formData,
        mode: 'cors'
    }).then(response => response.json())
    .then(data => {
        if (data.hasOwnProperty('ok') && data.ok) {
            let elemento = document.getElementById("num_cart");
            elemento.innerHTML = data.numero;
        }
    });
}

//eliminar modal

let eliminaModal = document.getElementById('eliminaModal')
  eliminaModal.addEventListener('show.bs.modal', function(event){
    let button =  event.relatedTarget
    let id = button.getAttribute('data-bs-id')
    let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-eliminar')
    buttonElimina.value =id
  })

// Modificar carrito

function actualizarCantidad(cantidad, id) {
    let url = '../php/carrito-compras/index-actalizar-carrito.php';
    let formData = new FormData();
    formData.append('action', 'agregar');
    formData.append('id', id);
    formData.append('cantidad', cantidad);
  
    fetch(url, {
      method: 'POST',
      body: formData,
      mode: 'cors'
    })
    .then(response => response.json())
    .then(data => {
      if (data.ok) {

        let divsubtotal = document.getElementById('subtotal_'+ id);
        divsubtotal.innerHTML = data.sub;
  
        let total = 0.000;
        let list = document.getElementsByName('subtotal[]');
        
        for(let i = 0; i < list.length; i++){
          total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
        }
  
        total = new Intl.NumberFormat('eu-US', {
          minimumFractionDigits: 3
        }).format(total)
        document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
      }
    })
    .catch(error => console.error(error));
  }
 
  function eliminar() {

    let botonelimina = document.getElementById('btn-eliminar')
    let id = botonelimina.value

    const url = '../php/carrito-compras/index-actalizar-carrito.php';
    const formData = new FormData();
    formData.append('action', 'eliminar');
    formData.append('id', id);
      
    fetch(url, {
      method: 'POST',
      body: formData,
      mode: 'cors'
    })
    .then(response => response.json())
    .then(data => {
      if (data.ok) {
        location.reload()
    }
    })
    .catch(error => console.error(error));
  }


// function actualizarCantidad(cantidad, id){
//     let url = '../php/carrito-compras/index-actalizar-carrito.php';
//     let formData = new FormData();
//     formData.append('action', 'agregar');
//     formData.append('id', id);
//     formData.append('cantidad', cantidad);

//     fetch(url,{
//         method: 'POST',
//         body: formData,
//         mode: 'cors'
//     }).then(response => response.json())
//     .then(data => {
//         if (data.hasOwnProperty('ok') && data.ok) {

//             let divsubtotal = document.getElementById('subtotal_' + id)
//             let sub = parseInt(data.sub)
//             divsubtotal.innerHTML = sub

//             let total = 0.00
//             let list = document.getElementsByClassName('subtotal[]')

//             for (let i = 0; i < array.length; i++) {
//                 total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
//             }

//             total = new Intl.NumberFormat('eu-US', {
//                 minimumFractionDigits: 3
//             }).format(total)
//             document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total

//         }
//     });
// }
