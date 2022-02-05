<?php
class Utilidades
{
    public static function CrearMenu($permisos,$modulo)
    {
        $tam=sizeof($permisos);
        $menu="<header><nav><ul>";
        for($i=0;$i<=$tam-1;$i++)
        {
            $vec=$permisos[$i]; 
            if($vec["valor"]=="View")
            {
                switch($vec["modulo"])
                {
                    case"Inicio":
                    {
                        if($modulo=="Inicio")
                        {
                            $menu=$menu."<li><a href='index.php'>Inicio</a></li>";
                        }
                        else
                        {
                            
                            $menu=$menu."<li><a href='../Home/index.php'>Inicio</a></li>";
                        }
                        break;
                    }
                    case"Modulos":
                    {
                        $menu=$menu."<li><a href='../Modulos/Index.php'>Modulos</a></li>";
                        break;
                    }
                    case "Cursos":
                    {
                        $menu=$menu. "<li><a href=''>Cursos</a></li>";
                        break;
                    }
                    case "Perfiles":
                    {
                        $menu=$menu."<li><a href='../Perfiles/index.php'>Roles y permisos</a></li>";
                        break;
                    }
                    case "Foros":
                    {
                        $menu=$menu."<li><a href=''>Foro</a></li>";
                        break;
                    }
                    case "Usuarios":
                    {
                        $menu=$menu." <li><a href='../Usuarios/index.php'>Usuarios</a></li> ";
                        break;
                    }
                }
            }            
        }
        $menu=$menu."</ul></nav></header>";
        return $menu;
    }
    public static function CodificarImagen($con,$archivo)
	{
		$imagenEscapes="";
		if (is_uploaded_file($archivo["tmp_name"]))
		{
			if ($archivo["type"]=="image/jpeg" || 
			$archivo["type"]=="image/pjpeg" || 
			$archivo["type"]=="image/gif" || 
			$archivo["type"]=="image/bmp" || 
			$archivo["type"]=="image/png")
			{
				$info=getimagesize($archivo["tmp_name"]);
				$imagenEscapes=mysqli_real_escape_string($con,file_get_contents($archivo["tmp_name"]));					  
			}				 
		}
		return $imagenEscapes;
	}
    public static function vector ($result)
    {
        $combo="";
        $tam=sizeof($result);        
        for($i=0;$i<=$tam-1;$i++)
        {
            $vec=$result[$i];
            $values="";
            foreach($vec as $x => $x_value) 
            {                
                $values=$values.$x_value.";";
                //  $combo=$combo."<option value=".$fila[0].">".$fila[1]."</option>";
            }
            $arr = explode(";", $values);
            $combo=$combo."<option value=$arr[0]>$arr[1]</option>";
        }
        return $combo;
    }

    public static function Creartabla($result,$tipo)
    {
       $row="";
       $tam=sizeof($result);  
        switch($tipo)
        {
           case "ver":{
                for($i=0;$i<=$tam-1;$i++)
                {
                    $row=$row."<tr>";
                    $vec=$result[$i];
                    $id=0;
                    foreach($vec as $x => $x_value) 
                    {
                        if($x=="id")
                        {
                            $id=$x_value;
                        }
                        $row=$row."<td>". $x_value ."</td>";            
                    }
                    $row=$row."<td><a class='buttonCol' href='Detalles.php?id=$id'>Ver</a></td></tr>";
                }
                break;
           }
           case "eliminar":{
            for($i=0;$i<=$tam-1;$i++)
            {
                $row=$row."<tr>";
                $vec=$result[$i];
                $id=0;
                foreach($vec as $x => $x_value) 
                {
                    if($x=="id")
                    {
                        $id=$x_value;
                    }
                    $row=$row."<td>". $x_value ."</td>";            
                }
                $row=$row."<td><a class='buttonCol' onclick='eliminar($id)'>Eliminar</a></td></tr>";
            }
            break;
           }
        }               
        return $row;			
    }
} 