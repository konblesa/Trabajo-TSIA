<?php include("../template/cabecera.php");?>
<?php
 $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
 $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
 $txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
 $txtCantidad=(isset($_POST['txtCantidad']))?$_POST['txtCantidad']:"";
 $txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
 $accion=(isset($_POST['accion']))?$_POST['accion']:"";

 include("../config/bd.php");




switch($accion){

    case"Agregar":
        $sentenciaSQL=$conexion->prepare("INSERT INTO libros (nombre, imagen,precio,cantidad) VALUES (:nombre,:imagen,:precio,:cantidad);");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':precio',$txtPrecio);
        $sentenciaSQL->bindParam('cantidad',$txtCantidad);

        $fecha=new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
        if($tmpImagen!=""){
            move_uploaded_file($tmpImagen,"../../image/".$nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->execute();
        header("Location:productos.php");
        break;
        

    case"Modificar":

        
        $sentenciaSQL=$conexion->prepare("UPDATE  libros SET nombre=:nombre WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL=$conexion->prepare("UPDATE  libros SET precio=:precio WHERE id=:id");
        $sentenciaSQL->bindParam(':precio',$txtPrecio);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL=$conexion->prepare("UPDATE  libros SET cantidad=:cantidad WHERE id=:id");
        $sentenciaSQL->bindParam(':cantidad',$txtCantidad);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();

        


        if($txtImagen!=""){

            $fecha=new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
        
        move_uploaded_file($tmpImagen,"../../image/".$nombreArchivo);


        $sentenciaSQL=$conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $listaLibros=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($listaLibros["imagen"])&&($listaLibros["imagen"]!="imagen.jpg") ){
            if(file_exists("../../image/".$listaLibros["imagen"])){
                unlink("../../image/".$listaLibros["imagen"]);
            }
        }


            $sentenciaSQL=$conexion->prepare("UPDATE  libros SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
    }


    header("Location:productos.php");
            break;

    case"Cancelar":
            header("Location:productos.php");
                //echo"presionado boton cancelar";
                break;  
                
    case"Seleccionar":
        $sentenciaSQL=$conexion->prepare("SELECT * FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $listaLibros=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtNombre=$listaLibros['nombre'];
        $txtPrecio=$listaLibros['precio'];
        $txtCantidad=$listaLibros['cantidad'];
        $txtImagen=$listaLibros['imagen'];
        

                    //echo"presionado boton seleccionar";
                    break;  

    case"Borrar":
        $sentenciaSQL=$conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $listaLibros=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($listaLibros["imagen"])&&($listaLibros["imagen"]!="imagen.jpg") ){
            if(file_exists("../../image/".$listaLibros["imagen"])){
                unlink("../../image/".$listaLibros["imagen"]);
            }
        }

        $sentenciaSQL=$conexion->prepare("DELETE FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
    $sentenciaSQL->execute();
         header("Location:productos.php");
                        break;  
}

$sentenciaSQL=$conexion->prepare("SELECT * FROM libros");
$sentenciaSQL->execute();
$listaLibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Datos del producto
    </div>

    <div class="card-body">

    <form method="POST" enctype="multipart/form-data" >


<div class = "form-group">
<label for="txtID">ID</label>
<input type="text" class="form-control" value="<?php echo $txtID; ?>"  name="txtID" id="txtID"  placeholder="ID">
</div>


<div class = "form-group">
<label for="txtID">Nombre:</label>
<input type="text" class="form-control" value="<?php echo $txtNombre; ?>"  name="txtNombre" id="txtNombre"  placeholder="Nombre">
</div>

<div class = "form-group">
<label for="txtID">Precio:</label>
<input type="text" class="form-control" value="<?php echo $txtPrecio; ?>"  name="txtPrecio" id="txtPrecio"  placeholder="precio">
</div>

<div class = "form-group">
<label for="txtID">Cantidad:</label>
<input type="text" class="form-control" value="<?php echo $txtCantidad; ?>"  name="txtCantidad" id="txtCantidad"  placeholder="cantidad">
</div>


<div class = "form-group">
<label for="txtID">Imagen:</label>
<br/>

<?php echo $txtImagen; ?>
<?php if($txtImagen!=""){?>

    <img class="img-thumbnail rounded" src="../../image/<?php echo $txtImagen;?>"width="50" alt="" srcset="">

<?php } ?>


<input type="file" class="form-control" name="txtImagen" id="txtImagen"  placeholder="Imagen">
</div>


<div class="btn-group" role="group" aria-label="">
    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
    <button type="submit" name="accion"  value="Modificar" class="btn btn-warning">Modificar</button>
    <button type="submit" name="accion"  value="Cancelar" class="btn btn-info">Cancelar</button>
</div>
</form>
    </div>
    
</div>


</div> 
<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>precio</th>
                <th>cantidad (Kg)</th>
                <th>imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaLibros as $libro) {?>
            <tr>
                <td><?php echo $libro['id'];?></td>
                <td><?php echo $libro['nombre'];?></td>
                <td><?php echo $libro['precio']; ?> </td>
                <td><?php echo $libro['cantidad'];?></td>
                <td>
                <img class="img-thumbnail rounded" src="../../image/<?php echo $libro['imagen'];?>"width="50" alt="" srcset="">
                </td>



                <td>
                   <form method ="post">
                   <input type="hidden" name="txtID" value=<?php echo $libro['id'];?>>
                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>

                </form>
                


                </td>
            </tr>
           <?php }?>
        </tbody>
    </table>





</div>






<?php include("../template/pie.php");?>