
<?php

class producto {

    var $id = 0;
    var $nombre = "";
    var $precio = "";
    var $id_categoria = 0;
    var $descripcion = "";

}

class categoria {

    var $id = 0;
    var $nombre = "";

    function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

}

class database {

    private $conn = null;

    function __construct() {
        $this->conn = new PDO('sqlite:../db/tienda.sqlite');
    }

    function adicionarCategoria(categoria $categoria) {
        $sql = "INSERT INTO categoria(nombre) VALUES(:nombre)";
        $res = $this->conn->prepare($sql);
        $res->execute(array("nombre" => $categoria->nombre));
    }

    function obtenerTodoCategoria() {
        $sql = "SELECT * FROM categoria";
        $tmp = array();
        foreach ($this->conn->query($sql) as $key => $value) {
            array_push($tmp, new categoria($value["id"], $value["nombre"]));
        }
        return $tmp;
    }

    function obtenerCategoria($id) {
        $sql = "SELECT * FROM categoria where id=:id";
        $res = $this->conn->prepare($sql);
        $res->execute(array("id" => $id));
        $tmp = $this->conn->query($sql);
        if (is_array($tmp)) {
            $categoria = new categoria($tmp["id"], $tmp["nombre"]);
            return $categoria;
        } else {
            return false;
        }
    }

}

$db = new database();

function menu() {
    echo'<div class="logo">&nbsp;</div>
        <ul class="nav nav-pills nav-stacked menu">
            <li class="active"><a href="/admin">Home</a></li>
            <li><a href="/admin/categorias.php">Categoría</a></li>
            <li><a href="/admin/productos.php">Productos</a></li>
        </ul>';
}

?>
