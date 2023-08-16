<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pistache</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/menu.css"/>
    <link rel="stylesheet" href="css/css.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap" rel="stylesheet">
</head>
<body>
     <!-- navbar avec les différents boutons  -->
     <div class="navbar">
        <img class="logo" src="img/logo.PNG" onclick="window.location.href = 'index.php';" alt="logo du site"/>
        <a href="index.php#differentplat" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Différents plats</a>
        <a href="index.php#apropos" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">A propos</a>
        <a href="index.php#contactancre" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Contact</a>
        <?php

        //Permet d'afficher les boutons administration et deconnexion si on est connécté sinon on affiche le bouton connecté
        if(isset($_SESSION['mdp'])){

        ?> 
        <a onclick="window.location.href = 'administration.php';" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Administration</a>
            <a onclick="window.location.href = 'deconnexion.php';" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">se deconnecter</a>

        <?php
        }else{
        ?>    
        <a onclick="window.location.href = 'connexion.php';">Connexion</a>              
        <?php } ?>
    </div>



<h1 class="titremenu">Nos Plats</h1>
<!-- boutons qui permet de trier les plats par catégorie -->
<form action="" method="post" class="form" enctype="multipart/form-data">
<div class="navbar">
<button class="btn btn-primary" name="tout" style="background-color:#D49817;border-color:#522A00;width: 140px">Tout les menus</button>
<button class="btn btn-primary" name="entree2" style="background-color:#D49817;border-color:#522A00;width: 140px">Entrée</button>
<button class="btn btn-primary" name="plat" style="background-color:#D49817;border-color:#522A00;width: 140px">Plat</button>
<button class="btn btn-primary" name="dessert" style="background-color:#D49817;border-color:#522A00;width: 140px">Dessert</button>

</div>
        </form>

<?php
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



?>

<?php
//Requete qui permet de lire les menus en fonction de la catégorie cliqué au chargement de la page tout les menus sont affichées
if(isset($_POST['entree2'])){


        $req = "SELECT * FROM menu ORDER BY id DESC";
        $RequetStatement = $conn->query($req);
        if($RequetStatement){
            ?>
            <div id="boxes">
                <?php
    
    
                while($Tab=$RequetStatement->fetch()){
                    if($Tab['statut']=="publier" && $Tab['id_categorie']=="1"){
                    ?>
                        <div id="column">
                            <img class="card-img-top" src="web/<?php echo $Tab['bin']?>" alt="image du plat" style="width:600px">
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $Tab['titre']?></h5><p><?php echo $Tab['date_crea']?></p>
                            <p class="card-text"><?php echo $Tab['description']?></p>
                            <!-- Permet d'afficher l'edition modifier ou supprimer si on est connecté -->
                            <?php if(isset($_SESSION['mdp'])){
                                ?> <br><a href="update.php?IdUpdate=<?php echo $Tab["id"]?>" class="btn btn-primary">Modifier</a> <a href="delete.php?IdDelete=<?php echo $Tab["id"]?>" class="btn btn-danger">Supprimer</a>
                                <?php
                            } ?>
                            </div>
                            <br>
                    <?php
                    }
                }
                ?>
    
                </div>
            <?php
        }
}else if(isset($_POST['plat'])){


    $req = "SELECT * FROM menu ORDER BY id DESC";
    $RequetStatement = $conn->query($req);
    if($RequetStatement){
        ?>
        <div id="boxes">
            <?php


            while($Tab=$RequetStatement->fetch()){
                if($Tab['statut']=="publier" && $Tab['id_categorie']=="2"){
                ?>
                    <div id="column">
                        <img class="card-img-top" src="web/<?php echo $Tab['bin']?>" alt="image du plat" style="width:600px">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $Tab['titre']?></h5><p><?php echo $Tab['date_crea']?></p>
                        <p class="card-text"><?php echo $Tab['description']?></p>
                        <!-- Permet d'afficher l'edition modifier ou supprimer si on est connecté -->
                        <?php if(isset($_SESSION['mdp'])){
                            ?> <br><a href="update.php?IdUpdate=<?php echo $Tab["id"]?>" class="btn btn-primary">Modifier</a> <a href="delete.php?IdDelete=<?php echo $Tab["id"]?>" class="btn btn-danger">Supprimer</a>
                            <?php
                        } ?>
                        </div>
                        <br>
                <?php
                }
            }
            ?>

            </div>
        <?php
    }
}else if(isset($_POST['dessert'])){


    $req = "SELECT * FROM menu ORDER BY id DESC";
    $RequetStatement = $conn->query($req);
    if($RequetStatement){
        ?>
        <div id="boxes">
            <?php


            while($Tab=$RequetStatement->fetch()){
                if($Tab['statut']=="publier" && $Tab['id_categorie']=="3"){
                ?>
                    <div id="column">
                        <img class="card-img-top" src="web/<?php echo $Tab['bin']?>" alt="image du plat" style="width:600px">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $Tab['titre']?></h5><p><?php echo $Tab['date_crea']?></p>
                        <p class="card-text"><?php echo $Tab['description']?></p>
                        <!-- Permet d'afficher l'edition modifier ou supprimer si on est connecté -->
                        <?php if(isset($_SESSION['mdp'])){
                            ?> <br><a href="update.php?IdUpdate=<?php echo $Tab["id"]?>" class="btn btn-primary">Modifier</a> <a href="delete.php?IdDelete=<?php echo $Tab["id"]?>" class="btn btn-danger">Supprimer</a>
                            <?php
                        } ?>
                        </div>
                        <br>
                <?php
                }
            }
            ?>

            </div>
        <?php
    }
}else if(isset($_POST['tout'])){
    $req = "SELECT * FROM menu ORDER BY id DESC";
    $RequetStatement = $conn->query($req);
    if($RequetStatement){
        ?>
        <div id="boxes">
            <?php


            while($Tab=$RequetStatement->fetch()){
                if($Tab['statut']=="publier"){
                ?>
                    <div id="column">
                        <img class="card-img-top" src="web/<?php echo $Tab['bin']?>" alt="Card image cap" style="width:600px">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $Tab['titre']?></h5><p><?php echo $Tab['date_crea']?></p>
                        <p class="card-text"><?php echo $Tab['description']?></p>
                        <!-- Permet d'afficher l'edition modifier ou supprimer si on est connecté -->
                        <?php if(isset($_SESSION['mdp'])){
                            ?> <br><a href="update.php?IdUpdate=<?php echo $Tab["id"]?>" class="btn btn-primary">Modifier</a> <a href="delete.php?IdDelete=<?php echo $Tab["id"]?>" class="btn btn-danger">Supprimer</a>
                            <?php
                        } ?>
                        </div>
                        <br>
                <?php
                }
            }
            ?>

            </div>
        <?php
    }
}else{
    $req = "SELECT * FROM menu ORDER BY id DESC";
    $RequetStatement = $conn->query($req);
    if($RequetStatement){
        ?>
        <div id="boxes">
            <?php


            while($Tab=$RequetStatement->fetch()){
                if($Tab['statut']=="publier"){
                ?>
                    <div id="column">
                        <img class="card-img-top" src="web/<?php echo $Tab['bin']?>" alt="image du plat" style="width:600px">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $Tab['titre']?></h5><p><?php echo $Tab['date_crea']?></p>
                        <p class="card-text"><?php echo $Tab['description']?></p>
                        <!-- Permet d'afficher l'edition modifier ou supprimer si on est connecté -->
                        <?php if(isset($_SESSION['mdp'])){
                            ?> <br><a href="update.php?IdUpdate=<?php echo $Tab["id"]?>" class="btn btn-primary">Modifier</a> <a href="delete.php?IdDelete=<?php echo $Tab["id"]?>" class="btn btn-danger">Supprimer</a>
                            <?php
                        } ?>
                        </div>
                        <br>
                <?php
                }
            }
            ?>

            </div>
        <?php
    }
}
?>






    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>