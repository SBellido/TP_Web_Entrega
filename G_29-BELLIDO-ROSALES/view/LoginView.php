<?php
class LoginView extends View
{
  function mostrarLogin( $invitado){
    $this->smarty->assign('invitado', $invitado);
    $this->smarty->display('templates/Login/index.tpl');
  }
}
?>
