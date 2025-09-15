<!-- INICIO DE CUERPO DE PAGINA-->
<div class="container-fluid">
    <div class="card">
        <center>   
            <h5 class="card-header">EDITAR DATOS DE PRODUCTO</h5>
        </center> 
        <?php
        if (isset($_GET["views"])) {
            $ruta = explode("/", $_GET["views"]); 
            //echo $ruta[1];
        }
        ?>
        <form id="frm_edit_product" action="" method="">
            <input type="hidden" id="id_producto" name="id_producto" value="<?= $ruta[1]; ?>">
            <div class="card-body">
                <div class="mb-3 row">

                    <div class="mb-3 row">
                        <label for="codigo" class="col-sm-4 col-form-label"><strong>Código:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="codigo" name="codigo" required>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-4 col-form-label"><strong>Nombre:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="detalle" class="col-sm-4 col-form-label"><strong>Detalle:</strong></label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="precio" class="col-sm-4 col-form-label"><strong>Precio:</strong></label>
                        <div class="col-sm-8">
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="stock" class="col-sm-4 col-form-label"><strong>Stock:</strong></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                    </div>
                    
                   
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="<?=BASE_URL ?>products" class="btn btn-warning">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- FIN DE CUERPO DE PAGINA-->
<script src="<?php echo BASE_URL; ?>view/funtion/product.js"></script>
<script>
    // Llamar a la función para cargar los datos del producto cuando la página esté lista
    document.addEventListener('DOMContentLoaded', function() {
        edit_product();
    });
</script>