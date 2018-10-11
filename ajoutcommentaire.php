<?php

 
include ('dbconfig.php');

// Change character set to utf8
mysqli_set_charset($con,"utf8");


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

//récupere les infos producteur
$nom=$con->real_escape_string(htmlspecialchars($_POST['nom_du_producteur']));
$pseudo=$con->real_escape_string(htmlspecialchars($_POST['pseudo']));
$com=$con->real_escape_string(htmlspecialchars($_POST['commentaire']));
$lat=$con->real_escape_string(htmlspecialchars($_POST['lat']));
$lgn=$con->real_escape_string(htmlspecialchars($_POST['lgn']));


$date = date('Y-m-d');
$time = date('H:i:s');

//test pour robots
	if($nom!=null){

//requete table commentaire, insert une ligne
$sql = (
	"INSERT INTO COMMENTAIRES (
	nom_du_producteur,
	pseudo,
	commentaire,
	lat,
	lgn,
	heure,
	date)

	VALUES (
	'$nom',
	'$pseudo',
	'$com',
	'$lat',
	'$lgn',
	'$time',
	'$date');"
	) 
or die(mysqli_error($con));

if(mysqli_query($con,$sql))
    {
    echo "Commentaire ajouté avec succès!";
	}
    else
    {
    echo "Une erreur est survenue!";
    }

}

$con->close();
?>
