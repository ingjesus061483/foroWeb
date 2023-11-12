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
<script type="text/javascript"> 
$("#husuario").click(function(){
    $("#pnlUsuario").dialog("open");
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
function validar(msg)
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
