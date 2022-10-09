<form action="addOrd" method="POST" class="my-4">
    <p><b>Nueva Orden</b></p>
        <div class="row">
            <div class="col-3 form-group">
                <div >
                    <label>Cliente</label>                    
                    <select name="company2" class="form-control">                    
                    {foreach from=$customers item=$cust}
                        <option value="{$cust->id_cliente}">{$cust->empresa}</option>                        
                    {/foreach}
                    </select>
                </div>
                <div >
                    <label>Fecha</label>
                    <input name="date" type="date" class="form-control">
                </div>
                <div >
                    <label>Forma de Pago</label>                    
                    <select name="payment" class="form-control">
                        <option value="cash">Contado</option>
                        <option value="credit">Crédito</option>
                        <option value="transfer">Transferencia</option>
                        <option value="check">Cheque</option>
                        <option value="current">Cta. Cte.</option>
                    </select>
                </div>  
                <div >
                    <label>Detalle de Pedido</label>
                    <textarea name="details" class="form-control" rows="3"></textarea>
                </div>                
                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            </div>            
            
</form>