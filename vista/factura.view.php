<?php require_once("componentes/encabezado.php"); ?>
    <main>
        <fieldset>
            <form action="" method="post">
                <div class="input-group">                            
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="number" class="form-control" id="precio" placeholder="Precio del producto" name="precio" value="<?php if(isset($_GET['precio']))  echo $_GET['precio']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="unidad" class="form-label">Unidad:</label>
                        <input type="number" class="form-control" id="unidad" name="unidad"  placeholder="Cantidad" value="<?php if(isset($_GET['unidad']))  echo $_GET['unidad']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de vencimiento:</label>                                
                        <input type="date" class="form-control" name="fechaV" id="fechaV" value="<?php echo fechaHoy(); ?>">
                    </div>
                </div>
            </form>
        </fieldset>
    </main>
<?php require_once("componentes/piePagina.php"); ?>