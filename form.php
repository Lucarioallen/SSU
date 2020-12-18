
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="estiloindex.css" />
    <title>Document</title>
</head>
<body>  
<?php include_once("header.php") ?>
     <div class="popup" id="popup">
       <div class="headpop">
         <div></div>
         <div id="title"><h3>AVISO</h3></div>
         <button class="close" id="close">&times;</button>
       </div>
       <div>
        <div class="body"><p class="aviso">¿Seguro que deseas salir?</p> <p class="aviso">Perderas todo tu datos ingresado</p> </div>
       </div>
       <div class="botonpop">
          <a  id="si">Si</a>
          <a  id="no">No</a>
       </div>
     </div>
     <div class="overlay" id="overlay"></div>

     <div class="popup" id="popup2">
      <div class="headpop">
        <div></div>
        <div id="title"><h3>AVISO</h3></div>
        <button class="close" id="close2">&times;</button>
      </div>
      <div>
       <div class="body"><p class="aviso">Revise el formulario</p> <p class="aviso">Revise que los datos esten ingresado correctamente</p> </div>
      </div>
    </div>
    <div class="overlay" id="overlay2"></div>

    <div class="popup" id="popup3">
      <div class="headpop">
        <div></div>
        <div id="title"><h3>AVISO</h3></div>
        <button class="close" id="close3">&times;</button>
      </div>
      <div>
       <div class="body"><p class="aviso">Gracias por su tiempo</p> <p class="aviso">Su formulario sera enviado exitosamente al presionar boton okay, pronto lo contactaremos en correo</p> </div>
      </div>
      <div class="botonpop">
          <a  id="okay">Okay</a>       
       </div>
    </div>
    <div class="overlay" id="overlay3"></div>

    <form id="Form" method="POST" action="FormModel.php" class="invalid"> 
        <div id="Proyecto">
           <div> <p>Fecha de proyecto</p><input type="date" name="Fecha"required> </div>           
           <div><p>Titulo</p><input type="text" name="Titulo" placeholder="Nombre de proyecto" required></div>
           <div><p>Objetivo</p><textarea name="Objetivo" cols="40" rows="10" placeholder="Objetivo de proyecto" required></textarea><br>
           <span>Maximo 25 caracteres</span></div>
           <div>  <p>Descripcion</p><textarea name="Descripcion" cols="50" rows="10" placeholder="Describe su proyecto" required></textarea><br>
           <span>Maximo 50 caracteres</span></div>
             <div>
              <p>Nivel de proyecto</p>
               <input type="radio" id="voluntario" value="voluntariado" name="Nivel" required> <label>Voluntariado</label>
               <input type="radio" id="servicio" value="servicion social" name="Nivel" required> <label>Servicio Social</label><br>
              <p>Modalidad</p>
               <input type="radio" id="solo" value="indivudual" name="Modalidad" required> <label>Individual</label>
               <input type="radio" id="grupo" value="grupal" name="Modalidad" required> <label>Grupal</label>
             </div>
        </div>
        <div id="InfoEstudiante">
            <p>Cantidad de estudiante</p>
            <input type="number" name="Cantidad" required><br>
            <p>Perfil de estudiante</p>
            <textarea name="Perfil" cols="30" rows="10" required></textarea>
            <label>Facultadad Involucrada</label>
            <input type="checkbox" name="facultad[]" value="FCyT"><label>FCyT</label>
            <input type="checkbox" name="facultad[]" value="FIC"><label>FIC</label>
            <input type="checkbox" name="facultad[]" value="FIE"><label>FIE</label>
            <input type="checkbox" name="facultad[]" value="FII"><label>FII</label>
            <input type="checkbox" name="facultad[]" value="FIM"><label>FIM</label>
            <input type="checkbox" name="facultad[]" value="FISC"><label>FISC</label> 
        </div>
        
        
        <div id="EstudianteContenedor" style="background-color: wheat; padding-bottom:10px; width: 90%; margin: auto;">
            <h1 style="text-align: center;">Datos de Participante</h1>
            <div class="tag"> <p>Cedula</p> <p>Telefono</p>  <p>Celular</p></div>
            <div class="fila">
              1
              <div class="cedulas">
              <input type="text" name="cedula[]" placeholder="cedula" class="cedula" onclick="this.className+=' secondClass'" required><br>
              <span class="errorCedula"></span>
              </div>
              <div class="celulars">
              <input type="text" name="telefono[]" placeholder="telefono" class="celular" required><br>
              <span class="errorCelular"></span>
              </div>
              <div class="celulars">
              <input type="text" name="celular[]" placeholder="celular" class="celular" required><br>
              <span class="errorCelular"></span>
              </div>
            </div>
        </div> 
        <div id="buttonEstudiante">
        <button onclick="AgregarEstudiante()" type="button">+</button>
        <button onclick="EliminarEstudiante()" type="button">-</button>
        </div>

        <div id="ActividadContenedor" style="background-color: wheat; padding-bottom:10px; width: 90%; margin: auto;">
            <h1 style="text-align: center;">Datos de Participante</h1>
            <div class="tag"> <p>Actividad</p><p>Descripcion Lugar</p> <p>Materiales</p><p>Tiempo</p> </div>
            <div class="fila">
              <textarea name="Actividad[]" cols="30" rows="5" required></textarea>
              <textarea name="Lugar[]" id="" cols="30" rows="5" required></textarea>
              <textarea name="Materiales[]" id="" cols="20" rows="5" required></textarea>
              <input type="number" name="Tiempo[]" id="number" step=".01" required> <label>hora</label> 
            </div>
        </div> 
        <div id="buttonActividad">
        <button onclick="AgregarActividad()" type="button">+</button>
        <button onclick="EliminarActividad()" type="button">-</button>
        </div>

        <div id="Organizador">
        <p>Docente de la actividad</p>
         <div class="nombres">
        <input type="text" placeholder="Docente para la actividad" name="Docente" class="nombre" onkeyup="validarNombre(0)" required><br>
        <span class="errorNombre"></span>
        </div>
        <p>Proponente</p>
         <div class="nombres">
        <input type="text" placeholder="nombre de Proponente" name="Proponente" class="nombre"  onkeyup="validarNombre(1)" required><br>
        <span class="errorNombre"></span> 
        </div>
        <h2>Contacto de Organizador</h2>     
        <div class="telefono"> 
           
            <div class="nombres">        
              <p>Responsable</p>
            <input type="text" placeholder="nombre de Responsable" name="Responsable" class="nombre" onkeyup="validarNombre(2)" required><br>
            <span class="errorNombre"></span>
            </div>
            
            
            <div class="celulars">
              <p>Celular</p>
            <input type="text" placeholder="celular" name="CelularResponsable" class="celular" required><br>
            <span class="errorCelular"></span>
            </div>
         
            
            <div class="celulars">
            <p>Telefono</p>
            <input type="text" placeholder="telefono" name="telefonoResponsable" class="celular" required><br>
            <span class="errorCelular"></span>
           </div>
            </div>
        
        <h2>Contacto de Supervisor</h2> 
        <div class="telefono">    
            <div class="nombres">
            <p>Supervisor</p>
            <input type="text" placeholder="nombre de supervisor" name="Supervisor" class="nombre" onkeyup="validarNombre(3)" required> <br>
            <span class="errorNombre"></span>
            </div>   
            
            <div class="celulars">
              <p>Celular</p>
              <input type="text" placeholder="celular" name="CelularSupervisor" class="celular" required><br>
              <span class="errorCelular"></span>
              </div>
            
            <div class="celulars">
              <p>Telefono</p>
              <input type="text" placeholder="celular" name="TelefonoSupervisor" class="celular" required><br>
              <span class="errorCelular"></span>
              </div>
        </div>
      
        <h2>Correo Electronico de contacto</h2>
        <label for="mail" class="correo">
        <input type="text" placeholder="Correo Electronico" name="Correo" class="mail" onkeyup="validarEmail(0)" required><br>
        <span class="errorEmail"></span>
        </label>
        </div>

        <div id="submit">   
        <button type="button" id="cancelar">Salir</button>
        <button type="submit" id="enviar">Enviar</button>
        </div>
      </form>
     <script src="form.js"></script>
</body>
</html>

