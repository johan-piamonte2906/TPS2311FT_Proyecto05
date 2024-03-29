<?php

    function esNulo(array $parametros){
        foreach($parametros as $parametro){
            if(strlen(trim($parametro)) < 1){
                return true;
            }
        }
        return false;
    }

    function esEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    function validaPassword($password, $repassword){
        if(strcmp($password, $repassword) === 0){
            return true;
        }
        return false;
    }

    function generaToken(){
        return md5(uniqid(mt_rand(), false));
    }

    
    function registraCliente(array $datos, $con){
        $sql = $con->prepare("INSERT INTO clientes (nombres, apellidos, email, telefono, identificacion, estatus, fecha_alta) VALUES (?,?,?,?,?,1,now())");
        if($sql->execute($datos)){
            return $con->lastInsertId();
        }
        return 0;
    }

    function registraUsuario(array $datos, $con){
        $sql = $con->prepare("INSERT INTO usuarios (usuario, password, token, id_cliente) VALUES (?,?,?,?)");
        if($sql->execute($datos)){
            return $con->lastInsertId();
        }
        return 0;
    }

        //si el usuario existe
        function usuarioExiste($usuario, $con){
            $sql = $con->prepare("SELECT id FROM usuarios WHERE usuario LIKE ? LIMIT 1");
            $sql->execute([$usuario]);
            if($sql->fetchColumn() > 0){
                return true;
            }
            return false;
        }
        //si existe el correo 
        function emailExiste($email, $con){
            $sql = $con->prepare("SELECT id FROM clientes WHERE email LIKE ? LIMIT 1");
            $sql->execute([$email]);
            if($sql->fetchColumn() > 0){
                return true;
            }
            return false;
        }


    //Mostrar mensajes de error

    function mostrarMensaje(array $errors){
        if(count($errors) > 0){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
            foreach($errors as $error){
                echo '<li>'. $error.'</li>';
            }
            echo '<ul>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

        }
    }

    function validaToken($id, $token, $con){
        $msg = "";
        $sql = $con->prepare("SELECT id FROM usuarios WHERE id = ? AND token LIKE ? LIMIT 1");
        $sql->execute([$id, $token]);
        if($sql->fetchColumn() > 0){
            if (activarUsuario($id, $con)) {
                $msg = "Binevendo... inicia sesion para continuar";
            }else {
                $msg = "Error al Procesar la información";
            }
        }else{
            $msg = "Error al procesar";
        }
        return $msg;
    }

    function activarUsuario($id, $con){
        $sql = $con->prepare("UPDATE usuarios SET activacion = 1, token = '' WHERE id = ?");
        return $sql->execute([$id]);
    }

    //login

    function login($usuario, $password, $con, $proceso) {
        $sql = $con->prepare("SELECT id, usuario, password, id_cliente FROM usuarios WHERE usuario LIKE ? LIMIT 1");
        $sql->execute([$usuario]);
        if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            if (esActivo($usuario, $con)) {
                if(password_verify($password, $row['password'])){
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_name'] = $row['usuario'];
                    $_SESSION['user_cliente'] = $row['id_cliente'];
                    if($proceso == 'pago'){
                        header("Location: ../index_checkout.php ");
                    }else{
                        header("Location: ../../../index.php ");
                    }
                    exit;
                }
            }else{
                return 'El Usuario Se encuentra deshabilitado';
            }
        }
        return 'El Usuario y/o Contraseña Son Incorrectos';
    }

    function esActivo($usuario, $con){
        $sql = $con->prepare("SELECT activacion FROM usuarios WHERE usuario LIKE ? LIMIT 1");
        $sql->execute([$usuario]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        if ($row['activacion'] == 1) {
            return true;
        }
        return false;
    }

    function solicitaPassword($user_id, $con){
        $token = generaToken();
        $sql = $con->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id = ?");
        if ($sql->execute([$token, $user_id])) {
            return $token;
        }
        return null;
    }

    function verificaTokenRequest($user_id, $token, $con){
        $sql = $con->prepare("SELECT id FROM usuarios WHERE id = ? AND token_password LIKE ? AND password_request = 1 LIMIT 1");
        $sql->execute([$user_id, $token]);
        if($sql->fetchColumn() > 0){
            return true;
        }
        return false;
    }

    function actualizaPassword($user_id, $password, $con){
        $sql = $con->prepare("UPDATE usuarios SET password = ?, token_password = '', password_request = 0 WHERE id = ?");
        if($sql->execute([$password, $user_id])){
            return true;
        }
        return false;
    }

?>