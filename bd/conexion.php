<?php 
    class Conexion{
        private $host;
        private $user;
        private $password;
        private $bd;

        public function __construct()
        {
            $this->host = "localhost";
            $this->user = "root";
            $this->password = "";
            $this->bd = "db_prueba";
        }

        public function connect()
        {
            try{
                $conexion = "mysql:host=".$this->host.";dbname=".$this->bd.";charset=utf8";
                $atributos = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                $objectPDO = new PDO($conexion,$this->user,$this->password,$atributos);
                
                return $objectPDO;
            }catch(PDOException $e){
                die("ERROR : ".$e->getMessage());
            }   
        }

    }

    //Codigo para probar el correcto funcionamiento de la conexion
    $objectConexion = new Conexion();
    $bd = $objectConexion->connect();

    $sql = "SELECT * FROM usuarios";
    $result = $bd->query($sql);
    
   echo "<table>
  <tr>
    <th>ID</th>
    <th>NOMBRE</th>
    <th>CUMPLEAÑOS</th>
    <th>CORREO</th>
  </tr>";
   foreach($result as $dato){
    echo "<tr>";
        echo "<td>".$dato['id']."</td>";
        echo "<td>".$dato['nombre']."</td>";
        echo "<td>".$dato['fecha_nac']."</td>";
        echo "<td>".$dato['correo']."</td>";
    echo "</tr>";
   }

    echo "</table>";

?>