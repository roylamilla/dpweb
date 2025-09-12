
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <center>
                    <h5 class="card-header">INGRESA LOS DATOS</h5>
                </center>
                <form id="frm_products" action="" method="">
                    <div class="card-body">
                        <div class="mb-3 row">

                            <div class="mb-3 row">
                                <label for="codigo" class="col-sm-4 col-form-label"><strong>
                                        codigo:</strong></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="codigo" name="codigo" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nombre" class="col-sm-4 col-form-label"><strong>
                                        nombre:</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="detalle" class="col-sm-4 col-form-label"><strong>detalle:</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="detalle" name="detalle" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="precio" class="col-sm-4 col-form-label"><strong>precio:</strong></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="precio" name="precio" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="stock" class="col-sm-4 col-form-label"><strong>stock:</strong></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="stock" name="stock" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="id_categoria " class="col-sm-4 col-form-label"><strong>id_categoria
                                        :</strong></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="id_categoria" name="id_categoria"
                                        required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="fecha_vencimiento"
                                    class="col-sm-4 col-form-label"><strong>fecha_vencimiento:</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="fecha_vencimiento"
                                        name="fecha_vencimiento" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="imagen" class="col-sm-4 col-form-label"><strong>
                                        imagen:</strong></label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="imagen" name="imagen" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="id_proveedor " class="col-sm-4 col-form-label"><strong>id_proveedor
                                        :</strong></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="id_proveedor" name="id_proveedor"
                                        required>
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

    </div>

    <script src="<?php echo BASE_URL; ?>view/funtion/product.js"></script>
