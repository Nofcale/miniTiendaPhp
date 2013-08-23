<?php
include_once 'lib.php';

if(isset($_POST["enviar"])){
    $db = new database();
    $cat_temp = new categoria(0,"");
    $cat_temp->nombre = $_POST["nombre"];
    $db->addCategoria($cat_temp);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Prueba SQLite</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container">
            <div class="span6">
            <h2 id="producto">Adicionar Categoría</h2>
            <p></p>
            <form class="bs-example" role="form" action="categorias.php" method="POST">
                <div class="form-group">
                    <label for="nombrecategoria">Nombre</label>
                    <input name="nombre" type="text" class="form-control" id="nombrecategoria" placeholder="Escriba el nombre completo">
                </div>
                <input type="submit" class="btn btn-default" name="enviar" value="Guardar" />
            </form>
            </div>
            <div class="span6">
                <a href="categoria.php?edit={id}"
            </div>
        </div>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
