<?php
class ProductoView extends View
{

  function mostrarProductos($productos, $invitado){
    if(isset($_SESSION['USER'])){
      $this->smarty->assign('isAdmin', true);
    }
    else {
      $this->smarty->assign('isAdmin', false);
    }
      $this->smarty->assign('productos', $productos);
      $this->smarty->assign('invitado', $invitado);
      $this->smarty->display('templates/Producto/index.tpl');
      }

  function mostrarCrearProducto($categoria,$invitado){
    $this->assignarProductoForm();
    $this->smarty->assign('invitado', $invitado);
    $this->smarty->assign('categorias', $categoria);
    $this->smarty->display('templates/formCrearProducto.tpl');
  }

  function errorCrear($error, $id_categoria, $precio, $color, $talle, $stock){
    $this->assignarProductoForm($id_categoria, $precio, $color, $talle, $stock);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formCrearProducto.tpl');
  }

  private function assignarProductoForm($id_categoria='', $precio='', $color='', $talle='', $stock= 1){
    $this->smarty->assign('id_categoria', $id_categoria);
    $this->smarty->assign('precio', $precio);
    $this->smarty->assign('color', $color);
    $this->smarty->assign('talle', $talle);
    $this->smarty->assign('stock', $stock);

  }

}

 ?>
