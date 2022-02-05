<?php
require_once("cldatos.php");
class clforos extends cldatos
{
	private $idAdministrador,$titulo,$mensaje,$fecha,$cont;
//	public function __construct($vidAdministrador ,$vtitulo,$vmensaje,$vfecha)
  //  {
    //    $this->idadministrador = $vidadministrado;
      //  $this->titulo=$vtitulo;
       // $this->mensaje=$vmensaje;
        //$this->fecha=$vfecha;   
    //}
	
    public function mostrarForosAdministrador(&$mostrar,$idtipoid,$idusuario)
	{
		$consulta="call paCargarForoAdministrador() ";
			$this->consultar($consulta,$result,$buscar,'buscar');
			if($buscar)
			{
				$cols =mysqli_num_fields($result);
				$i=0;
				while ($fila =mysqli_fetch_array($result))
				{
					$i=$i+1;
					 $mostrar =$mostrar."<div><input  type='hidden' id='idforo' value='".$fila["idforo"]."><p>Nombre: <span>".$fila ["nombre_completo"]."</span> Email:<span> ".$fila["email"]."</span> curso:<span>".$fila["curso"]."</span></p><div style='border-width:10px;'><p>Titulo:<span>" .$fila["titulo"]. "</span> Fecha:<span>".$fila["fecha_foro"]."</span> Cantidad de respuestas:<span>".$fila["respuesta"]."</span></p><p>Mensaje:<span>". $fila["mensaje"]."</span></p></div> <div ><input type='button' id='btnVer' class='btnResponder' onClick='ver_respuesta(".$fila["idforo"].",".$i.",".$fila["respuesta"].");' value='ver respuestas'><input  type='button' id='btnResponde' class='btnResponder' onClick='respuesta(".$fila["idforo"].",".$idtipoid.",".$idusuario.");' value='responder'><input  type='button' id='ocultar".$i."' style='display:none;' onClick='ocultar(".$i.");' class='btnResponder'  value='Ocultar' > </div><div style='margin-top:10px; display:none; padding-top:10px; padding-right:10px;'   id='container".$i."'></div>";
					
				}
					
				
				
			}
	}
	public function paAgregarForo($idAdministrador,$titulo,$mensaje,$fecha )
	{
		$consulta="call paAgregarForo(".$idAdministrador.",'".$titulo."','".$mensaje."','".$fecha."')";
		$this->consultar($consulta,$result,$buscar,'');
		
	}
	public function paAgregarRespuesta($idforo,$idAdministrador,$idprofesor,$idalumno,$fecha,$mensaje )
	{
		$consulta="call paAgregarRespuesta(".$idforo.",".$idAdministrador.",".$idprofesor.",".$idalumno.",'".$fecha."','".$mensaje."')";
		
		$this->consultar($consulta,$result,$buscar,'');
		echo "<p> Agrego la respuesta correctamente</p>";
		
	}
	public function paMostrarRespuesta($idforo)
	{
		$consulta="call paMostrarRespuesta(".$idforo.")";
		$this->consultar($consulta,$result,$buscar,"buscar");
		if($buscar)
		{
				while ($fila =mysqli_fetch_array($result))
				{
					if ($fila["idAdmin"]!=NULL)
					{
					echo"<div style='background:#9C9EA1;margin-top:10px'><p> Respondido por: <span>".$fila["admin"]."</span> Fecha:<span>".$fila["fecha"]."</p> <p>Mensaje:<span>".$fila["mensaje"]."</span></p></div> ";
					}
				}
				//echo"<div style='padding-top:10px;'><input  type='button' id='ocultar' onClick='ocultar();' class='btnResponder'  value='Ocultar'> </div>";
		}
	}


}
?>

