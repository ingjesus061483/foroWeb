<?php
$titulo="Detalle de perfiles";
include("../../shared/head.php");

$modulo="Perfiles";
$PerfilesController=new PerfilController();
$id=0;
$msg="";
if (isset($_GET["id"]))
{    
    $id=$_GET['id'];    
}
$rows=null;
$perfil=$PerfilesController->detalleGet($id,$rows);
$permisos=$perfil->Permisos;
?>
<div style='margin:0 auto;' class='card mb-4'>
    <div class='card-body'>         
        <div class="mb-3">
            <strong>nombre:</strong> <?=$perfil->nombre?> 
        </div>
        <div class="mb-3">
            <strong>Descripcion:</strong><?=$perfil->descripcion?>        
        </div>                             
        <br>
        <a  class='btn btn-primary' href ='index.php' >Regresar</a>                
        <a id='btnPermiso' class='btn btn-info' href ='#' > Crear Permisos</a>          
    </diV>        
    <div class='body'>
        <table class="table" id='customers'>
            <thead>                
                <tr>                    
                    <th >Id </th>
                    <th >Modulo</th>
                    <th>Valor</th>  
                    <th>Id modulo</th>                     
                    <th>Id perfil</th>                            
                    <th></th>                     
                    <th></th>                          
                </tr>
            </thead> 
            <tbody>           
            <?php foreach($permisos as $row ){?>                
                <tr>
                    <td><?=$row->id?> </td>
                    <td><?=$row->modulo?> </td>
                    <td><?=$row->valor?></td>
                    <td><?=$row->perfil_id?></td>
                    <td><?=$row->modulo_id?></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>                 
</div>
<div id ="ModalPermiso" >
    <input type='hidden'  id='idperfil' value='<?=$id?>'/>
    <label for="modulo"> modulo</label>
    <select class="form-control" id="modulo"name="modulo">
        <?php foreach($rows as $row){?>
            <option value="<?=$row->id?>"><?=$row->nombre?></option>
        <?php }?>
    </select>
    <label for="txtValue"> valor</label>
    <select id="value" class="form-control"name="value">
        <option value="Create">Crear</option>
        <option value="Edit">Editar</option>
        <option value="Delete">Eliminar</option>
        <option value="View">Ver</option>
        <option value="Details">Detalles</option>
    </select>
</div>
<script type="text/javascript">
    frm=document.getElementById('frm');
    msg=document.getElementById('msg');   
    permisos=document.getElementById('permisos');
    idusuario=document.getElementById('idusuario');
    $(document).ready(function(){        
        $("#btnPermiso").click(function(){
            $("#ModalPermiso").dialog("open");
        }); 
        //configuracion regional:

        function AgregarPermisos()
        {
            idperfil=document.getElementById('idperfil');
            modulo=document.getElementById('modulo');
            value= document.getElementById('value');            
            $.ajax({                
                data:                 
                {
                    opcion:1,
                    perfil:idperfil.value,
                    modulo : modulo .value,
                    valor : value.value
                },                
                dataType: 'json',
                type: "POST",
                url: "../../Controllers/api/Permisos.php",
            }).done(
                function( data, textStatus, jqXHR )
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
                "enviar": function() { AgregarPermisos()},
                "Cerrar": function() { location.reload();$(this).dialog("close"); },				
            }, 
            modal:true
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
            url: "<?=$url?>Controllers/api/Permisos.php",
            }) .done(function( data, textStatus, jqXHR )                 
                {            
                    if(data.success)
                    {
                        alertify.success(data.mesage);        
                        setTimeout(function() {window.location.href="Detalles.php";}, 5000);
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
</scripT>
<?php include("../../shared/foot.php"); ?>