usuarios=function(  nom , ape ,dir , tel , cur,email ,  usu , pwd, tipo){
	 this.nom =nom; 
	 this.ape =ape;
	 this.dir=dir;
	 this.tel=tel;
	 this.cur=cur;
	 this.email=email;
	 this.usu =usu;
	 this.pwd=pwd;
	 this.tipo=tipo;
	 this.validar=function(form){
		 if ((usu==''||email=='')&&pwd==''){
			 alert("");
			 return;
		 }
		 form.submit()
		 
	 
	 }
}

 		var idforo ;
		var idtipoid;
		var idusuario;
 	   function respuesta(oForo,oTipoId,oUsuario){
		  idforo =oForo;
		  idtipoid=oTipoId;
		  idusuario=oUsuario;
		  $("#frmRespuesta").dialog("open");
		}
		function ver_respuesta(oForo,id,cantResp){
			idforo=oForo;
			vcontenedor='container'+id
			btnocultar="ocultar"+id;
			contenedor =document.getElementById(vcontenedor);
			cant=cantResp;
			if(cant==0)
			{
				$("#"+vcontenedor).fadeOut();
								return;
								
			}
			else{
				$("#"+vcontenedor).fadeIn();
			//	btnocultar.style.display="inline";
				$("#"+btnocultar).fadeIn();
			}
			
			ajax=nuevoAjax();
			ajax.open("POST", "verRespuestas.php",true);
			ajax.onreadystatechange=function() {
				if (ajax.readyState==4) {
					contenedor.innerHTML = ajax.responseText;
				}
			}
			ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			 	   ajax.send("idforo="+idforo);
		
		
		}

	   function nuevoAjax(){
		   var xmlhttp=false;
		   try {
			   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		   } catch (e) {
			   try {
				   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			   } catch (E) {
				   xmlhttp = false;
				   }
		  }
		  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
			  xmlhttp = new XMLHttpRequest();
		  }
		  return xmlhttp;
		  }
		  function nuevo(){
			  var tipo=$("#tipo").val()
			  if (tipo==0)
			  {
				  $("#txtnombre").val("")
				  $("#txtape").val("")
				  $("#txtdir").val("")
				  $("#txtTel").val("")
				  $("#txtEmail").val("")
				  $("#txtUsuario").val("")
				  $("#txtpwd").val("")
				  $("#txtnombre").focus()
			  }
		  }
		  function guardarUsuario(){
			  var nom, ape, dir,tel,ciu,email,usu,pwd ,foto,contenedor;
			  if (tipo==0)
			  {
				  contenedor = document.getElementById('resultado');
			  }
			  else
			  {
				    contenedor = document.getElementById('edicion');
			  }
			  
			  nom = $.trim(document.getElementById('txtnombre').value);
			  ape = $.trim(document.getElementById('txtape').value);
			  dir = $.trim(document.getElementById('txtdir').value);
			  tel = $.trim(document.getElementById('txtTel').value);
			  ciu  =$.trim( document.getElementById('txtciu').value);	
			  email =$.trim( document.getElementById('txtEmail').value);
			  usu = $.trim(document.getElementById('txtUsuario').value);
			  pwd=  $.trim(document.getElementById('txtpwd').value);
			  tipo=$.trim(document.getElementById('tipo').value);
			alert (tipo+' '+ ciu+' ' +email)
			  if (nom!="" && ape!="" && dir!="" && tel !=""
			   && ciu!="" && email!="" && usu!="" && pwd!="")
			  {
			  		ajax=nuevoAjax();
					if (tipo ==0)
					{
						ajax.open("POST", "vista/regUsuarios.php",true);
					}
					else
					{
							ajax.open("POST", "regUsuarios.php",true);
					}
			  		ajax.onreadystatechange=function() {
				  		if (ajax.readyState==4) {
					  		contenedor.innerHTML = ajax.responseText;
					  		limpiarCampos();
			      		}
			 	   }
			 	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			 	   ajax.send("nom="+nom+"&ape="+ape+"&dir="+dir+"&tel="+
				   tel+"&tipo="+tipo+"&ciu="+ciu+"&email="+email+"&usu="+usu+"&pwd="+pwd)
				   $("#txtusuarioEmail").focus()
			  }
			  else
			  {
				  alert("campos nulos")
			  }
		}
		function guardarforo()
		{
			  contenedor = document.getElementById('resultado');
			  titulo = $.trim(document.getElementById('titulo').value);
			  fecha = new Date();
			  dia=fecha.getDate();
			  mes=fecha.getMonth()+1;
			  año=fecha.getFullYear();
			  fcomp=año.toString()+'-'+mes.toString()+'-'+dia.toString();
			  mensaje= $.trim(document.getElementById('txtmensajebienvenida').value);
			  idadministrador = $.trim(document.getElementById('id').value);
			  if (titulo=="" && fcomp=="" )
			  {
				  alert("campos vacios");
				  return;
			  }
			 ajax=nuevoAjax();
		 	 ajax.open("POST", "regForos.php",true);
			 ajax.onreadystatechange=function() {
						if (ajax.readyState==4) {
					  		contenedor.innerHTML = ajax.responseText;
			    		    //limpiarCampos();
			      		}
						
			 	   }
				   
			 	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			 ajax.send("titulo="+titulo+"&fecha="+fcomp+"&mensaje="+mensaje+"&idadministrador="+idadministrador);
	 
		}
			function ocultar(num ){
				contenedor ="container"+num;
				ocultar="ocultar"+num;
				$("#"+ocultar).fadeOut();
				$("#"+contenedor).fadeOut();	
			}
		
		function guardarRespuestaForo(){
			  contenedor = document.getElementById('resultadoRespuesta');
				  fecha = new Date();
			  dia=fecha.getDate();
			  mes=fecha.getMonth()+1;
			  año=fecha.getFullYear();
			  fcomp=año.toString()+'-'+mes.toString()+'-'+dia.toString();

			   mensajeRespuesta = $.trim(document.getElementById('mensajeRespuesta').value);
			  if (mensajeRespuesta==""  )
			  {
				  alert("campos vacios");
				  return;
	
			  }
			   ajax=nuevoAjax();
		 	 ajax.open("POST", "regRespuestaForos.php",true);
			 ajax.onreadystatechange=function() {
						if (ajax.readyState==4) {
					  		contenedor.innerHTML = ajax.responseText;
							//limpiarCampos();
			      		}
						
			 	   }
				   
			 	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			 ajax.send("idforo="+idforo+"&fecha="+fcomp+"&mensaje="+mensajeRespuesta+"&idtipoid="+idtipoid+"&idusuario="+idusuario );
		}
		$(function () {
			$.datepicker.setDefaults($.datepicker.regional["es"]);
			$( "#txtFecha" ).datepicker();
			$( "#txtFecha" ).datepicker("option","dateFormat","yy-mm-dd");
			$("#txtFecha").datepicker({
				showWeek: true,
				firstDay: 1
			});
		});
		function ver (){
		$("#ocultar").fadeIn();
		}
	
		$(document).ready(function(){
			
						//configuracion regional:
			$.datepicker.regional['es'] =
	  			{
	  				closeText: 'Cerrar',
					prevText: 'Previo',
  					nextText: 'Próximo',

	  				monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	  				'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	  				monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
	  				'Jul','Ago','Sep','Oct','Nov','Dic'],
	  				monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
	  				dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
	  				dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
	  				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	  				dateFormat: 'dd/mm/yy', firstDay: 1,
	  				initStatus: 'Selecciona la fecha', isRTL: false
				};
	 			$.datepicker.setDefaults($.datepicker.regional['es']);
			$("#fechaRespuesta").datepicker();	
			$("#txtfecha").datepicker();
			$("#frmAñadirForo").dialog({
				autoOpen:false,
				height:400,
				width:600,
				buttons: {  
					"enviar": function() {guardarforo();},
				    "Cerrar": function() {location.reload(); $(this).dialog("close")},				
				}, 
				modal:true
			});
			$("#frmRespuesta").dialog({
		
				autoOpen:false,
				height:400,
				width:600,
				buttons: {  
					"enviar": function() {guardarRespuestaForo(); },
				    "Cerrar": function() {location.reload(); $(this).dialog("close")},
					
					
				}, 
				modal:true
			});
			$("#frmMensaje").dialog({
				autoOpen:false,
				height:400,
				width:1200,
				buttons: {  
				    "Cerrar": function() { $(this).dialog("close");},
					"Agregar":function() { },
				}, 
				modal:true
			}); 
			$("#container").dialog({
				autoOpen:false,
				height:600,
				width:850,
				buttons: {  
				    "Cerrar": function() { $(this).dialog("close");},
					"Agregar":function() { },
				}, 
				modal:true
			}); 

			$("#btnñadidrForo").click(function(){
				$("#frmAñadirForo").dialog("open");
			}); 
			$("#registrar").click(function(){
				$("#container").dialog("open");
				})	;
		//	$(".btnResponder").click(function(){
			//	alert(
			//	$("#idforo").val());
			//	$("#frmRespuesta").dialog("open");
			//});
			  $("#btnguardar").click(function(){
				   guardarUsuario();
				   nuevo();
				   
			   });
			   $("#btnabrir").click(function(){
				   document.getElementById("txtfile").click();
				   file =$("#txtfile").val();
				  $("#txtabrir").val(file);
				   
				})
			   $("#btnnuevo").click(function(){
			   		nuevo();
			   });
			   $("#editar").click(function(){
		  		   var nom= $("#nom").val()
				   var ape=$("#ape").val()
				   var usu=$("#usu").val()
				   var ema=$("#ema").val()
				   $("#txtnombre").val(nom)
				   $("#txtape").val(ape)
				   $("#txtUsuario").val(usu)
				   $("#txtEmail").val(ema)
				   $("div").hide()
				   $("#head").fadeIn()
				   $("#edicion").fadeIn()
				   $("#cerrar").hide()
			   })
			   $("#btnenviar").click(function(){
				   var form=document.getElementById('frmValidar');
				   var email =$.trim( document.getElementById('txtusuarioEmail').value);
			 	   emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i; //Se muestra un texto a modo de ejemplo, luego va a ser un icono
		 		   if (!emailRegex.test(email)) {
					   email="";
					   var usu = $.trim(document.getElementById('txtusuarioEmail').value);
				   }
				   var pwd=  $.trim(document.getElementById('txtpwd').value);
	    		   us=new usuarios('','','','','',email,usu,pwd,'');
				   us.validar(form);
			   });
			   $("#btneliminar").click(function(){
				   msg =confirm("eliminar?")
				   if( msg)
				   {
					   alert ("eliminar")
			   	   }
			   });
			   $("#inicio").click(function(){
		
				   location.reload();
				   $("#edicion").fadeOut()
				   $("#cerrar").fadeIn()
			   })

		  });// JavaScript Document