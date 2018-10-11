<!DOCTYPE html> 
   
<html lang="fr">

    <head>
		
		<link rel="stylesheet" type="text/css" href="Manger-Local.css">
		<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Annie Use Your Telescope' rel='stylesheet'>
		
		<style>
			body {
				font-family: 'Annie Use Your Telescope';
				background: url(/images/mangerlocal_back.JPG) no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				}
			h1 {
				font-family: 'Amatic SC';
				text-align:center;
font-size:2.5vw;
padding-bottom:2%;
margin-top:0.5%;
}



div.first{
width:50%;
text-align:justify;
margin: 0 auto;
margin-top:1%;
margin-bottom:0%;
padding:1%;
padding-bottom:0%;
font-size:120%;
border:solid 2px;
border-radius:20px;
background-color:rgba(226,214,190,0.7);
z-index:1;
}

a:link {
color : #C66F3A;
text-decoration : none;
}
a:visited {
color : #25737d;
text-decoration : none;
}
a:hover {
color : #9b0d0a;
text-decoration : none;
}
a:active, a:focus {
color : #9b0d0a;
}
.img_grande {
display : block;
margin-left : auto;
margin-right : auto;
border-radius : 5px;
max-width:90%;
max-height:50%;
}
.img_min {
width : 5%;
max-height : 5%;
border-radius : 5px;
}
.miniature {
text-align : center;
padding : 1%;
}
.link {
visibility : hidden;
}
.p_1 {
text-align : justify;
display : block;
color : #3F392F;
margin:0%;
margin-left:1.5%;
padding:0%;
}

 @media only screen and (max-device-width:1024px) {

.link {
text-align : center;
border-style : solid;
border-width : 5px;
visibility : visible;
font-size : 300%;
margin-top : 10%;
margin-bottom : 5%;
padding-top : 2%;
padding-bottom : 2%;
border-radius : 15px;
}
h1 {
min-height : 10px;
font-size : 6vw;
padding : 2.5%;
border-radius : 5px;
text-align : center;
}
div.first{
width:90%;
}
.img_grande {
width : 100%;
border-radius : 15px;
}
.miniature {
display : block;
border-radius : 15px;
}
.img_min {
width : 30%;
max-height : 30%;
border-radius : 15px;
margin-top : 50px;
}
.p_1 {
width : 98%;
font-size : 250%;
color : #3F392F;
}
}
@media only screen and (max-device-width:1024px) and (orientation:landscape) {
h1 {
border-radius : 5px;
font-size : 7vw;
min-height : 1px;
padding : 1%;
width : auto;
margin-bottom : 5%;
display : block;
}
.img_grande {
width : 100%;
height : auto;
max-height:50%;
border-radius : 15px;
display : block;
margin-left:auto;
margin-right:auto;
}
.p_1 {
width : 98%;
font-size : 150%;
color : #3F392F;
}
.miniature {
display : block;
margin-left:auto;
margin-right:auto;
border-radius : 15px;
text-align : center;
}
.img_min {
max-height : 100px;
width : auto;
max-width : 100%;
border-radius : 15px;
margin-top : 50px;
}
.link {
text-align : center;
border-style : solid;
border-width : 2px;
padding-left : 2%;
visibility : visible;
font-size : 150%;
margin-top : 5%;
margin-bottom : 5%;
padding-top : 2%;
padding-bottom : 2%;
border-radius : 15px;
display : block;
}
}

						
		</style>		
		
		<?php
		
include ('dbconfig.php');
	 
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

	// Change character set to utf8
	mysqli_set_charset($con,"utf8");


		if (isset($_GET["nom_du_producteur"])){
			$get_producteur=mysqli_real_escape_string($con,htmlspecialchars($_GET["nom_du_producteur"]));
		}
				if (isset($_GET["description"])){
			$get_description=mysqli_real_escape_string($con,htmlspecialchars($_GET["description"]));
		}
				if (isset($_GET["imgurl"])){
			$get_imgurl=mysqli_real_escape_string($con,htmlspecialchars($_GET["imgurl"]));
		}
		
		if (isset($_GET["lat"])){$lat = $con->real_escape_string(htmlspecialchars($_GET["lat"]));}
		if (isset($_GET["lgn"])){$lgn = $con->real_escape_string(htmlspecialchars($_GET["lgn"]));}
		
		//ferme la connection
		mysqli_close($con);
	
		?>
		<meta charset="utf-8" http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
			<!--  Essential META Tags -->
			
		<meta property="al:android:url" content="<?php echo "mangerlocal://producteur?lat=".$lat."&lgn=".$lgn ?>">
		<meta property="al:android:package" content="com.manger__local.mangerlocal">
		<meta property="al:android:app_name" content="Manger Local">
		<meta property="og:type" content="website" />
		
		<meta name="title" property="og:title" content="<?php echo $get_producteur; ?>"/>
		<meta name="description" property="og:description" content="<?php echo $get_description; ?>"/>
		<meta name="image" property="og:image" content="<?php echo "https://mangerlocal.dynamic-dns.net/images/".$get_imgurl; ?>"/>
		<meta name="url" property="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>


		<meta property="og:site_name" content="Manger Local"/>
		<meta property="fb:app_id" content="2041165159500348"/>

		<title>Manger Local</title>
		
       		<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
    </head>
    <body>
		
		<?php

include ('dbconfig.php');
	 
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Change character set to utf8
mysqli_set_charset($con,"utf8");
	
	
if (isset($_GET["nom_du_producteur"])){$producteur = $con->real_escape_string(htmlspecialchars($_GET["nom_du_producteur"]));}
if (isset($_GET["description"])){$description = $con->real_escape_string(htmlspecialchars($_GET["description"]));}
if (isset($_GET["imgurl"])){$imgurl = $con->real_escape_string(htmlspecialchars($_GET["imgurl"]));}
if (isset($_GET["lat"])){$lat = $con->real_escape_string(htmlspecialchars($_GET["lat"]));}
if (isset($_GET["lgn"])){$lgn = $con->real_escape_string(htmlspecialchars($_GET["lgn"]));}




//selectionne infos producteur et image
$sql = "SELECT 
 P.description,
 P.site,
 P.lieu_dit,
 P.cp,
 P.ville,
 P.fixe,
 P.port,
 P.site,
 P.email,
 P.produits,
 P.horaires,
 I.nom_du_producteur,
 I.image_name1,
 I.path1,
 I.image_name2,
 I.path2,
 I.image_name3,
 I.path3
FROM PRODUCTEURS P
INNER JOIN  IMAGES I
ON (P.lat=I.lat AND P.lgn=I.lgn)
WHERE P.lat='$lat'
AND P.lgn='$lgn'";




	$result = mysqli_query($con ,$sql);
	
	
	while ($row = mysqli_fetch_assoc($result)) {
		
		$array[] = $row;
		
		?>
		
		<div id="first" class="first">
					
		<h1 id="nom_du_producteur"> <?php echo ($row['nom_du_producteur']); ?></h1>
		
		<img class="img_grande" id="img_grande" src=<?php echo ("https://".$row['path1']); ?>></img>		
		
		<div class="miniature">
		<img class="img_min" id="min_1" src=<?php echo ("https://".$row['path1']); ?> ></img>
		<img class="img_min" id="min_2" src=<?php echo ("https://".$row['path2']); ?>></img>
		<img class="img_min" id="min_3" src=<?php echo ("https://".$row['path3']); ?>></img>
		</div>

		<p class="p_desc" id="description"> <?php echo ($row['description']); ?></p>
		<p class="p_1" id="produits"> <?php echo ("<b>Produits : </b>".$row['produits']); ?></p>		
		<p class="p_1" id="horaires"> <?php echo ("<b>Horaires : </b>".$row['horaires']); ?></p>			
		<p class="p_1" id="adresse"> <?php echo ("<b>Adresse : </b>".$row['lieu_dit']." ".$row['cp']." ".$row['ville']); ?></p>

		<p class="p_1" id="fixe"> <?php echo ("<b>Téléphone fixe : </b>".$row['fixe']); ?></p>
		<p class="p_1" id="port"> <?php echo ("<b>Téléphone mobile : </b>".$row['port']); ?></p>
		<p class="p_1" id="email"> <?php echo ("<b>Adresse email : </b>".$row['email']); ?></p>
		<p class="p_1" id="site"> <?php echo ("<b>Adresse web : </b><a href=".$row['site'].">".$row['site']."</a>"); ?></p>


		<div class="link">
			<a class="button_1" id="deep_link" href="<?php echo "mangerlocal://producteur?lat=".$lat."&lgn=".$lgn ?>">Voir dans l'application</a>
		</div>
	
		<div class="link">
			<a class="button_1" id="telecharger" href="https://play.google.com/store/apps/details?id=com.manger__local.mangerlocal">Télécharger l'application</a>
			
		</div>
		</div>
		
			<script type="text/javascript"> </script>
	
		
		<?php
	}
	

	
	
	

 
    mysqli_free_result($result);


//ferme la connection
    mysqli_close($con);
  
 ?>
 

 <script type="text/javascript"> 
	
	$(document).ready(function() {
				 
				$("#min_1").click(
					function () {
						$("#img_grande").attr('src',$("#min_1").attr('src'));  
					}
				);



				$("#min_2").click(
					function () {
						$("#img_grande").attr('src',$("#min_2").attr('src'));  
					}
				);
				 
				 
				$("#min_3").click(
					function () {
						$("#img_grande").attr('src',$("#min_3").attr('src'));  
					}
				);
				 
		
			
			
			});
	
	 
</script>
</body>   		

</html>
