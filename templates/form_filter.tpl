<form action="filter" method="POST" class="form-inline mt-2">    
<div class="col-auto">
<select name="company2" class="form-control"> 
    <option ></option>                   
{foreach from=$customers item=$cust}
    <option value="{$cust->id_cliente}">{$cust->empresa}</option>                        
{/foreach}
</select>
<button class="btn btn-outline-success mt-2" type="submit">Filtrar por Cliente</button>
</div>  
</form>