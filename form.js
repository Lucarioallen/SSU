
var Form = document.getElementById("Form");
var container = document.getElementById("EstudianteContenedor");
var number=1;
var a;
let todo = document.querySelectorAll(".cedula");
for (let i = 0; i < todo.length; i++) {
todo[i].addEventListener("keyup",function(){
      validarCedula(i);
});
}

validate();
/** Agregar eventlistener de celulares */
function validate(){
let todocelular = document.querySelectorAll(".celular");

function listener(evt){
  validarNumero(evt.currentTarget.myparam)
}
for (a = 0; a < todocelular.length; a++) {
todocelular[a].myparam = a;
todocelular[a].addEventListener("keyup",listener, false);
}
}
/**Quitar el eventlistener de celulares */
function invaldate(){
  let todocelular = document.querySelectorAll(".celular");
  function listener(evt){
    validarNumero(evt.currentTarget.myparam)
  }
  for (a = 0; a < todocelular.length; a++) {
    console.log(a);
    todocelular[a].myparam = a;
    todocelular[a].removeEventListener("keyup",listener, false);
  }
}




       /**Prevenir envio si esta incorrecto */
        Form.addEventListener('submit',function(event){
          if(Form.className==="invalid"){
            const closepopup2 = document.getElementById('close2');
            const popup2 = document.getElementById('popup2');
            const overlay2 = document.getElementById('overlay2');
            popup2.classList.add('active');
            overlay2.classList.add('active');
            closepopup2.addEventListener('click',()=>{
              popup2.classList.remove('active');
              overlay2.classList.remove('active');
            })
            event.preventDefault();
          } 
          else{
            const popup3 = document.getElementById('popup3');
            const overlay3 = document.getElementById('overlay3');
            const closepopup3 = document.getElementById('close3');
            const okay = document.getElementById('okay');
            popup3.classList.add('active');
            overlay3.classList.add('active');
            closepopup3,okay.addEventListener('click', ()=>{
              Form.submit();
            })
          }
          event.preventDefault();
        })
        /**Validaciones */
        function validarEmail(numero){
            let cont = document.getElementsByClassName("correo")[numero];
            let Email = document.getElementsByClassName("mail")[numero].value;
            let Error = document.getElementsByClassName("errorEmail")[numero];
            let PatternCorreo = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if(Email.match(PatternCorreo)){
               Form.classList.add("valid");
               Form.classList.remove("invalid");
               cont.classList.add("valid");
               cont.classList.remove("invalid");
               Error.innerHTML = "correo valido";
               Error.style.color = "#00ff00";
            }
            else{
              Form.classList.add("invalid");
              Form.classList.remove("valid");
              cont.classList.remove("valid");
              cont.classList.add("invalid");
              Error.innerHTML = "correo invalido";
              Error.style.color = "#ff0000";
            }
          }

          function validarNombre(numero){
            let cont = document.getElementsByClassName("nombres")[numero];
            let Nombre = document.getElementsByClassName("nombre")[numero].value;
            let Error = document.getElementsByClassName("errorNombre")[numero];
            let PatternNombre = /^[a-zA-Z]+\d[a-zA-Z]+$/;
            if(Nombre.match(PatternNombre)){
               Form.classList.add("valid");
               Form.classList.remove("invalid");
               cont.classList.add("valid");
               cont.classList.remove("invalid");
               Error.innerHTML = "nombre valido";
               Error.style.color = "#00ff00";
            }
            else{
              Form.classList.add("invalid");
              Form.classList.remove("valid");
              cont.classList.remove("valid");
              cont.classList.add("invalid");
              Error.innerHTML = "nombre invalido";
              Error.style.color = "#ff0000";
            }
          }

          function validarCedula(numero){
            let cont = document.getElementsByClassName("cedulas")[numero];
            let Cedula = document.getElementsByClassName("cedula")[numero].value;
            let Error = document.getElementsByClassName("errorCedula")[numero];
            let PatternNombre = /^(PE|E|N|[23456789](?:AV|PI)?|1[0123]?(?:AV|PI)?)-(\d{1,4})-(\d{1,6})$/;
            if(Cedula.match(PatternNombre)){
               Form.classList.add("valid");
               Form.classList.remove("invalid");
               cont.classList.add("valid");
               cont.classList.remove("invalid");
               Error.innerHTML = "cedula valido";
               Error.style.color = "#00ff00";
            }
            else{
              Form.classList.add("invalid");
              Form.classList.remove("valid");
              cont.classList.remove("valid");
              cont.classList.add("invalid");
              Error.innerHTML = "cedula invalido";
              Error.style.color = "#ff0000";
            }
          }

          function validarNumero(numero){
           
            let cont = document.getElementsByClassName("celulars")[numero];
            let Numero = document.getElementsByClassName("celular")[numero].value;
            let Error = document.getElementsByClassName("errorCelular")[numero];
            let PatternNombre = /^([0-9]{3,4}-?[0-9]{4})$/;
            if(Numero.match(PatternNombre)){
               Form.classList.add("valid");
               Form.classList.remove("invalid");
               cont.classList.add("valid");
               cont.classList.remove("invalid");
               Error.innerHTML = "numero valido";
               Error.style.color = "#00ff00";
            }
            else{
              Form.classList.add("invalid");
              Form.classList.remove("valid");
              cont.classList.remove("valid");
              cont.classList.add("invalid");
              Error.innerHTML = "numero invalido";
              Error.style.color = "#ff0000";
            }
          }


         /**Agregar cantidad estudiante */
         function AgregarEstudiante() {
           number++;
           const div = document.createElement('div');
           div.className = 'fila';
           div.innerHTML = number + `
           <div class="cedulas">
           <input type="text" name="cedula[]" placeholder="cedula" class="cedula" ><br>
           <span class="errorCedula"></span>
           </div>
           <div class="celulars">
           <input type="text" name="telefono[]" placeholder="telefono" class="celular" ><br>
           <span class="errorCelular"></span>
           </div>
           <div class="celulars">
           <input type="text" name="celular[]" placeholder="celular" class="celular" ><br>
           <span class="errorCelular"></span>
           </div>
            `;
          container.appendChild(div);

          var todo = document.querySelectorAll(".cedula");
          for (let i = 0; i < todo.length; i++) {
           todo[i].addEventListener("keyup",function(){
                  validarCedula(i);
          });
          }
          invaldate();
          validate();
        }
     
       function EliminarEstudiante(){
        if( container.lastElementChild.className == "fila"){
       container.removeChild(container.lastElementChild);
       number--;}
          invaldate();
          validate();
       }
       /**Agregar Actividades */
       var containerActivity = document.getElementById("ActividadContenedor");
       var number=1;
       function AgregarActividad() {
       number++;
       let divAct = document.createElement('div');
       divAct.className = 'fila';
       divAct.innerHTML =  `
       <textarea name="Actividad[]" cols="30" rows="5" required></textarea>
       <textarea name="Lugar[]" id="" cols="30" rows="5" required></textarea>
       <textarea name="Materiales[]" id="" cols="20" rows="5" required></textarea>
       <input type="number" name="Tiempo[]" id="number" step=".01" required> <label>hora</label> 
       `;
      containerActivity.appendChild(divAct);
       }
       
       function EliminarActividad(){
       if( containerActivity.lastElementChild.className == "fila"){
       containerActivity.removeChild(containerActivity.lastElementChild);
       number--;
       }
       }


       /**Popup salir */
       const openpopup = document.getElementById('cancelar');
       const closepopup = document.getElementById('close');
       const noOption = document.getElementById('no');
       const popup = document.getElementById('popup');
       const overlay = document.getElementById('overlay');

       openpopup.addEventListener('click',()=>{
         popup.classList.add('active');
         overlay.classList.add('active');
       });

       closepopup.addEventListener('click',()=>{
         popup.classList.remove('active');
         overlay.classList.remove('active');
       })

       noOption.addEventListener('click',()=>{
         popup.classList.remove('active');
         overlay.classList.remove('active');
       })

       /**PopupSaliendo */

      
      
  
   