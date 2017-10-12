<?php
class CategoriaView extends View
{
  function mostrarCategoria($categorias, $invitado){
    if(isset($_SESSION['USER'])){
      $this->smarty->assign('isAdmin', true);
    }
    else {
      $this->smarty->assign('isAdmin', false);
    }
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->assign('invitado', $invitado);
    $this->smarty->display('templates/index.tpl');
  }

  function mostrarCrearCategoria($invitado){
    $this->assignarCategoriaForm();
    $this->smarty->assign('invitado', $invitado);
    $this->smarty->display('templates/formCrear.tpl');
  }

  function mostrarEditar($categoria){

    $this->smarty->assign('categoria', $categoria);
    $this->smarty->display('templates/CategoriaEditar.tpl');
  }


  function errorCrear($error, $nombre, $descripcion){
    $this->assignarCategoriaForm($nombre, $descripcion);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formCrear.tpl');
  }

  private function assignarCategoriaForm($nombre='', $descripcion=''){
    $this->smarty->assign('nombre', $nombre);
    $this->smarty->assign('descripcion', $descripcion);
  }

}

?>
