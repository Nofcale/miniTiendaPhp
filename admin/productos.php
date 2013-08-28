<?php
/**
 * Ejemplos de PHP básico
 * @license @jairoserrano
 */
include_once 'lib.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Prueba SQLite</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/custom.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container">

            <div class="page-header">
                <h1>Administración de productos</h1>
                <p class="lead">Adicionar, Listar, Editar y eliminación de productos.</p>
            </div>

            <div class="row">
                <div class="col-md-3"><?php admin_menu(); ?></div>
                <div class="col-md-9">
                    <h2 id="producto">Adicionar Producto</h2>
                    <form class="form-horizontal" role="form" action="categorias.php" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre completo">
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" id="precio" placeholder="Pecio">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <select class="form-control" id="categoria" >
                                <option>Uno</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control " id="descripcion" rows="3"></textarea>
                        </div>

                        <input type="submit" value="Guardar" name="enviar" class="btn btn-default" />
                    </form>
                </div>


            </div>




            <script src="http://code.jquery.com/jquery.js"></script>
            <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
