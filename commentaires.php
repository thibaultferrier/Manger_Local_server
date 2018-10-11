<?php


include ('dbconfig.php');
	 
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Change character set to utf8
mysqli_set_charset($con,"utf8");
	
	
$lat = $con->real_escape_string(htmlspecialchars($_GET["lat"]));
$lgn = $con->real_escape_string(htmlspecialchars($_GET["lgn"]));



//selectionne les commentaires
$sql = "SELECT * 
FROM COMMENTAIRES 
WHERE lat='$lat' AND lgn='$lgn'
ORDER BY date DESC ,heure DESC 

";


	$result = mysqli_query($con ,$sql);
	while ($row = mysqli_fetch_assoc($result)) 

	{
		$array[] = $row;
	}


	header('Content-Type:Application/json');

	
	echo json_encode($array);

	//libere les résultats
	mysqli_free_result($result);
	


//ferme la connection
    mysqli_close($con);
  
 ?>

