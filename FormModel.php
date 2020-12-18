<?php
include_once('conectar.php');
$conn = conectar();
$Fecha = $_POST['Fecha'];
$Titulo = $_POST['Titulo'];
$Descripcion = $_POST['Descripcion'];
$Objetivo = $_POST['Objetivo'];
$Nivel  = $_POST['Nivel'];
$Modalidad = $_POST['Modalidad'];
$Cantidad = (int)$_POST['Cantidad'];
$Perfil = $_POST['Perfil'];
$FacultadTotal = " ";
$Docente = $_POST['Docente'];
$Proponente = $_POST['Proponente'];
$Responsable = $_POST['Responsable'];
$CelularR = $_POST['CelularResponsable'];
$TelefonoR = $_POST['telefonoResponsable'];
$Supervisor = $_POST['Supervisor'];
$CelularS = $_POST['CelularSupervisor'];
$TelefonoS = $_POST['TelefonoSupervisor'];
$Correo = $_POST['Correo'];

if(isset($_POST['facultad'])){
    $Facultad = $_POST['facultad'];
    $FacultadTotal = implode(",",$Facultad);
    echo $FacultadTotal;
}
$sqlProyect = "INSERT INTO proyecto(Fecha,Titulo,Objetivo,Descripcion,NivelProyecto,Modalidad,Cantidad_Maxima,Facultad,Perfil_Estudiante) 
VALUES ('$Fecha','$Titulo','$Objetivo','$Descripcion','$Nivel','$Modalidad','$Cantidad','$FacultadTotal','$Perfil')";
if(mysqli_query($conn,$sqlProyect)){ $LastID = $conn->insert_id;}
else{
  echo mysqli_error($conn);
}
if(isset($_POST['cedula'])){
    $CedulaEstudiante = $_POST['cedula'];
    $TelefonoE = $_POST['telefono'];
    $CelularesE = $_POST['celular'];
    for($i=0; $i<count($CedulaEstudiante); $i++){
        echo $CedulaEstudiante[$i] . $TelefonoE[$i] . $CelularesE[$i];
        $sqlEstudiante = "Insert into estudiante_proyecto(cedula,id_proyecto,id_estado,telefono,celular) 
        values ('$CedulaEstudiante[$i]','$LastID','1','$TelefonoE[$i]','$CelularesE[$i]')";
        mysqli_query($conn,$sqlEstudiante);
    }
   
}
if(isset($_POST['Actividad'])){
    $Actividades = $_POST['Actividad'];
    $Lugar = $_POST['Lugar'];
    $Materiales = $_POST['Materiales'];
    $Tiempo = $_POST['Tiempo'];
    for($i=0; $i<count($Actividades); $i++){
        $Tiempo[$i] = (float)$Tiempo[$i];
        echo "Actividad: $Actividades[$i]" . "Lugar: $Lugar[$i]" . "Material : $Materiales[$i]" . "Tiempo: $Tiempo[$i]<br>";
        $sqlActividad = "INSERT INTO actividad_proyecto(id_proyecto,tiempo,descripcion,materiales,docente,descripcion_lugar) 
        VALUES('$LastID','$Tiempo[$i]','$Actividades[$i]','$Materiales[$i]','$Docente','$Lugar[$i]')";
        mysqli_query($conn,$sqlActividad);
    }
}

$sqlOrganizador = "INSERT INTO Organizador
(id_proyecto,proponente,responsable,telefono_organizador,celular_organizador,Supervisor,correo_electronico,telefono_supervisor,celular_supervisor)
VALUES('$LastID','$Proponente','$Responsable','$TelefonoR','$CelularR','$Supervisor','$Correo','$TelefonoS',$CelularS)";
mysqli_query($conn,$sqlOrganizador);
$sqlEstado = "INSERT INTO estado_de_proyecto(id_estado,id_proyecto) VALUES('1','$LastID')";
mysqli_query($conn,$sqlEstado);

echo "$Fecha <br> $Titulo  <br> $Descripcion <br> $Objetivo <br> $Nivel <br> $Modalidad <br> $Cantidad <br> $Perfil
<br> $Docente <br> $Proponente <br> $Responsable <br> $CelularR <br> $TelefonoR <br> $Supervisor <br> $CelularS <br> $TelefonoS <br> $Correo ";



?>