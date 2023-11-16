<?php require_once("componentes/encabezado.php"); ?>
    <main style="height: 900px;" id="inventario">
        <div class="row">
            <div class="col-md-12" >
                <div class="cont-form">
                    <!-- HAY QUE CENTRAR EL FORMULARIO LUEGO DE DARLE LOS MARGIN A LOS INPUT -->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                        <div class="input-group">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">Codigo:</label>
                                <input type="text" class="form-control" id="codigo" placeholder="Codigo" name="codigo">
                            </div>
                            <!-- HAY QUE MIRAR LOS ESTILOS, para intentar cuadrar el margin de cada uno de los mb-3 -->
                            <div class="mb-3"><!-- SI APLICO EL MARGIN-LEFT AQUI FUNCIONA, EN EL CSS NO -->
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
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
                                <label for="marca" class="form-label">Marca:</label>
                                <input type="text" class="form-control" id="marca" placeholder="Marca" name="marca">
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio:</label>
                                <input type="number" class="form-control" id="precio" placeholder="Precio del producto" name="precio">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha de vencimiento:</label>
                                <br>
                                <input type="date" name="fechaV" value="<?php echo fechaHoy(); ?>">
                            </div>
                        </div>
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
                                    <!-- hay que mirar como hacer un condicional aqui en la
                                    tabla. Si unidad del producto <=10 pintar columna de rojo 
                                    con la clase de bootstrap -->
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
                                            <!-- USAR JS para que aparezca una modal al dar clic en modificar. 
                                            se debe conservar el id del producto a modificar -->
                                            <button type="submit" class="btn btn-success" name="modificar" value="<?php echo $producto['codigo']; ?>">
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
<?php require_once("componentes/piePagina.php"); ?>