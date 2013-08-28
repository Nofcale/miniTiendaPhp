<?php
/**
 * Ejemplos de PHP básico
 * @license @jairoserrano
 */

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

/**
 * Menú del backend
 */
function admin_menu() {
    $current = explode("/", $_SERVER["PHP_SELF"])[2];
    $menu = array("Admin" => "index.php", "Categorías" => "categorias.php", "Productos" => "productos.php");

    echo'<div class="logo">&nbsp;</div>';
    
    echo '<ul class="nav nav-pills nav-stacked menu">';
    foreach ($menu as $key => $value) { 
        if ($current == $value) {
            echo "<li class='active'><a href='$value'>$key</a></li>";
        } else {
            echo "<li><a href='$value'>$key</a></li>";
        }
    }
    echo '</ul>';
}

?>
