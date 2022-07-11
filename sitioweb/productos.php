<?php include("template/cabecera.php"); ?>
<div class="container">
    <br/>
    <div class="row">

<?php include("administrador/config/bd.php");
$sentenciaSQL=$conexion->prepare("SELECT * FROM libros");
$sentenciaSQL->execute();
$listaLibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>


<?php foreach($listaLibros as $libro){ ?>


<div class="col-md-3">
    <div class="card-fluid border border-warning mp-4">
    <img class="card-img-top" src="./image/<?php echo $libro['imagen']; ?>" alt="">
    <div class="card-body text-center fw-bolder text-black">
        <h4 class="card-title"><?php echo $libro['nombre']; ?> </h4>
        <p class="card-text">$ <?php echo $libro['precio']; ?></p>
        
    </div>
    </div>
    </div>

    <?php } ?>
    

<?php include("template/pie.php");?>

