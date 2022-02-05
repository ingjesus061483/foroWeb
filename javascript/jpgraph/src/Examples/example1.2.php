<?php
include ("../jpgraph.php");
include ("../jpgraph_line.php");

//$ydata = array(11,3,8,12,5,1,9,13,5,7);

 $mysqli= new mysqli("localhost","root", "in00340", "sgp");

if($mysqli->connect_errno){
   // echo "Fallo al conectar a MySQL:(". $mysqli->connect_errno.")". $mysqli->connect_errno;
}

$resultado=$mysqli->query("SELECT  avance.fecha , avance.avance from avance where avance.id= avance.id");

$fecha=array();
$avance=array();

while($row=$resultado->fetch_assoc()){
   $fecha[]=$row['fecha'];
   $avance[]=$row['avance'];
}


// Create the graph. These two calls are always required
$graph = new Graph(800,300,"auto");	
$graph->SetScale("textlin");
$graph->img->SetMargin(30,60,40,50);
$graph->xaxis->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->SetTickLabels($fecha);
$graph->title->Set("Dashed lineplot");

// Create the linear plot
$lineplot=new LinePlot($avance);
$lineplot->SetLegend("Test 1");
$lineplot->SetColor("blue");

// Style can also be specified as SetStyle([1|2|3|4]) or
// SetStyle("solid"|"dotted"|"dashed"|"lobgdashed")
$lineplot->SetStyle("dashed");


// Add the plot to the graph
$graph->Add($lineplot);

// Display the graph
$graph->Stroke();
?>
