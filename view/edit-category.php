<!-- INICIO DE CUERPO DE PAGINA-->
<div class="container-fluid">
    <div class="card">
        <center>
            <h5 class="card-header">EDITAR DATOS DE CATEGORIA</h5>
        </center>
        <?php
        if (isset($_GET["views"])) {
            $ruta = explode("/", $_GET["views"]);
            //echo $ruta[1];
        }
        ?>
        <form id="frm_edit_category" action="" method="">
            <input type="hidden" id="id_categoria" name="id_categoria" value="<?= $ruta[1]; ?>">
            <div class="card-body">
                <div class="mb-3 row">

                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-4 col-form-label"><strong>nombre:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <<div class="mb-3 row">
                        <label for="detalle" class="col-sm-4 col-form-label"><strong>detalle:</strong></label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="detalle" id="detalle"></textarea>
                            <!--
                                <input type="textarea" class="form-control" id="detalle" name="detalle" required>
                                -->
                        </div>
                        
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="<?= BASE_URL ?>category" class="btn btn-warning">Cancelar</a>
                            </div>
                        </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- FIN DE CUERPO DE PAGINA-->
<script src="<?php echo BASE_URL; ?>view/funtion/category.js"></script>
<script>
    edit_category();
</script>