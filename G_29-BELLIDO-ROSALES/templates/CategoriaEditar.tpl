{include file="header.tpl"}{include file="style.tpl"}
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {if isset($error) }
    <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    <h1>Editar Categoria</h1>
    <form action="editarCategoria" method="post">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre"  value="{$categoria['nombre']}">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" name="descripcion" rows="8" cols="50">{$categoria['descripcion']}</textarea>
      </div>
      <button type="submit" class="btn btn-default">Editar</button>
    </form>
  </div>
</div>
{include file="footer.tpl"}
