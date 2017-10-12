<?php
class CategoriaModel extends Model
{
  function getCategoria(){
    $sentencia = $this->db->prepare("select * from categoria"); //conecta con la tabla de MySQL
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function guardarCategoria($nombre, $descripcion){
    $sentencia = $this->db->prepare('INSERT INTO categoria(nombre, descripcion) VALUES(?,?)');
    $sentencia->execute([$nombre, $descripcion]);
  }

  function borrarCategoria($id){
    $invitado = SecuredController::getUser();
    if($invitado!==false){
      $sentencia = $this->db->prepare("delete from categoria where id=?");
      $sentencia->execute([$id]);
    }
    else {
      header('Location: '.PRODUCTO);
    }
  }

  function editarCategoria($id, $nombre, $descripcion){
    $invitado = SecuredController::getUser();
    if($invitado!==false){
      $sentencia = $this->db->prepare("update categoria set nombre=?, descripcion=? where id=?");
      $sentencia->execute([$nombre, $descripcion, $id]);
    }
  }

  function getCategoriaById($id){
    $invitado = SecuredController::getUser();
    if($invitado!==false){
      $sentencia = $this->db->prepare("select * from categoria where id = ?");

      $sentencia->execute([$id]);
      $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $result[0];
    }
  }

}


?>
