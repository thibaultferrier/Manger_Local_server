 <?php


include ('dbconfig.php');
	 
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Change character set to utf8
mysqli_set_charset($con,"utf8");

$lat_n =$con->real_escape_string(htmlspecialchars($_GET['lat_n']));
$lat_s =$con->real_escape_string(htmlspecialchars($_GET['lat_s']));
$lgn_e =$con->real_escape_string(htmlspecialchars($_GET['lgn_e']));
$lgn_o =$con->real_escape_string(htmlspecialchars($_GET['lgn_o']));


$sql = "SELECT  lat,
		lgn,
		type_lieu_de_vente,
		produits,
		description,
		nom_du_producteur 
		FROM PRODUCTEURS
		WHERE (lat BETWEEN $lat_s AND $lat_n)
		AND (lgn BETWEEN $lgn_o AND $lgn_e)";

	$result = mysqli_query($con ,$sql);


	
	while ($row = mysqli_fetch_assoc($result)) {
		
		$array[] = $row;
		
	}
	header('Content-Type:Application/json');


	
	echo json_encode( $array);

 
    mysqli_free_result($result);
 
    mysqli_close($con);
  
 ?>

