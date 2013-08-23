
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
        $this->conn = new PDO('sqlite:tienda.sqlite');
    }

    function adicionarCategoria(categoria $categoria) {
        $sql = "INSERT INTO categoria(nombre) VALUES(:nombre)";
        $res = $this->conn->prepare($sql);
        $res->execute(array("nombre" => $categoria->nombre));
    }

    function obtenerTodoCategoria() {
        $sql = "SELECT * FROM categoria";
        $tmp = array();
        foreach ($conn->query($sql) as $key => $value) {
            array_push($tmp, new categoria($value["id"],$value["nombre"]));
        }
        return $tmp;
    }

}


//Ruta a la Base de datos
/* Sentencia SQL
  $sql = 'SELECT * FROM empresa';
  //Ejecución de la sentencia y captura de datos
  foreach ($conn->query($sql) as $row) {
  echo $row['id'] . " " . $row['nombre'] . "<br>";
  }

  $sql = 'SELECT *
  FROM localizacion
  WHERE id_nodo = :idnodo';
  $cons = $conn->prepare($sql);
  $cons->execute(array(':idnodo' => 1));
  $res = $cons->fetchAll();
  foreach ($res as $row) {
  echo "el nodo 1 en la fecha " . $row["fecha"] . " pasó por " . $row["barrio"] . "<br>";
  }
 * */
?>
