(function(){
"use strict";
    var regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function(){

var map=document.getElementById ('mapa');
//campos datos usuarios
        var nombre=document.getElementById (`nombre`);
        var apellido= document.getElementById (`apellido`);
        var email= document.getElementById ('email');
        //campos pases
        var pase_dia =document.getElementById('pase_dia');
        var pase_dosdias= document.getElementById('pase_dosdias');
        var pase_completo =document.getElementById('pase_completo');
        //Botones y divs
        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var botonregistro = document.getElementById('btnregistro');
        var lista_productos = document.getElementById('lista-productos');
        var suma=document.getElementById('suma-total');

        //EXTRAS
        var camisas=document.getElementById('camisa_evento');
        var etiquetas= document.getElementById('etiquetas');

        //boton registro
       
                
              

        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/')+1);
        
        if(filename=="registro.php"){
        botonregistro.disabled=true;
        }



        if (document.getElementById ('mapa')) {
            //map
            var map = L.map('mapa').setView([20.653902, -103.325744], 20);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            
            L.marker([20.653902, -103.325744]).addTo(map)
                .bindPopup('CUCEI 2019 <br> Boletos disponibles')
                .openPopup()
            };


           

        if(document.getElementById('calcular')){

        
    
        calcular.addEventListener('click', calcularMontos);
        pase_dia.addEventListener('blur', mostrarDias);
        pase_dosdias.addEventListener('blur',mostrarDias);
        pase_completo.addEventListener('blur',mostrarDias);

        nombre.addEventListener('blur', validarCampos);
        apellido.addEventListener('blur',validarCampos);
        email.addEventListener('blur',validarCampos);

        email.addEventListener('blur',validarMail);
        var formulario_editar = document.getElementsByClassName('editar-registrado');
        if (formulario_editar.length >0 ){
            if(pase_dia.value || pase_dosdias.value ||pase_completo.value){
                mostrarDias();
            }
        }

       

        function validarCampos(){
            if(this.value==''){
                errorDiv.style.display= 'block';
                errorDiv.innerHTML ="este campo es obligatorio";
                this.style.border ='1px solid red';
                errorDiv.style.border='1px solid red';
            }else{
                errorDiv.style.display='none';
                this.style.border='1px solid #cccccc';
            }
        };

        function validarMail(){
            if(this.value.indexOf("@")> -1){
                errorDiv.style.display='none';
                this.style.border = '1px solid #cccccc';
            } else {
                errorDiv.style.display='block';
                errorDiv.innerHTML = "debe tener al menos una @";
                this.style.border ='1px solid red';
                errorDiv.style.border ='1px solid red';
            }
        }
        
        function calcularMontos(event){
        event.preventDefault();
        if (regalo.value === ''){
            alert("Debes elegir un regalo");
            regalo.focus();
            //operaciones alas cariables les debemos pasarla cantidad de boleto
        } else{
            var boletosDia =parseInt(pase_dia.value,10 )||0 ,
            boletos2Dias = parseInt (pase_dosdias.value,10) || 0,
            boletoCompleto = parseInt(pase_completo.value,10)||0,
            cantCamisas= parseInt(camisas.value,10)||0,
            cantEtiquetas= parseInt(etiquetas.value,10)||0

            //var totalPagar = (boletosDia * 20) + (boletos2Dias * 45) + (boletoCompleto * 50) + (cantCamisas * (10 -(10 * 0.07)))+ (cantidadEtiquetas *2);
            var totalPagar = (boletosDia * 20) + (boletoCompleto * 45) + ( boletos2Dias * 30) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);
            
            var listaProductos =[];

            if (boletosDia >= 1){
                listaProductos.push(boletosDia + 'pases por dia');
            }
            if (boletos2Dias >=1){
                listaProductos.push(boletos2Dias + 'pases por 2 dias');
            }
            if (boletoCompleto >=1){
                listaProductos.push(boletoCompleto + 'pases completos');
            }
            if (cantCamisas >=1){
                listaProductos.push(cantCamisas + 'camisas');
            }
            if (cantEtiquetas >=1){
                listaProductos.push(cantEtiquetas + 'etiquetas');
            }
            lista_productos.style.display="block";
          lista_productos.innerHTML='';
           for(var i=0;i<listaProductos.length; i++) {
             lista_productos.innerHTML += listaProductos[i] + '<br/>'
           }
           suma.innerHTML=" $ " + totalPagar.toFixed(2);

                  
                    document.getElementById('total_pedido').value= totalPagar;
        }
    }
    
    function mostrarDias(){
        var boletosDia =parseInt(pase_dia.value,10 )||0 ,
        boletos2Dias = parseInt (pase_dosdias.value,10) || 0,
        boletoCompleto = parseInt(pase_completo.value,10)||0;
    
        var diasElegidos =[];
        if(boletosDia > 0){
            diasElegidos.push('viernes');
            console.log(diasElegidos);
        }else{
            document.getElementById("viernes").style.display="none";
          }
        if(boletos2Dias > 0){
            diasElegidos.push('viernes','s�bado');
            console.log(diasElegidos);
        }else{
            document.getElementById("viernes").style.display="none";
            document.getElementById("s�bado").style.display="none";
          }
        if(boletoCompleto > 0){
            diasElegidos.push('viernes','s�bado','domingo');
            console.log(diasElegidos);
        }else{
            document.getElementById("viernes").style.display="none";
            document.getElementById("s�bado").style.display="none";
            document.getElementById("domingo").style.display="none";
          }
        for(var i=0; i < diasElegidos.length; i++){
            document.getElementById(diasElegidos[i]).style.display='block';
        }
    
    }
        }
    });// dom content loaaaded
})();

