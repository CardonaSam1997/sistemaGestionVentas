<?php require_once("../controlador/ControladorEncabezado.php"); 

?>
    <main style="height: 1900px;" id="empleados">
        <div class="row">
            <div class="col-md-12" >
                <div class="cont-form">
                    <!-- HAY QUE CENTRAR EL FORMULARIO LUEGO DE DARLE LOS MARGIN A LOS INPUT -->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="input-group">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">Codigo Empleado:</label>
                                <input type="text" class="form-control" id="codigo" placeholder="Codigo" name="numEmp" value="<?php if(isset($_GET['numEmp'])) echo  $_GET['numEmp']; ?>">
                            </div>
                            <!-- HAY QUE MIRAR LOS ESTILOS, para intentar cuadrar el margin de cada uno de los mb-3 -->
                            <div class="mb-3"><!-- SI APLICO EL MARGIN-LEFT AQUI FUNCIONA, EN EL CSS NO -->
                                <label for="cedula" class="form-label">Cedula:</label>
                                <input type="text" class="form-control" id="cedula" placeholder="Cedula" name="cedula" value="<?php if(isset($_GET['cedula'])) echo  $_GET['cedula']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre completo" name="nombre" value="<?php if(isset($_GET['nombre'])) echo  $_GET['nombre']; ?>">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad:</label>
                                <input type="text" class="form-control" id="edad" placeholder="Edad" name="edad" value="<?php if(isset($_GET['edad'])) echo $_GET['edad']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">telefono:</label>
                                <input type="text" class="form-control" id="telefono" placeholder="telefono del empleado" name="telefono" value="<?php if(isset($_GET['telefono']))  echo $_GET['telefono']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">correo:</label>
                                <input type="email" class="form-control" id="correo" placeholder="correo del empleado" name="correo" value="<?php if(isset($_GET['correo'])) echo $_GET['correo']; ?>">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="mb-3">
                                <label for="direccion" class="form-label">direccion:</label>
                                <input type="text" class="form-control" id="direccion" placeholder="direccion del empleado" name="direccion" value="<?php if(isset($_GET['direccion']))  echo $_GET['direccion']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="cargo" class="form-label">cargo:</label>
                                <input type="text" class="form-control" id="cargo" placeholder="cargo del empleado" name="cargo" value="<?php if(isset($_GET['cargo']))  echo $_GET['cargo']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="salario" class="form-label">salario:</label>
                                <input type="number" class="form-control" id="salario" placeholder="salario del empleado" name="salario" value="<?php if(isset($_GET['salario']))  echo $_GET['salario']; ?>">
                            </div>
                        </div>
                        <div class="input-group">                            
                            <div class="mb-3">
                                <label class="form-label">Fecha de contratación:</label>                                
                                <input type="date" class="form-control" name="fechaC" value="<?php echo fechaHoy(); ?>">
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
        <!-- TABLA -->      
        <div class="row">
            <div class="col-md-12">                
                <div class="cont-table">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <button class="btnExcel" type="submit" name="excel">Descargar Excel</button>
                    </form>
                    <table  class="table">
                        <thead>
                            <tr>                                
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>                                
                                <th scope="col">Cargo</th>
                                <th scope="col">Salario</th>
                                <th scope="col">Fecha contratación</th>
                                <th scope="col">Boton</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpoTabla">
                            <?php foreach ($listaEmpleados as $empleado):?>
                            <!-- Si la persona le terminaron el contrato, no aparece mas en la tabla,
                            pero este NO es eliminado de la BD -->
                                <?php if(!empty($empleado['fechaTerminacion'])): continue;?>
                                <?php else: ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                <tr>
                                    <td><?php echo $empleado['codigo']; ?> </td>
                                    <td name="<?php echo $empleado['nombre']; ?>" value = "<?php echo $empleado['nombre']; ?>"   ><?php echo $empleado['nombre']; ?> </td>
                                    <td><?php echo $empleado['cargo']; ?> </td>
                                    <td><?php echo $empleado['salario']; ?> </td>
                                    <td><?php echo $empleado['fechaContratacion']; ?> </td>
                                    <td>
                                        
                                            <button type="button" class="btn btn-success" name="actualizar"
                                                onclick="mostrarModal(<?php echo $empleado['codigo'].['nombre']; ?>)" 
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>   
                                <?php endif; ?>                             
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- MODAL -->
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
                        <p>Codigo: </p>
                        <button id="codigoProductoModal" value="codigoProductoModal" name="codigo" disabled style="background-color: white;border:1px solid grey;color:black;"></button>                        
                        <div class="input-group" >
                                <!-- EL CODIGO ES TRAIDO DEL BOTON QUE HAY EN LA TABLA -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php if(isset($_POST['nombre']))  echo $_POST['nombre']; ?>">
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
                                <input type="date" class="form-control" name="fechaV" id="fechaV" value="<?php echo fechaHoy(); ?>">
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
                        <!-- INTENTAR QUE ESTE SEA CON FETCH -->
                        <div class="cont-btn">
                            <input type="submit" value="Actualizar"  class="alert alert-success" role="alert" id="modificar" name="modificar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require_once("componentes/piePagina.php"); ?>