<?php require_once("../controlador/ControladorEncabezado.php"); ?>
    <main style="height: 900px;" id="empleados">
        <div class="row">
            <div class="col-md-12" >
                <div class="cont-form">
                    <!-- HAY QUE CENTRAR EL FORMULARIO LUEGO DE DARLE LOS MARGIN A LOS INPUT -->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                        <div class="input-group">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">Codigo Empleado:</label>
                                <input type="text" class="form-control" id="codigo" placeholder="Codigo" name="numEmp" value="<?php echo $_GET['numEmp']; ?>">
                            </div>
                            <!-- HAY QUE MIRAR LOS ESTILOS, para intentar cuadrar el margin de cada uno de los mb-3 -->
                            <div class="mb-3"><!-- SI APLICO EL MARGIN-LEFT AQUI FUNCIONA, EN EL CSS NO -->
                                <label for="cedula" class="form-label">Cedula:</label>
                                <input type="text" class="form-control" id="cedula" placeholder="cedula" name="cedula" value="<?php echo $_GET['cedula']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre" value="<?php echo $_GET['nombre']; ?>">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad:</label>
                                <input type="text" class="form-control" id="edad" placeholder="edad" name="edad" value="<?php echo $_GET['edad']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">telefono:</label>
                                <input type="text" class="form-control" id="telefono" placeholder="telefono del empleado" name="telefono" value="<?php echo $_GET['telefono']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">correo:</label>
                                <input type="email" class="form-control" id="correo" placeholder="correo del empleado" name="correo" value="<?php echo $_GET['correo']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">direccion:</label>
                                <input type="text" class="form-control" id="direccion" placeholder="direccion del empleado" name="direccion" value="<?php echo $_GET['direccion']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="cargo" class="form-label">cargo:</label>
                                <input type="text" class="form-control" id="cargo" placeholder="cargo del empleado" name="cargo" value="<?php echo $_GET['cargo']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="salario" class="form-label">salario:</label>
                                <input type="number" class="form-control" id="salario" placeholder="salario del empleado" name="salario" value="<?php echo $_GET['salario']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha de contratación:</label>
                                <br>
                                <input type="date" name="fechaC" value="<?php echo fechaHoy(); ?>">
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
                    <table  class="table">
                        <thead>
                            <tr>                                
                                <th scope="col">Codigo Emp</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Salario</th>
                                <th scope="col">Fecha contratación</th>
                                <th scope="col">Boton</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listaEmpleados as $empleado):?><!-- un checkBox para mostrar solo los activos hacer una mejora, solo mostrar los que estan activos-->
                                <tr>                                    
                                    <td><?php echo $empleado['numero_empleado']; ?></td>                                    
                                    <td><?php echo $empleado['nombre']; ?></td>                                    
                                    <td><?php echo $empleado['correo']; ?></td>
                                    <td><?php echo $empleado['direccion']; ?></td>                                    
                                    <td><?php echo $empleado['cargo']; ?></td>
                                    <td><?php echo $empleado['salario']; ?></td>
                                    <td><?php echo $empleado['fecha_contratacion']; ?></td>
                                    <td> 
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                                            <button type="submit" class="btn btn-danger" name="eliminar" value="<?php echo $empleado['codigo']; ?>">
                                                <i class="fa-solid fa-trash" style="color: #fafcff;" ></i>
                                            </button>
                                            <!-- USAR JS para que aparezca una modal al dar clic en modificar. 
                                            se debe conservar el id del empleado a modificar -->
                                            <button type="submit" class="btn btn-success" name="modificar" value="<?php echo $empleado['codigo']; ?>">
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