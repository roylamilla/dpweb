
    <div class="container-fluid">
        <div class="card">
            <center>   
                <h5 class="card-header">INGRESA LOS DATOS DE COMPRA</h5>
            </center> 
            <form id="frm_shops" action="" method="">
                <div class="card-body">
                    <div class="mb-3 row">

                        <div class="mb-3 row">
                            <label for="id_producto" class="col-sm-4 col-form-label"><strong>id_producto :</strong></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="id_producto" name="id_producto" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="cantidad" class="col-sm-4 col-form-label"><strong>cantidad :</strong></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="precio" class="col-sm-4 col-form-label"><strong>precio :</strong></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="precio" name="precio" required>
                            </div>
                        </div>
                         <div class="mb-3 row">
                            <label for="id_trabajador" class="col-sm-4 col-form-label"><strong>id_trabajador  :</strong></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="id_trabajador" name="id_trabajador" required>
                            </div>
                        </div>
                        
                        
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<script src="<?php echo BASE_URL; ?>view/funtion/shops.js"></script>