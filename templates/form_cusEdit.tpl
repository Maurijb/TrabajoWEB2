
{include file="header.tpl"}
<form action="editCustForm" method="POST" class="my-4">
    <p><b>Nuevo Cliente/Empresa</b></p>
        <div class="row">
            <div class="col-3 form-group">
                    <label>ID</label>
                    <input name="id" type="text" class="form-control" value="{$id} ">
                <div >
                    <label>Empresa</label>
                    <input name="company" type="text" class="form-control" value="{$company} ">
                </div>
                <div >
                    <label>Dirección</label>
                    <input name="address" type="text" class="form-control" value="{$address} ">
                </div>
                <div >
                    <label>Teléfono</label>
                    <input name="phone" type="number" class="form-control" value=" {$phone}">
                </div>
                <div>
                    <label>Responsable</label>
                    <input name="responsible" type="text" class="form-control" value="{$responsible} ">
                </div>
              
                <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
            </div>
            
</form>

{include file="footer.tpl"}