<?php require_once("../controlador/ControladorEncabezado.php"); ?>
    <main style="margin-left: 80px;margin-top:60px;">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="input-group">
                        <h1> Selecionar proveedor </h1>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php if(isset($_GET['nombre']))  echo $_GET['nombre']; ?>">
                        </div>
                        <!-- LEER CODIGO BARRAS 
                        Esto deberia ir al lado -->
                        <h4>Registrar producto</h4>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Codigo:</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php if(isset($_GET['nombre']))  echo $_GET['nombre']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Cantidad:</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php if(isset($_GET['nombre']))  echo $_GET['nombre']; ?>">
                        </div>
                        <!-- En cuanto se le compra al proveedor -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Precio compra:</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php if(isset($_GET['nombre']))  echo $_GET['nombre']; ?>">
                        </div>
                        <!-- La fecha se debe guardar sola, al presionar el boton de guardar-->
                    </div>
                    <div class="input-group">
                        <h1>Registrar proveedor si no existe</h1>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php if(isset($_GET['nombre']))  echo $_GET['nombre']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" id="codigo" placeholder="Codigo" name="codigo" value="<?php if(isset($_GET['codigo']))  echo $_GET['codigo']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Dirección:</label>
                            <input type="text" class="form-control" id="codigo" placeholder="Codigo" name="codigo" value="<?php if(isset($_GET['codigo']))  echo $_GET['codigo']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoria:</label>
                            <select class="form-select" aria-label="Default select example" id="categoria" name="categoria">
                                <option selected> -- Seleccionar -- </option>
                                <?php foreach($listaProductos as $producto):?>
                                    <option value="<?php echo $producto['categoria']; ?>">
                                        <?php echo $producto['categoria']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>            
            <div class="col-md-6">                
                <form action="" method="POST">

                </form>
            </div>
        </div>
    </main>
<?php require_once("componentes/piePagina.php"); ?>