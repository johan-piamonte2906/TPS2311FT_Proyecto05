<?php

require_once '../config/database.php';
require_once '../config/config.php';
require_once '../header.php';

if(!isset($_SESSION['user_type'])){
    header('Location: ../../index.php');
    exit;
}

if($_SESSION['user_type'] != 'admin'){
    header('Location: ../../../index.php');
    exit;
}

$db = new Database();
$con = $db->conectar();

$id = $_GET['id'];

$sql = $con->prepare("SELECT id, nombres, descrip, precio, stock, descuento, id_categoria FROM products WHERE id = ? AND activo = 1");
$sql->execute([$id]);
$producto = $sql->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT id, nombre FROM categorias WHERE activo = 1";
$resultado = $con->query($sql);
$categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

$rutaImagenes = '../../../src/img/productos/'. $id . '/';
$rutaPrincipal = $rutaImagenes . 'index.jpg';

$imgenes = [];
$dirInit = dir($rutaImagenes);

while(($archivo = $dirInit->read()) !== false){
    if($archivo != 'index.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))){
        $img = $rutaImagenes . $archivo;
        $imgenes[] = $img;
    }
}
$dirInit->close();
?>

<style>
    .ck-editor__editable[role="textbox"]{
        min-height: 250px;
    }
</style>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-3">Modificar Producto</h1>
        <hr>
        <form action="actualiza.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
            <div class="mb-3">
                <label for="nombres" class="form-label">Titulo Producto</label>
                <input class="form-control" type="text" name="nombres" id="nombres" value="<?php echo htmlspecialchars($producto['nombres'], ENT_QUOTES); ?>" required autofocus>
            </div>
            <div class="mb-3">
                <label for="descrip" class="form-label">Descripcion Producto</label>
                <textarea class="form-control" name="descrip" id="editor" required ><?php echo $producto['descrip']; ?></textarea>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="imagen_principal" class="form-label">Imagen Producto</label>
                    <input type="file" class="form-control" name="imagen_principal" id="imagen_principal" accept="image/jpg">
                </div>
                <div class="col">
                    <label for="imagenes_opcionales" class="form-label">Imagen Producto Opcional</label>
                    <input type="file" class="form-control" name="imagenes_opcionales" id="imagenes_opcionales" accept="image/jpg">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <?php if(file_exists($rutaPrincipal)) {?>
                        <img src="<?php echo $rutaPrincipal . '?id='. time(); ?>" class="img-thumbnail my-3"> <br>
                        <button class="btn btn-danger btn-sm" onclick="eliminaImagen('<?php echo $rutaPrincipal; ?>')">Eliminar</button>
                    <?php }?>
                </div>
                <div class="col">
                    <div class="row">
                        <?php foreach($imgenes as $img) {?>
                            <div class="col-4">
                                <img src="<?php echo $img; ?>" class="img-thumbnail my-3"> <br>
                                <button class="btn btn-danger btn-sm" onclick="eliminaImagen('<?php echo $img; ?>')">Eliminar</button>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="precio" class="form-label">Precio Producto</label>
                    <input class="form-control" type="number" name="precio" id="precio" value="<?php echo $producto['precio']; ?>" required >
                </div>
                <div class="col mb-3">
                    <label for="descuento" class="form-label">Descuento Producto</label>
                    <input class="form-control" type="number" name="descuento" id="descuento" value="<?php echo $producto['descuento']; ?>" required >
                </div> 
                <div class="col mb-3">
                    <label for="stock" class="form-label">Stock Producto</label>
                    <input class="form-control" type="number" name="stock" id="stock" value="<?php echo $producto['stock']; ?>" required >
                </div> 
            </div>
            <div class="row">
                <div class="col-4 mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                        <select class="form-select" name="categoria" id="categoria" required>
                            <option value="">Seleccionar</option>
                            <?php foreach ($categorias as $categoria) {?>
                                <option value="<?php echo $categoria['id']; ?>" <?php if($categoria['id'] == $producto['id_categoria']) echo 'selected'; ?>><?php echo $categoria['nombre']; ?></option>
                            <?php }?>
                        </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</main>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    function eliminaImagen(urlImagen){
        let url = 'elimina_imagen.php'
        let formData = new FormData()
        formData.append('urlImagen', urlImagen)

        fetch(url,{
            method: 'POST',
            body: formData
        }).then((response) =>{
            if(response.ok){
                location.reload()
            }
        })
    }
</script>


<?php include '../footer.php'; ?>