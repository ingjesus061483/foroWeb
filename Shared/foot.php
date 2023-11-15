</div>
<div id="pnlUsuario" class='card'>    
    <div class='body'>
        <p><strong>indentificacion:</strong><?= $usuario->identificacion?> </p>        
        <p><strong>Nombre completo:</strong><?=$usuario->nombre.' '.$usuario->apellido ?></p>        
        <p><strong>Direccion:</strong> <?=$usuario->direccion?></p>        
        <p><strong>Telefono:</strong><?= $usuario->telefono?></p>        
        <p><strong>Perfil:</strong><?= $usuario->Perfil->nombre?></p>     
    </div>
</div>
<div id="pnlUsuarioCurso" class='card'>    
    <div class='body'>
        <input type="hidden" id="usid" name="">
        <p><strong>identificacion:</strong><span id="usidentificacion"></span></p>        
        <p><strong>Nombre completo:</strong><span id="usnombreCompleto"></span></p>        
        <p><strong>Direccion:</strong> <span id="usdireccionn"></span></p>        
        <p><strong>Telefono:</strong><span id="ustelefono"></span></p>        
        <p><strong>Telefono:</strong><span id="ususuario"></span></p>        
        <p><strong>Perfil:</strong><span id="usperfil"></span></p>     
        <div class="mb-3">
			<label for='perfil' class="form-label" >Curso</label>			
			<select id='curso'class="form-control" name ='curso'>				
				<option value="" >seleccione un perfil </option> 				
				<?php foreach($cursos as $row){ ?>					
				<option value="<?=$row->id?>"><?=$row->nombre?></option>			
				<?php }?>
			</select>			
		</div>
    </div>
</div>

<script type="text/javascript">
$("#husuario").click(function(){
    $("#pnlUsuario").dialog("open");
});
 
$("#pnlUsuarioCurso").dialog({    
    autoOpen:false,    
    height:380,    
    width:500,    
    buttons: {        
        "Guardar": function() {Guardar(); },        
        "Cerrar": function() { $(this).dialog("close"); },				
    }, 
    modal:true
});       
$("#pnlUsuario").dialog({    
    autoOpen:false,    
    height:280,    
    width:500,    
    buttons: {        
        "Editar": function() { window.location.href="<?=$url?>views/Usuarios/editar.php?id=<?=$usuario->id?>"},
        "Cambiar contraseña":function(){window.location.href="<?=$url?>views/Usuarios/passwordchange.php"},
        "Cerrar": function() { $(this).dialog("close"); },				
    }, 
    modal:true
});     
function Guardar()
{
  var usid =document.getElementById("usid").value;
  var curso=  document.getElementById("curso").value;
  if(curso=="")
  {
    alert();
    return;
  }
  $.ajax({        
        data:        
        {            
            opcion:2,
            usuario_id:usid,
            curso_id:curso

        },        
        dataType: 'json',        
        type: "POST",        
        url: "../../Controllers/api/usuario.php",    
    }).done(        
        function( data, textStatus, jqXHR )        
        {               
            console .log ("estado :",textStatus);            
            console.log( "La solicitud se ha completado correctamente.",data.msg );                     
            if(data.err)
            {
                
                alertify.success(data.msg);        
                window.location.href="<?=$url?>views/usuarios/show.php?id=12";
                
            }
            else
            {
                alertify.error(data.msg);
            }          
        }).fail(
            function( jqXHR, textStatus, errorThrown ) 
            {
                console.log( "La solicitud a fallado: " ,  textStatus);                     
    });             


} 
function añadirCurso(id)
{
    $.ajax({        
        data:        
        {            
            opcion:1,
            id:id                            
        },        
        dataType: 'json',        
        type: "POST",        
        url: "../../Controllers/api/usuario.php",    
    }).done(        
        function( data, textStatus, jqXHR )        
        {               
            console .log ("estado :",textStatus);            
            console.log( "La solicitud se ha completado correctamente.",data.usuario );                     
            document.getElementById("usid").value=data.usuario.id;
            document.getElementById("usidentificacion").innerHTML=data.usuario.identificacion;
            document.getElementById("usnombreCompleto").innerHTML=data.usuario.nombre+""+data.usuario.apellido;
            document.getElementById("usdireccionn").innerHTML=data.usuario.direccion;
            document.getElementById("ustelefono").innerHTML=data.usuario.telefono;
            document.getElementById("ususuario").innerHTML=data.usuario.usuario;
            document.getElementById("usperfil").innerHTML=data.usuario.Perfil.nombre;
            $("#pnlUsuarioCurso").dialog("open");
        }).fail(
            function( jqXHR, textStatus, errorThrown ) 
            {
                console.log( "La solicitud a fallado: " ,  textStatus);                     
    });             
} 

function Confirmar(msg)
{
    permitir=false;
    resp=window.confirm(msg);   
    if(resp)    
    {
        permitir =true;                                       
    }   
    console.log("permitir",permitir) ;      
    return permitir;    
}	
</script>
</body>
</html>
