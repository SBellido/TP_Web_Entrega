<?php
class ProductoModel extends Model
{
  function getProducto(){
    $sentencia = $this->db->prepare("select * from producto"); //conecta con la tabla de MySQL
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function getProductos(){
    $sentencia = $this->db->prepare("select p.id, c.nombre, p.precio, p.color, p.talle, p.stock from producto as p INNER JOIN categoria c on p.id_categoria = c.id "); //conecta con la tabla de MySQL
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function guardarProducto($id_categoria, $precio, $color, $talle, $stock){
    $sentencia = $this->db->prepare('INSERT INTO producto(id_categoria, precio, color, talle, stock) VALUES(?,?,?,?,?)');
    $sentencia->execute([$id_categoria, $precio, $color, $talle, $stock]);
  }

  function borrarProducto($id) {
    $invitado = SecuredController::getUser();
    if($invitado!==false){
      $sentencia = $this->db->prepare("delete from producto where id=?");
      $sentencia->execute([$id]);
    }
    else {
      header('Location: '.HOME);
    }
  }
  function editarProducto($id) {
    $sentencia = $this->db->prepare("edit from producto where id=?");
    $sentencia->execute([$id]);
  }

  function finalizarProducto($id) {
    $invitado = SecuredController::getUser();
    if($invitado!==false){
      $sentencia = $this->db->prepare("update producto set stock=1 where id=?");
      $sentencia->execute([$id]);
    }
    else {
      header('Location: '.HOME);
    }
  }
}
?>
