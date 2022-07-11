<?php include("template/cabecera.php"); ?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/main.css">  

    <!--========================================================== -->
                        <!-- SLIDER DE IMAGENES-->
    <!--========================================================== -->
    
    
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="3000">
            <img src="./img/2.jpg" class="d-block w-100" alt="">
          </div>
          
 
          <div class="carousel-item" data-bs-interval="3000">
            <img src="./img/1.jpg" class="d-block w-100" alt="...">
          </div>
 

          <div class="carousel-item" data-bs-interval="3000">
            <img src="./img/3.jpg" class="d-block w-100" alt="...">
          </div>
 
 
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>    
    
    <!--========================================================== -->
                        <!-- INTRO-->
    <!--========================================================== -->
    </br>

<section id="intro" class="w-50 mx-auto text-center pt-5 " >

    <h1 class="p-3 fs-2 border-top border-5 pt-3 " >
        Una carniceria para <span class="text-warning">toda la familia</span> 
    </h1>

    <p class="p-3 fs-4 pb-5" >La carniceria <span class="text-warning">La parrilla familiar</span> ofrece la mejor
    calidad en carnes de toda la zona!</p>


</section>

    <!--========================================================== -->
                        <!-- BOTON PRODUCTOS-->
    <!--========================================================== -->

    <p class="lead text-center">
        <a class="btn btn-warning btn-lg text-black p-3 fs-4 " href="productos.php" role="button">Consultar productos</a>
    </p>
    </br>
    </br>
    </br>
    <!--========================================================== -->
                        <!-- Nosotros-->
    <!--========================================================== -->

<div id="local" class="border-top border-2 fw-bolder ">
    <div class="mapa"></div>
    <div>
    <h2 class="nosotrostitulo">
        Ubicada en la comuna de La Florida, Santiago
    </h2> 
    <div class="nosotrostexto">
    <p class="w-75 text-center fw-bolder text-white">La dirección de nuestra tienda es Pje. Padre Gerardo Poblete Fernandez 5795, puede comunicarse con nosotros a via WhatsApp: +56943882438
        Visítenos vecino/a y no se arrepentirá!
    </p> 
    </div>
    </div>
</div>


<div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ff5500" fill-opacity="0.6" d="M0,128L120,122.7C240,117,480,107,720,96C960,85,1200,75,1320,69.3L1440,64L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>

</div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="main.js"></script>


    <?php include("template/pie.php");?>

