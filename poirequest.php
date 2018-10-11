<?php


include ('dbconfig.php');
	 
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Change character set to utf8
mysqli_set_charset($con,"utf8");
	
	
$lat = mysqli_real_escape_string($con,htmlspecialchars($_GET["lat"]));
$lgn = mysqli_real_escape_string($con,htmlspecialchars($_GET["lgn"]));


//test anti robots
if($lat != null){

//selectionne producteur et image
$sql = "SELECT * 
FROM PRODUCTEURS P
INNER JOIN  IMAGES I
ON P.lat=I.lat AND P.lgn=I.lgn
WHERE P.lat='$lat' AND P.lgn='$lgn'";


//selectionne le nombre de commentaires
$sql2 = "SELECT COUNT(*) 
FROM COMMENTAIRES C 
WHERE C.lat='$lat' AND C.lgn='$lgn'"; 


	//résultats des recherches
	$result2 = mysqli_query($con ,$sql2) ;	
	$result = mysqli_query($con ,$sql);
	//mise en tableu des infos producteur
	while ($row = mysqli_fetch_assoc($result)) 

	{
		$array[] = $row;
	}


	header('Content-Type:Application/json');

	//encodage des infos en json
	$data = json_encode(mysqli_fetch_assoc($result2));
	$data1 = json_encode($array);


	//envoi des infos
	echo json_encode(array("POI"=>$array,"COM"=>json_decode($data, true)));
	
	

	//libere les résultats
	mysqli_free_result($result);
	mysqli_free_result($result2);




//incrémente le nombre de click
$insertSQL      =   "UPDATE PRODUCTEURS 
SET compteur = compteur+1
 WHERE lat='$lat'AND lgn='$lgn'";

mysqli_query($con,$insertSQL);
 
}


//ferme la connection
    mysqli_close($con);
  
 ?>

