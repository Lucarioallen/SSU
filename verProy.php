<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0"/>
    <link rel="stylesheet" href="estilonav.css">
    <link rel="stylesheet" href="estiloindex.css" />
    <title>Ver Propuestas</title>

</head>

<?php
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
?>

<body>
    <?php 
    include("header.php");
    include("conectar.php");


    //$id_proy=$_GET["id_proy"];

    $conn=conectar();;
    $mensaje="";
    if($conn==true){
        $mensaje="Conectadso";
    }
    else{
        $mensaje="No conectado";
    }
     ?>

<br>

<table border="2">
        <td>ID</td>
        <td>Título</td>
        <td>Fecha</td>
        <td>Proponente</td>
        <td>Estado</td>
        <td></td>

    </tr>


    <?php
    
/*  
    Result = SELECT * FROM `estado_de_proyecto` WHERE id_estado = 1
    Result {1,5,6,7,8} id id_proyecto
    for(x = 0; x< Result.size; x++)
    SELECT Titulo, Fecha FROM `Proyecto` WHERE id_proyecto = Result[x] 1 , 5 , 6 , 7 , 8
    SELECT Proponente FROM `organizador` WHERE id_proyecto = Result[x] 1 , 5 , 6 , 7 , 8
*/
    $estado1="SELECT * FROM `estado_de_proyecto`";
    $estadoQuery =mysqli_query($conn,$estado1);
    $pendienteLista=mysqli_fetch_array($estadoQuery);




    do{
    

    // Tabla proyecto
    $sql="Select * from proyecto where id_proyecto = ".$pendienteLista["id_proyecto"];
    $resultado=mysqli_query($conn,$sql);
    $ver=mysqli_fetch_array($resultado);

    //Tabla organizador
    $organ="SELECT * FROM `organizador` where id_proyecto = ".$pendienteLista["id_proyecto"];
    $organQuery =mysqli_query($conn,$organ);
    $proponente=mysqli_fetch_array($organQuery);

    $Estado = "SELECT descripcion FROM tipo_estado where id_estado = ".$pendienteLista["id_estado"];
    $EstadoQuery = mysqli_query($conn,$Estado);
    $E=mysqli_fetch_array($EstadoQuery);


    //$sql="Select * from proyecto where = ".$pendienteLista[$x];
    
            
     ?> 

    <tr>
        <td><?php echo $pendienteLista["id_proyecto"];?></td>
        <td><?php echo $ver["Titulo"]; ?></td>
        <td><?php echo $ver["Fecha"]; ?></td>
        <td><?php echo $proponente["proponente"]; ?></td>
        <td><?php echo $E["descripcion"]; ?></td>
        <td><a class="abrir" href="administracion.php?decision='nulo'&id_proy=<?php echo $pendienteLista["id_proyecto"]?>">Abrir</a></td>

    </tr>

    <?php }while($pendienteLista=mysqli_fetch_array($estadoQuery)) ?>
</table>




</body>
</html>
