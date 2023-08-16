<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pistache</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/css.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <img class="logo" src="img/logo.PNG" onclick="window.location.href = 'index.php';" alt="logo du site"/>


        <a href="deconnexion.php" style="position:absolute;margin-left:1150px;margin-bottom:80px;" onclick="window.location.href = 'deconnexion.php';">se deconnecter</a>
        <!-- <div class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Menu de saison</div> -->
        <a href="#differentplat" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Différents plats</a>
        <a href="#apropos" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">A propos</a>
        <a href="#contactancre" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Contact</a>

    </div>


    <?php
    if(isset($_GET["IdPublier"])){
        $idPublier = $_GET["IdPublier"];
        echo "<h1>Suppresion du menu n°".$idPublier."</h1>";
        ?>


<?php    
    }else{
        echo "Aucun Menu à modifier";
    }


$servername="localhost";
$username="root";
$password="";
$dbname="pistache";

//Connexion à la base de donnéé 

try{
    $conn= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
    echo "la connexion a échoué" . $e->getMessage();
}

$stat = "publier";
// requete dans la bdd qui change le statut de sauvé à publié
$sql = ("UPDATE `menu` SET `statut`=? WHERE id = '".$idPublier."'");
$stmt = $conn->prepare($sql);
$stmt->execute(array($stat));
header("location: menu.php");



?>





    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>