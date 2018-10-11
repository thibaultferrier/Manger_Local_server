<?php


include ('dbconfig.php');
	 
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Change character set to utf8
mysqli_set_charset($con,"utf8");
	
	
$producteur = real_escape_string(htmlspecialchars($_GET["nom_du_producteur"]);


//selectionne infos producteur et image
$sql = "SELECT 
 P.description,
 P.site,
 I.nom_du_producteur,
 I.image_name1,
 I.path1,
 I.image_name2,
 I.path2,
 I.image_name3,
 I.path3
FROM PRODUCTEURS P
INNER JOIN  IMAGES I
ON P.nom_du_producteur=I.nom_du_producteur
WHERE P.nom_du_producteur='$producteur'";



	$result = mysqli_query($con ,$sql);
	
	while ($row = mysqli_fetch_assoc($result)) {
		
		$array[] = $row;
		
	}
header('Content-Type:Application/json');
	
	echo json_encode($array);


//header( 'Location: http://localhost/Manger-Local.html' );
	

 
    mysqli_free_result($result);


//ferme la connection
    mysqli_close($con);


  
 ?>
