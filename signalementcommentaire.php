<?php


include ('dbconfig.php');
	 
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Change character set to utf8
mysqli_set_charset($con,"utf8");


$id = $con->real_escape_string(htmlspecialchars($_POST["id"]));

//test anti robots
if($id != null){

//incrémente le signalement
$insertSQL      =   "UPDATE COMMENTAIRES 
SET signalement = signalement+1
 WHERE id='$id'";

mysqli_query($con,$insertSQL);

}

    mysqli_close($con);
  
 ?>
