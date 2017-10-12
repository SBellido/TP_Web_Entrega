{include file="header.tpl"}{include file="style.tpl"}
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {if isset($error) }
    <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    <h1>Nueva Categoria</h1>
    <form action="guardarCategoria" method="post">
      <div class="form-group">
        <label for="nombre"></label>
        <input type="text" class="form-control" id="nombre" name="nombre"  value="{$nombre}" placeholder="Nombre de la categoria">
      </div>
      <div class="form-group">
        <label for="descripcion"></label>
        <textarea name="descripcion" id="descripcion" name="descripcion" rows="8" cols="50" placeholder="Descripción de la categoria">{$descripcion}</textarea>
      </div>
      <button type="submit" class="btn btn-default">Crear</button>
    </form>
  </div>
</div>
{include file="footer.tpl"}
