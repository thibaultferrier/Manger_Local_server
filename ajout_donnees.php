<?php
include ('dbconfig.php');
	 
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Change character set to utf8
mysqli_set_charset($con,"utf8");

$content = $con->real_escape_string(htmlspecialchars($_POST["modif_poi_content"]));
$title = $con->real_escape_string(htmlspecialchars($_POST["modif_poi_title"]));

$idprod = $con->real_escape_string(htmlspecialchars($_POST["idprod"]));




//mise a jour du prod

//fixe
if ($title=="fixe"){
	
	$sql = " UPDATE PRODUCTEURS SET fixe='$content' WHERE idprod='$idprod'";
   
   if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . mysqli_error($con);
   }
	}

else if ($title=="port"){
	
	$sql = " UPDATE PRODUCTEURS SET port='$content' WHERE idprod='$idprod'";
   
   if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . mysqli_error($con);
   }

	}

else if ($title=="site"){
	$sql = " UPDATE PRODUCTEURS SET site='$content' WHERE idprod='$idprod'";
   
   if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . mysqli_error($con);
   }
 }

	
else if ($title=="email"){
	$sql = " UPDATE PRODUCTEURS SET email='$content' WHERE idprod='$idprod'";
   
   if (mysqli_query($con, $sql)) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($con);
	}
   }
	
else if ($title=="horaires"){
	$sql = " UPDATE PRODUCTEURS SET horaires='$content' WHERE idprod='$idprod'";
   
   if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . mysqli_error($con);
   }}
	
else if ($title=="monnaie_local"){
$sql = " UPDATE PRODUCTEURS SET monnaie_local='$content' WHERE idprod='$idprod'";
   
   if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . mysqli_error($con);
   }}
	


    mysqli_close($con);

?>
