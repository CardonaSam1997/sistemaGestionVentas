<?php
require_once("../modelo/Factura.php");
require_once("../vista/factura.view.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- css -->
    <style>
        #navbar ul li{
            list-style: none;            
            display: inline-block;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div>
        <header>
            <div class="row" id="navbar">
                <div class="col-md-4">
                    <img src="" alt="logo">
                </div>
                <div class="col-md-8">
                    <ul>
                        <li>Home</li>
                        <li>About</li>
                        <li>Service</li>
                        <li>Try free</li>                        
                    </ul>
                </div>
            </div>        
        </header>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong># GEREMY MOBILE APP</strong>
                </p>
                <h1>PLAN_YOUR<br>DAY_EASILY</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit, quo delectus veniam modi accusamus corrupti</p>
                <ul>
                    <a href="">
                        <li>
                            <img src="" alt="app store">
                        </li>
                    </a>
                    <a href="">
                        <li>
                            <img src="" alt="play store">
                        </li>
                    </a>
                </ul>
                <p>* Require iphone 7v</p>
            </div>
            <div class="col-md-6">
                <img src="" alt="Celulares">
            </div>
        </div>
    </div>
</body>
</html>


