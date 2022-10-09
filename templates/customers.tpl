{include file="header.tpl"}


{include file="form_customer.tpl"}

	

<!-- lista de customers -->

<div class="col-7">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Cliente</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Responsable</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$customers item=$cust}
       
    <tr>
        <th scope="row">{$cust->empresa}</th>
      <td>{$cust->direccion}</td>
      <td>{$cust->telefono}</td>
      <td>{$cust->responsable}</td>
      <td>
        <a href='delete/{$cust->id_cliente}' type='button' class='btn btn-danger'>Borrar</a>        
       </td>
    </tr>
    
    {/foreach}
    </tbody>
</table>
</div>



{include file="footer.tpl"}