{include file="header.tpl"}



{include file="form_order.tpl"}

<div class="col-7">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Empresa</th>
      <th scope="col">Fecha</th>
      <th scope="col">F Pago</th>
      <th scope="col">Detalle</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$ordersCustomer item=$ord}
       
    <tr class="{if {$ord->enviado}}enviado{/if}">
        <th scope="row"><a href="order/{$ord->id_cliente}">{$ord->empresa}</a></th>
      <td>{$ord->fecha_pedido}</td>
      <td>{$ord->forma_pago}</td>
      <td>{$ord->detalle|truncate:25}</td>
      <td>{if !$ord->enviado}
        <a href='send/{$ord->n_pedido}' type='button' class='btn btn-success'>Enviar</a>
        {else}                    
        <a href='asigne/{$ord->n_pedido}' type='button' class='btn btn-info'>Reasignar</a>
        {/if} 
        <a href='deleteOrd/{$ord->n_pedido}' type='button' class='btn btn-danger'>Borrar</a> 
        <a href='update/{$ord->n_pedido}' type='button' class='btn'>Editar</a> 
       </td>
    </tr>
    
    {/foreach}
    </tbody>
</table>
</div>


{include file="footer.tpl"}