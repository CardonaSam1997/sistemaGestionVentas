<?php require_once("../controlador/ControladorEncabezado.php"); ?>
<!-- DESDE AQUI -->
    <main id="menuPrincipal">
        <div class="row">
            <div class="col-md-12">                
                <div style="width: 90%;margin-left:60px;">                
                    <canvas id="myChart" style="height:60vh; width:90vw;position:relative;"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div style="width: 90%;margin-left:60px;">                
                    <canvas id="myChart2" ></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div style="width: 90%;margin-left:60px;">                
                    <canvas id="myChart3" ></canvas>
                </div>
            </div>
        </div>
    </main>    
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var ctx3 = document.getElementById('myChart3').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            //datos
            data: {
                //columnas
                labels:
                    ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                    'Agosto', 'Septiembre',  'Octubre', 'Noviembre','Diciembre'],
                datasets: [
                    {
                        //titulo
                        label: 'Ganancias Mensuales',
                        //Valor de las columnas - agregar el dinamismo aqui
                        data: [30, 40, 93, 65, 72, 43,100, 9, 20, 50, 60, 33],
                        //colores
                       // borderWidth: 2,
                        borderColor: ' #000000  ',
                        backgroundColor:["#9BD0F5", "#e3df13", " #e9280a "," #0ae6e9 "," #0a12e9 "," #7f0ae9 "," #3b3a3d "]                        
                    }
                ]
            },
            //opciones
            options: {                
              scales: {                
                //permite que los valores mas minimos se vean
                y: {
                  beginAtZero: true
                } 
              }
            }
        });

        //2
        new Chart(ctx2, {
            type: 'pie',
            //datos
            data: {
                //columnas
                labels:
                    ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                    'Agosto', 'Septiembre',  'Octubre', 'Noviembre','Diciembre'],
                datasets: [
                    {
                        //titulo
                        label: 'Ganancias Mensuales',
                        //Valor de las columnas - agregar el dinamismo aqui
                        data: [30, 40, 93, 65, 72, 43,100, 9, 20, 50, 60, 33],
                        //colores
                       // borderWidth: 2,
                        borderColor: ' #000000  ',
                        backgroundColor:["#9BD0F5", "#e3df13", " #e9280a "," #0ae6e9 "," #0a12e9 "," #7f0ae9 "," #3b3a3d "]                        
                    }
                ]
            },
            //opciones
            options: {                
              scales: {                
                //permite que los valores mas minimos se vean
                y: {
                  beginAtZero: true
                } 
              }
            }
        });

        //3
        new Chart(ctx3, {
            type: 'bar',
            //datos
            data: {
                //columnas
                labels:
                    ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                    'Agosto', 'Septiembre',  'Octubre', 'Noviembre','Diciembre'],
                datasets: [
                    {
                        //titulo
                        label: 'Ganancias Mensuales',
                        //Valor de las columnas - agregar el dinamismo aqui
                        data: [30, 40, 93, 65, 72, 43,100, 9, 20, 50, 60, 33],
                        //colores
                       // borderWidth: 2,
                        borderColor: ' #000000  ',
                        backgroundColor:["#9BD0F5", "#e3df13", " #e9280a "," #0ae6e9 "," #0a12e9 "," #7f0ae9 "," #3b3a3d "]                        
                    }
                ]
            },
            //opciones
            options: {                
              scales: {                
                //permite que los valores mas minimos se vean
                y: {
                  beginAtZero: true
                } 
              }
            }
        });
    </script>
<!-- DESDE AQUI -->
<?php require_once("componentes/piePagina.php"); ?>