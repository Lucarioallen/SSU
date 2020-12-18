<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estiloindex.css" />
    <title>Ver Propuestas</title>

</head>

<body>
    <?php 
    include("header.php");
    include("conectar.php");
    $conn=conectar();;
    $con=conectar();
    $mensaje="";
    $decision=$_GET["decision"];



    $id_proy=$_GET["id_proy"];

    if($conn==true){
        $mensaje="Conectado";
    }
    else{
        $mensaje="No conectado";
    }


  $est="SELECT id_estado FROM `estado_de_proyecto` where id_proyecto = ".$id_proy;
  $estQuery =mysqli_query($conn,$est);
  $estado=mysqli_fetch_array($estQuery);


  if ($decision=="aprobar") {
    function aprobar()
    {
      global $id_proy, $estado,$con,$sql; 
     $sql="UPDATE `estado_de_proyecto` SET `id_estado` = '2' WHERE `estado_de_proyecto`.`id_proyecto` = ".$id_proy." AND `estado_de_proyecto`.`id_estado` =".$estado["id_estado"];
      $resultado=mysqli_query($con,$sql);
    }
    aprobar();
  }
  
  else if ($decision=="rechazar") {
    function rechazar()
    {
      global $id_proy, $estado,$con,$sql; 
     $sql="UPDATE `estado_de_proyecto` SET `id_estado` = '3' WHERE `estado_de_proyecto`.`id_proyecto` = ".$id_proy." AND `estado_de_proyecto`.`id_estado` =".$estado["id_estado"];
      $resultado=mysqli_query($con,$sql);
    }
    rechazar();
  }

     ?>

<br>




<table border="2">
    <tr>

    </tr>

    <?php
    $sql="Select * from proyecto where id_proyecto=".$id_proy;
    $resultado=mysqli_query($conn,$sql);

    $estadoNum="SELECT * FROM `estado_de_proyecto` where id_proyecto=".$id_proy;
    $estadoNQuery =mysqli_query($conn,$estadoNum);
    $pendienteLista=mysqli_fetch_array($estadoNQuery);

    $Estado = "SELECT descripcion FROM tipo_estado where id_estado = ".$pendienteLista["id_estado"];
    $EstadoQuery = mysqli_query($conn,$Estado);
    $E=mysqli_fetch_array($EstadoQuery);

    while($ver=mysqli_fetch_array($resultado)){
     ?>
    
    <div>
        <h1><?php echo "Título: ".$ver["Titulo"]; ?></h1>
        <h3><?php echo "Estado: ".$E["descripcion"]; ?></h3>
        <h2><?php echo "Fecha: ".$ver["Fecha"]; ?></h2>
        <h3><?php echo "Objetivo: ".$ver["Objetivo"]; ?></h3>
        <h3><?php echo "Descripción: ".$ver["Descripcion"]; ?></h3>
        <h3><?php echo "Nivel Proyecto: ".$ver["NivelProyecto"]; ?></h3>
        <h3><?php echo "Modalidad: ".$ver["Modalidad"]; ?></h3>
        <h3><?php echo "Cantidad Máxima: ".$ver["Cantidad_Maxima"]; ?></h3>
        <h3><?php echo "Facultad(es): ".$ver["Facultad"]; ?></h3>
        <h3><?php echo "Perfil Estudiante: ".$ver["Perfil_estudiante"]; ?></h3><br>

        <a href="administracion.php?decision=aprobar&id_proy=<?php echo $id_proy?>" class="aprobar">Aprobar</a>
        <a href="administracion.php?decision=rechazar&id_proy=<?php echo $id_proy?>" class="rechazar">Rechazar</a>
        <br/><br/><br/>
        <a href="verProy.php" class="abrir">Volver</a>
        <br>
    </div>





    <?php } //UPDATE `facultades` SET `Sede` = 'Campus Victor levi' WHERE `facultades`.`id_facultad` = 1; ?>
</table>




</body>
</html>