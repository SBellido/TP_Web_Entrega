<ul class="list-group">
  {foreach from=$categorias item=categoria}
  <li class="list-group-item">
    {if !$categoria['nombre'] }
    <s>{$categoria['nombre']} : {$categoria['descripcion']}</s>
    {else}
    {$categoria['nombre']} : {$categoria['descripcion']}
    {/if}
    {if $isAdmin}
    <a href="borrarCategoria/{$categoria['id']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
    <a href="editarCategoria/{$categoria['id']}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
    {/if}
  </li>
  {/foreach}
</ul>
