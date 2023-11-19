<?php require_once("../controlador/ControladorEncabezado.php"); ?>
    <main style="height: 900px;" id="inventario">
        <div class="row">
            <div class="col-md-12" >
                <div class="cont-form">
                    <!-- FORMULARIO PARA GUARDAR LOS PRODUCTOS -->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                        <div class="input-group">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">Codigo:</label>
                                <input type="text" class="form-control" id="codigo" placeholder="Codigo" name="codigo" value="<?php if(isset($_GET['codigo']))  echo $_GET['codigo']; ?>">
                            </div>
                            <!-- HAY QUE MIRAR LOS ESTILOS, para intentar cuadrar el margin de cada uno de los mb-3 -->
                            <div class="mb-3"><!-- SI APLICO EL MARGIN-LEFT AQUI FUNCIONA, EN EL CSS NO -->
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php if(isset($_GET['nombre']))  echo $_GET['nombre']; ?>">
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
                        <div class="input-group">
                            <div class="mb-3">
                                <label for="marca" class="form-label">Marca:</label>
                                <input type="text" class="form-control" id="marca" placeholder="Marca" name="marca" value="<?php if(isset($_GET['marca']))  echo $_GET['marca']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio:</label>
                                <input type="number" class="form-control" id="precio" placeholder="Precio del producto" name="precio" value="<?php if(isset($_GET['precio']))  echo $_GET['precio']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="unidad" class="form-label">Unidad:</label>
                                <input type="number" class="form-control" id="unidad" name="unidad" placeholder="Cantidad" value="<?php if(isset($_GET['unidad']))  echo $_GET['unidad']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha de vencimiento:</label>                                
                                <input type="date" class="form-control" name="fechaV" value="<?php echo fechaHoy(); ?>">
                            </div>
                        </div>
                        <?php if(!empty($error)):?>
                            <!-- quitar estilo y ponerlo en archivo.css -->
                            <div class="alert alert-danger" role="alert" style="text-align: center;">
                                <?php echo $error;?>
                            </div>
                        <?php elseif(!empty($mss)): ?>
                            <div class="alert alert-success" role="alert" style="text-align: center;">
                                <?php echo $error;?>
                            </div>
                        <?php endif; ?>
                        <div class="cont-btn">
                            <input type="submit" value="Guardar" class="btn btn-dark" name="guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>        
        <div class="row">
            <div class="col-md-12">
                <div class="cont-table">
                    <!-- Descargar excel -->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <button class="btnExcel" type="submit" name="excel">Descargar Excel</button>
                    </form>
                    <table  class="table">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Precio</th>
                                <th scope="col">unidad</th>
                                <th scope="col">Fecha vencimiento</th>
                                <th scope="col">Boton</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listaProductos as $producto):?>
                                <?php if($producto['unidad'] > 5 && $producto['unidad']<= 10):?>
                                    <tr class="<?php echo "table-warning"; ?>">
                                <?php elseif($producto['unidad'] < 5): ?>
                                    <tr class="<?php echo "table-danger"; ?>">
                                <?php endif; ?>
                                    <td><?php echo $producto['codigo']; ?></td>
                                    <td><?php echo $producto['nombre']; ?></td>
                                    <td><?php echo $producto['categoria']; ?></td>
                                    <td><?php echo $producto['marca']; ?></td>
                                    <td><?php echo $producto['precio']; ?></td>
                                    <td><?php echo $producto['unidad']; ?></td>
                                    <td><?php echo $producto['fechaVencimiento']; ?></td>
                                    <td> 
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                                            <button type="submit" class="btn btn-danger" name="eliminar" value="<?php echo $producto['codigo']; ?>">
                                                <i class="fa-solid fa-trash" style="color: #fafcff;" ></i>
                                            </button>                                                                                       
                                            <button type="button" class="btn btn-success"
                                            onclick="mostrarModal(<?php echo $producto['codigo']; ?>)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                                            </button>                                            
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <!-- TITULO -->
                <div class="modal-header">
                    <h1 class="modal-title fs-6" id="staticBackdropLabel" style="text-align: center;margin:center;">Actualizar productos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
                <!-- CUERPO -->
                <div class="modal-body">                    
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                        <div class="input-group" >
                            <div class="mb-3">
                                <!-- EL CODIGO ES TRAIDO DEL BOTON QUE HAY EN LA TABLA -->
                                <p>Codigo: </p>
                                <button id="codigoProductoModal" value="codigoProductoModal" name="codigo" disabled style="background-color: white;border:1px solid grey;color:black;"></button>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php if(isset($_GET['nombre']))  echo $_GET['nombre']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="marca" class="form-label">Marca:</label>
                                <input type="text" class="form-control" id="marca" placeholder="Marca" name="marca" value="<?php if(isset($_GET['marca']))  echo $_GET['marca']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoria:</label>
                                <select class="form-select" aria-label="Default select example" id="categoria" name="categoria">
                                    <option selected>-- Seleccionar --</option>
                                    <?php foreach($listaProductos as $producto):?>
                                        <option value="<?php echo $producto['categoria']; ?>">
                                            <?php echo $producto['categoria']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
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
                                <input type="date" class="form-control" name="fechaV" value="<?php echo fechaHoy(); ?>">
                            </div>
                        </div>
                        <?php if(!empty($error)):?>
                            <!-- quitar estilo y ponerlo en archivo.css -->
                            <div class="alert alert-danger" role="alert" style="text-align: center;">
                                <?php echo $error;?>
                            </div>
                        <?php elseif(!empty($mss)): ?>
                            <div class="alert alert-success" role="alert" style="text-align: center;">
                                <?php echo $error;?>
                            </div>
                        <?php endif; ?>
                        <!-- PARA QUE SE ENVIE LA INFORMACION SIN QUE LA PAGINA
                    SE REFRESQUE, ES NECESARIO USAR UN API Y ENVIAR LOS 
                VALORES POR JS A LA URL DE LA API QUE ME PERMITE HACER EL REGISTRO
            POR MEDIO DE UN JASON QUE TENDRIA LAS CARACTERISTICAS DE MI OBTEJO (PRODUCTO, pero
        ahora mismo no hare eso -->
                        <div class="cont-btn">
                            <!-- <input type="submit" value="Actualizar" class="btn btn-dark" name="modificar">-->
                        </div>
                    
                </div>
                <!-- PIE MODAL -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrarModal">Cerrar</button>                    
                        <button type="submit" class="btn btn-primary" name="modificar">Actualizar</button>
                    </form>
                </div>                
            </div>
        </div>
    </div>

<?php require_once("componentes/piePagina.php"); ?>