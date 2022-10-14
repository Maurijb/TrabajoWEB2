
{include file="header.tpl"}
<div class="col-4">
{include file="form_filter.tpl"}
</div>

{if $orderCustomer != null} 
   
<h3 class="{if count($orderCustomer)==count($send)} esconder{/if} mt-5">{$title}</h3>   

<table class="table table-hover {if count($orderCustomer)==count($send)} esconder{/if}">
  <thead>
    <tr>
      <th scope="col">Empresa</th>
      <th scope="col">Fecha</th>
      <th scope="col">F Pago</th>
      <th scope="col">Detalle</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$orderCustomer item=$ord}
    <tr class="{if $ord->enviado} esconder{/if}">
      <th scope="row">{$ord->empresa}</th>
      <td>{$ord->fecha_pedido}</td>
      <td>{$ord->forma_pago}</td>
      <td><a href="detail/{$ord->n_pedido}">{$ord->detalle|truncate:25}</a></td>
    </tr>
    {/foreach}
    </tbody>
</table>
{/if}    


{if $send != null}  
<h3 class=" mt-5">{$subtitle}</h3>
    
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Empresa</th>
      <th scope="col">Fecha</th>
      <th scope="col">F Pago</th>
      <th scope="col">Detalle</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$send item=$env}
    <tr>
        <th scope="row">{$env->empresa}</th>
        <td>{$env->fecha_pedido}</td>
        <td>{$env->forma_pago}</td>
        <td><a href="detail/{$env->n_pedido}">{$env->detalle|truncate:25}</a></td>
    </tr>                
    {/foreach}
    </tbody>
    </table>
  {/if}




{include file="footer.tpl"}