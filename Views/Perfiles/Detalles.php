<?php
$titulo="detalle de perfiles";
$modulo="Perfiles";
session_start();
require_once("../../Model/Usuarios.php");
require_once("../../Model/Perfil.php");
require_once("../../Data/DataAccess.php");
require_once("../../Data/Utilidades.php");
require_once("../../Controllers/PerfilesController.php");
$PerfilesController=new PerfilesController();
if (!isset($_SESSION['usuario']))
{
  header('Location:../../login.php');
}
$id=0;
$table="";
$body="";
$msg="";
$error="";
if (isset($_SESSION['usuario']))
{
    if(isset( $_POST["enviar"]))
    {
        $id=$_POST["id"];
       $PerfilesController-> eliminarPost($id,$msg,$error);
    }
    if (isset($_GET["id"]))
    {
         $id=$_GET['id'];    
    }

}
$combo="";
$perfil=$PerfilesController->detalleGet($id,$table,$combo);
echo" <input type='hidden'  id='idperfil' value='$id'/>";
echo" <input type='hidden'  id='msg' value='$msg'/>";
echo" <input type='hidden'  id='error' value='$error'/>";
$permisos=0;
if($perfil !=NULL)
{
    $permisos =sizeof( $perfil->Permisos);
     $estado="";
     if ($perfil->estado==1)
     {
         $estado="Activo";
     }
     else{
         $estado="Inactivo";
     }
 $body="
    <div style='margin:0 auto;' class='card'>
        <div class='header'>
        $titulo
        </div>         
        <div class='body'>         
           <form id='frm' onsubmit='return Validar();' method='post' action='Detalles.php' >
               <div>
                 <input type='hidden' name='id' id='id' value='$id'/>           
                 <p><strong>nombre:</strong>  $perfil->nombre </p>
                 <p><strong>Descripcion:</strong>$perfil->descripcion</p>
                 <p><strong>Estado:</strong> $estado</p>
                </div>                 
                <div>
                    <div style ='padding: 10px;float:right; '>
                        <button   class='button' type='submit' name ='enviar' >Elimimar</button>
                        <a  class='button' href='editar.php?id= $perfil->id' >Editar</a>   
                        <a  class='button' href ='index.php' >Listado de perfiles</a>
                        <a id='btnPermiso' class='button' href ='#' > Crear Permisos</a>
                     </div>
                </div>          
           </form>
        </diV> 
        <div class='body'>
            <table id='customers'>
                <thead>
                    <tr>
                        <th >Id </th>
                        <th >Modulo</th>
                        <th>Valor</th>                           
                        <th></th>                          
                    </tr>
                </thead> 
                <tbody>
                    $table
                </tbody>
            </table>
        </div>                 
    </div>";
}
echo" <input type='hidden'  id='permisos' value='$permisos'/>";
require_once("../../shared/Plantilla.php");
?>
<div id ="ModalModulo"style ="display:none" >
    <label for="modulo"> modulo</label>
    <select id="modulo"name="modulo">
        <?php
        echo$combo;
        ?>
    </select>
    <label for="txtValue"> valor</label>
    <select id="value" name="value">
        <option value="Create">Crear</option>
        <option value="Edit">Editar</option>
        <option value="Delete">Eliminar</option>
        <option value="View">Ver</option>
        <option value="Details">Detalles</option>
    </select>
</div>
<div id ="ModalPermiso"style ="display:none" >
    <label for="modulo"> modulo</label>
    <select id="modulo"name="modulo">
        <?php
        echo$combo;
        ?>
    </select>
    <label for="txtValue"> valor</label>
    <select id="value" name="value">
        <option value="Create">Crear</option>
        <option value="Edit">Ed     $.ajax({
            data: {IMEI: "354330030646882", CompanyID: 10},
            dataType: 'json',
            type: "GET",
            url: " https://fleetsapapiqa.azurewebsites.net/api/GetIMEIDataServicesByIMEIAndCompany",
            }) .done(function( data, textStatus, jqXHR ) 
            {            
                alert (data)                
                console .log ("estado :",textStatus);
                console.log( "La solicitud se ha completado correctamente.",data );             
                               
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                console.log( "La solicitud a fallado: " ,  textStatus);                     
            });            itar</option>
        <option value="Delete">Eliminar</option>
        <option value="View">Ver</option>
        <option value="Details">Detalles</option>
    </select>
</div>
<script type="text/javascript">
    frm=document.getElementById('frm');
    msg=document.getElementById('msg');
    error=document.getElementById('error');
    permisos=document.getElementById('permisos');
    idusuario=document.getElementById('idusuario');
    $(document).ready(function(){
        
        function prueba ()
        {
       
        }
        

        //configuracion regional:
        function AgregarPermisos()
        {
            idperfil=document.getElementById('idperfil');
            modulo=document.getElementById('modulo');
            value= document.getElementById('value');            
            $.ajax({
            data: {metodo:"agregarPermiso",idperfil:idperfil.value,modulo : modulo .value, value : value.value},
            dataType: 'json',
            type: "POST",
            url: "../../Controllers/api/Permisos.php",
            }) .done(function( data, textStatus, jqXHR ) 
            {            
                if(data.success)
                {
                    alertify.success(data.mesage);        
                    setTimeout(function() {window.location.href="Index.php";}, 5000);
                }
                else 
                {
                    alertify.error(data.mesage);        
                }                
                console .log ("estado :",textStatus);
                console.log( "La solicitud se ha completado correctamente.",data );             
                               
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                console.log( "La solicitud a fallado: " ,  textStatus);                     
            });            
        }
        $("#ModalPermiso").dialog(
        {
            autoOpen:false,
            height:400,
            width:600,
            buttons: {  
                "enviar": function() { prueba()},
                "Cerrar": function() { location.reload();$(this).dialog("close"); },				
            }, 
            modal:true
        });
        $("#btnPermiso").click(function(){
            $("#ModalPermiso").dialog("open");
        }); 
    });// JavaScript Document
    function eliminar(id)
    {
        resp=window.confirm('Desea eliminar este permiso?');
        if(resp)
        {
            $.ajax({
            data: {metodo:"EliminarPermiso",id:id},
            dataType: 'json',
            type: "POST",
            url: "../../Controllers/api/Permisos.php",
            }) .done(function( data, textStatus, jqXHR ) 
            {            
                if(data.success)
                {
                    alertify.success(data.mesage);        
                    setTimeout(function() {window.location.href="Index.php";}, 5000);
                }
                else 
                {
                    alertify.error(data.mesage);        
                }                
                console .log ("estado :",textStatus);
                console.log( "La solicitud se ha completado correctamente.",data );             
                               
            }).fail(function( jqXHR, textStatus, errorThrown ) {
                console.log( "La solicitud a fallado: " ,  textStatus);                     
            });                        
        }
    }
    function Validar()
    {
        console.log('pwemiso' ,permisos.value)
        resp=window.confirm('Desea eliminar este perfil?');
        permitir =false;                                       
        if(resp)        
        {            
            if(permisos.value==0)
            {
                permitir =true;                                       
            }
            else
            {
                alertify.error("Este perfil tiene permisos asociados a el");                       
            }
            console.log('permitir',permitir)  
        
        }
        return permitir;                    
    }
    if(error.value!="")
    {
        alertify.error(error.value);   
    }
	if(msg.value!="")
	{
        alertify.success(msg.value);
   		//alert(msg.value);
		setTimeout(function() {window.location.href="Index.php";}, 5000);
	}
</scripT>