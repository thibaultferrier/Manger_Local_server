<?php

 
include ('dbconfig.php');

// Change character set to utf8
mysqli_set_charset($con,"utf8");


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


//récupere les infos producteur
$nom_du_producteur=$con->real_escape_string(htmlspecialchars($_POST['nom_du_producteur']));
$idprod=$con->real_escape_string(htmlspecialchars($_POST['idprod']));

$lat=$con->real_escape_string(htmlspecialchars($_POST['lat']));
$lgn=$con->real_escape_string(htmlspecialchars($_POST['lgn']));

$image_name1=$con->real_escape_string(htmlspecialchars($_POST['image_name1']));
$path1=$con->real_escape_string(htmlspecialchars($_POST['path1']));
$image_name2=$con->real_escape_string(htmlspecialchars($_POST['image_name2']));
$path2=$con->real_escape_string(htmlspecialchars($_POST['path2']));
$image_name3=$con->real_escape_string(htmlspecialchars($_POST['image_name3']));
$path3=$con->real_escape_string(htmlspecialchars($_POST['path3']));



//défini les chemins d'accès
define('UPLOAD_DIR', 'imagestemp/');
define('LOCALHOST','http://mangerlocal.ddns.net/');


//test anti robots
if($nom_du_producteur!=null){


//chemin image 1
if (isset($path1) && $path1!==null && !strpos($path1,"mangerlocal.jpg"))
{$DefaultId1=$con->real_escape_string(htmlspecialchars($lat.$lgn."_1.jpg"));}
else
{$DefaultId1="mangerlocal.jpg";}

$ServerURL1 = LOCALHOST.UPLOAD_DIR.$DefaultId1;
$file1 = UPLOAD_DIR .$DefaultId1;


//chemin image 2
if ($path2!==null && $path2!==null && !strpos($path2,"mangerlocal.jpg"))
{$DefaultId2=$con->real_escape_string(htmlspecialchars($lat.$lgn."_2.jpg"));}
else
{$DefaultId2="mangerlocal.jpg";}
$ServerURL2 = LOCALHOST.UPLOAD_DIR.$DefaultId2;
$file2 = UPLOAD_DIR .$DefaultId2;

//chemin image 3
if ($path3!==null && $path3!==null && !strpos($path3,"mangerlocal.jpg"))
{$DefaultId3=$con->real_escape_string(htmlspecialchars($lat.$lgn."_3.jpg"));}
else
{$DefaultId3="mangerlocal.jpg";}
$ServerURL3 =LOCALHOST.UPLOAD_DIR.$DefaultId3;
$file3 = UPLOAD_DIR .$DefaultId3;

//producteur modifié
$nvx_modif=1;


//requete table image insert les images
$sql =(
	"INSERT INTO IMAGES_TEMP (
		nom_du_producteur,
		image_name1,
		path1,
		image_name2,
		path2,
		image_name3,
		path3,
		lat,
		lgn,
		idprod,
		nouveau_modif)

	VALUES (
		'$nom_du_producteur',
		'$DefaultId1',
		'$ServerURL1',
		'$DefaultId2',
		'$ServerURL2',
		'$DefaultId3',
		'$ServerURL3',
		'$lat',
		'$lgn',
		'$idprod',
		'$nvx_modif');"
	);


//copie les images sur le server
if (isset($path1) && $path1!==null && !strpos($path1,"mangerlocal.jpg")){
	
	//si l'image est déja sur le serveur on la déplace
	if(strpos($path1,"mangerlocal.ddns.net")){
		copy($path1,$file1);
		
	}else{
	
	$source1 =imagecreatefromstring(base64_decode($_POST['path1']));
	file_put_contents($file1,base64_decode($_POST['path1']));
	//on récup les dim
	list($width1,$height1) = getimagesize($file1);
	
	
	//on calcule les nouvelles dim
	if($width1>1200) {$new_width1 = 1200;}
	else{$new_width1=600;}
	$new_height1 = ($new_width1*$height1)/$width1;
	
	if($new_height1<315){
		$new_height1=315;
		$new_width1=($new_height1*$width1)/$height1;}
	
	//on redimensionne
	$image_p1 = imagecreatetruecolor($new_width1, $new_height1);
	imagecopyresized($image_p1, $source1, 0, 0, 0, 0,$new_width1, $new_height1, $width1, $height1);
	imagejpeg($image_p1,$file1,100);
		}
	}
		
if (isset($path2) && $path2!==null && !strpos($path2,"mangerlocal.jpg")){
	
	//si l'image est déja sur le serveur on la déplace
	if(strpos($path2,"mangerlocal.ddns.net")){
		copy($path2,$file2);
		
	}else{
	
	$source2 =imagecreatefromstring(base64_decode($_POST['path2']));
	file_put_contents($file2,base64_decode($_POST['path2']));
	//on récup les dim
	list($width2,$height2) = getimagesize($file2);
	
	
	//on calcule les nouvelles dim
	if($width2>1200) {$new_width2 = 1200;}
	else{$new_width2=600;}
	$new_height2 = ($new_width2*$height2)/$width2;
	
	if($new_height2<315){
		$new_height2=315;
		$new_width2=($new_height2*$width2)/$height2;}
	
	//on redimensionne
	$image_p2 = imagecreatetruecolor($new_width2, $new_height2);
	imagecopyresized($image_p2, $source2, 0, 0, 0, 0,$new_width2, $new_height2, $width2, $height2);
	imagejpeg($image_p2,$file2,100);
	
		}
	}

if (isset($path3) && $path3!==null && !strpos($path3,"mangerlocal.jpg")){
	
	//si l'image est déja sur le serveur on la déplace
	if(strpos($path3,"mangerlocal.ddns.net")){
		copy($path3,$file3);
		
	}else{
	
	$source3 =imagecreatefromstring(base64_decode($_POST['path3']));
	file_put_contents($file3,base64_decode($_POST['path3']));
	//on récup les dim
	list($width3,$height3) = getimagesize($file3);
	
	
	//on calcule les nouvelles dim
	if($width3>1200) {$new_width3 = 1200;}
	else{$new_width3=600;}
	$new_height3 = ($new_width3*$height3)/$width3;
	
	if($new_height3<315){
		$new_height3=315;
		$new_width3=($new_height3*$width3)/$height3;}
	
	//on redimensionne
	$image_p3 = imagecreatetruecolor($new_width3, $new_height3);
	imagecopyresized($image_p3, $source3, 0, 0, 0, 0,$new_width3, $new_height3, $width3, $height3);
	imagejpeg($image_p3,$file3,100);
	
		}
	}




if(mysqli_query($con,$sql))
    {
    echo "Image(s) ajouté(s) avec succès!";
	}
    else
    {
    echo "Une erreur est survenue!";
    }
}

$con->close();
?>



