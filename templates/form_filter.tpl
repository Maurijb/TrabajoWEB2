<form action="filter" method="POST" class="form-inline">    
<div class="col-auto">
<select name="company2" class="form-control"> 
    <option ></option>                   
{foreach from=$customers item=$cust}
    <option value="{$cust->id_cliente}">{$cust->empresa}</option>                        
{/foreach}
</select>
    <button class="btn btn-outline-success" type="submit">Filtrar por Cliente</button>
</div>  
</form>