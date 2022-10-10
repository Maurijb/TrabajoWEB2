
{include file="header.tpl"}


    <form action="filter" method="POST" class="form-inline">    
    <select name="company2" class="form-control"> 
        <option >TODOS</option>                   
    {foreach from=$orderCustomer item=$cust}
        <option value="{$cust->id_cliente}">{$cust->empresa}</option>                        
    {/foreach}
    </select>
      <button class="btn btn-outline-success" type="submit">Filtrar por Cliente</button>
    </form>

{if $orderCustomer != null} 
   
<h3 class="{if count($orderCustomer)==count($send)} esconder{/if}">{$title}</h3>   

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
      <td>{$ord->detalle|truncate:25}</td>
    </tr>
    {/foreach}
    </tbody>
</table>
{/if}    


{if $send != null}  
<h3>{$subtitle}</h3>
    
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
        <td>{$env->detalle|truncate:25}</td>
    </tr>                
    {/foreach}
    </tbody>
    </table>
  {/if}




{include file="footer.tpl"}