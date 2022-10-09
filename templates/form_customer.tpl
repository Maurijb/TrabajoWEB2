<!-- formulario de alta de tarea -->
<form action="add" method="POST" class="my-4">
    <p><b>Nuevo Cliente/Empresa</b></p>
        <div class="row">
            <div class="col-3 form-group">
                <div >
                    <label>Empresa</label>
                    <input name="company" type="text" class="form-control">
                </div>
                <div >
                    <label>Dirección</label>
                    <input name="address" type="text" class="form-control">
                </div>
                <div >
                    <label>Teléfono</label>
                    <input name="phone" type="number" class="form-control">
                </div>
                <div>
                    <label>Responsable</label>
                    <input name="responsible" type="text" class="form-control">
                </div>
              
                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            </div>
            
</form>