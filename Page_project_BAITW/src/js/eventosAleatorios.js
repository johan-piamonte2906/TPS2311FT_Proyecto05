
// si existe el Usuario
let txtUsuario = document.getElementById('usuario')
txtUsuario.addEventListener("blur", function(){
existeUsuario(txtUsuario.value)
}, false)

//si existe el correo    
let txtEmail = document.getElementById('email')
txtEmail.addEventListener("blur", function(){
existeEmail(txtEmail.value)
}, false)

// usuario
function existeUsuario(usuario){
let url = "../php/equipo-admin/index_clienteAjax.php"
let formData = new FormData()
formData.append("action", "existeUsuario")
formData.append("usuario", usuario)

fetch(url,{
    method: 'POST',
    body: formData
}).then(response => response.json()).then(data =>{
    if(data.ok){
        document.getElementById('usuario').value = ''
        document.getElementById('validaUsuario').innerHTML = 'Usuario No Esta Disponible'
    }else{
        document.getElementById('validaUsuario').innerHTML = ''
    }
})
}

// correo    
function existeEmail(email){
let url = "../php/equipo-admin/index_clienteAjax.php"
let formData = new FormData()
formData.append("action", "existeEmail")
formData.append("email", email)

fetch(url,{
    method: 'POST',
    body: formData
}).then(response => response.json()).then(data =>{
    if(data.ok){
        document.getElementById('email').value = ''
        document.getElementById('validaEmail').innerHTML = 'El Correo Ya Existe'
    }else{
        document.getElementById('validaEmail').innerHTML = ''
    }
})
}
