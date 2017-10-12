<ul class="list-group">
  {foreach from=$productos item=producto}
  <li class="list-group-item">
    {if !$producto['stock']}
    <ul><b>{$producto['nombre']}</b> ${$producto['precio']} - Colores: {$producto['color']} - Talles: {$producto['talle']}
      <a href="borrarProducto/{$producto['id']}"><span aria-hidden="true"></span></a>
      <a href="finalizarProducto/{$producto['id']}"><span  aria-hidden="true"></span></a>
      <a href="editarProducto/{$producto['id']}"><span aria-hidden="true"></span></a></ul></ul>

      {else}
      <s><b>{$producto['nombre']}</b> ${$producto['precio']} - Colores: {$producto['color']} - Talles: {$producto['talle']}</s>
      {/if}
      {if $isAdmin}
      <a href="borrarProducto/{$producto['id']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
      <a href="finalizarProducto/{$producto['id']}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
      <a href="editarProducto/{$producto['id']}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></ul>

      {/if}
    </li>
    {/foreach}
  </ul>
