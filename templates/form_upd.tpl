{include file="header.tpl"}

<form action="editForm" method="POST" class="my-4">
    <p><b>Editar Orden</b></p>
        <div class="row">
            <div class="col-3 form-group">
               
                                      
                    <input name="id" type= "hidden" class="form-control" value='{$id}'>                  
                  
                <div >
                    <label>Cliente</label>                    
                    <input name="company2" type= "text" class="form-control" value='{$customer}' disabled>                    
                   
                    </input>
                </div>
                <div >
                    <label>Fecha</label>
                    <input name="date" type="text" class="form-control" value='{$date}'>
                    
                    </input>
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
                    <textarea name="details" class="form-control" rows="3">{$detail}</textarea>
                </div>                
                <button type="submit" class="btn btn-primary mt-2">Editar</button>
            </div>            
            
</form>


{include file="footer.tpl"}