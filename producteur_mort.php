<?php


include ('dbconfig.php');
	 
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Change character set to utf8
mysqli_set_charset($con,"utf8");


$idprod = $con->real_escape_string(htmlspecialchars($_POST["idprod"]));

//test anti robots
if($idprod != null){
	
//incrémente le signalement
$insertSQL   =   "UPDATE PRODUCTEURS 
SET producteur_mort = producteur_mort+1
 WHERE idprod='$idprod'";

mysqli_query($con,$insertSQL);


}
    mysqli_close($con);
  
 ?>
