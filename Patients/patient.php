<?php
include('../config/config.php'); /* LLAMAMOS CONFIG DE URLS */
include('../config/database.php'); /* CONEXION A LA BD */


class recetas{
    public $conexion; /* LLAMO LA CONEXION DE MI BASE DE DATOS */

    function __construct(){
        $db= new Database(); /* LA CONEXION A LA BD SIEMPRE SE RENUEVE O ESTE EN LINEA */
        $this->conexion = $db->connectToDatabase();
    }

    function save($params){
        $nombre= $params['nombre']; 
  $apellido= $params['apellido'];
  $email = $params['email'];
  $celular = $params['celular'];
  $enfermedad = $params['enfermedad'];
  $fecha = $params['fecha'];
  $duracion = $params['duracion'];
  $imagen = $params['imagen'];

        $insert= "INSERT INTO paciente VALUES (NULL, '$nombre', '$apellido', '$email', '$celular', '$enfermedad','$fecha','$duracion','$imagen')"; /* INSERTAR EN LA TABLA LOS SIGUIENTES VALORES */

        return mysqli_query($this->conexion, $insert); /* ENVIAR A LA BD TODO LO QUE ESTE DENTRO DE INSERT */

    }

    function getAll(){
        $basededatos= "SELECT * FROM paciente"; /* Traigame todos los usuarios */
        return mysqli_query($this->conexion, $basededatos);
    }

    function getOne($id){
        $sql = "SELECT * FROM paciente WHERE id = $id";
        return mysqli_query($this->conexion, $sql);
      }
    function update($params){
        $nombre= $params['nombre']; 
  $apellido= $params['apellido'];
  $email = $params['email'];
  $celular = $params['celular'];
  $enfermedad = $params['enfermedad'];
  $fecha = $params['fecha'];
  $duracion = $params['duracion'];
  $imagen = $params['imagen'];
        $id = $params['id'];
  
        $update = " UPDATE paciente SET nombre='$nombre', apellido='$apellido', email='$email', celular='$celular', enfermedad='$enfermedad', fecha='$fecha', duracion='$duracion', imagen='$imagen' WHERE id = $id";
        return mysqli_query($this->conexion, $update);
      }
  
    function delete($id){
        $eliminar= "DELETE FROM paciente WHERE id = $id"; /* Elimine de la tabla x, el id que me */
        return mysqli_query($this->conexion, $eliminar);
    }

}



?>