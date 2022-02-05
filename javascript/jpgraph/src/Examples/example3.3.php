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
$graph = new Graph(800,400,"auto");	
$graph->SetScale("textlin");

// Adjust the margin
$graph->img->SetMargin(40,20,20,50);
$graph->SetShadow();

// Create the linear plot
$lineplot=new LinePlot($avance);
$lineplot->mark->SetType(MARK_UTRIANGLE);
$lineplot->value->show();

// Add the plot to the graph
$graph->Add($lineplot);

$graph->title->Set("Displaying the values");
$graph->xaxis->title->Set("Fecha");
$graph->yaxis->title->Set("Avance");

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->SetTickLabels($fecha);

$lineplot->SetColor("blue");
$lineplot->SetWeight(2);


// Display the graph
$graph->Stroke();
?>
