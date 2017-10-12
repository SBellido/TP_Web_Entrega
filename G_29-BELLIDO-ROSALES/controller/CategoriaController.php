<?php
include_once('model/CategoriaModel.php');
include_once('view/CategoriaView.php');

class CategoriaController extends SecuredController
{

  function __construct()
  {
    parent::__construct();
    $this->view = new CategoriaView(); // construye el objeto CategoriaView
    $this->model = new CategoriaModel();// construye el objeto CategoriaModel
  }

  public function index()
  {
    $invitado = SecuredController::getUser();

    $categorias = $this->model->getCategoria();
    $this->view->mostrarCategoria($categorias, $invitado);
  }

  public function create()
  {

    $invitado = SecuredController::getUser();
    if($invitado!==false){
      $this->view->mostrarCrearCategoria($invitado);  }
      else {
        header('Location: '.HOME);
      }
    }

    public function store()
    {
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];

      if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
        $this->model->guardarCategoria($nombre, $descripcion);
        header('Location: '.HOME);
      }else{
        $this->view->errorCrear("El campo nombre es requerido", $nombre, $descripcion);
      }
    }

    public function destroy($params)
    {
      $id = $params[0];
      $this->model->borrarCategoria($id);
      header('Location: '.HOME);
    }

    public function finish($params)
    {
      $id= $params[0];
      $this->model->finalizarCategoria($id);
      header('Location: '.HOME);
    }

    public function edit($params)
    {
      $id= $params[0];
      $categoria = $this->model->getCategoriaById($id);
      var_dump($categoria);
      $this->view->mostrarEditar($categoria);
    }

  }

  ?>
