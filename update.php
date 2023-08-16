<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pistache</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/css.css"/>
    <link rel="stylesheet" href="css/menu.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap" rel="stylesheet">
</head>
<body>
<div class="navbar">
        <img class="logo" src="img/logo.PNG" onclick="window.location.href = 'index.php';" alt="logo du site"/>
        <a href="index.php#differentplat" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Différents plats</a>
        <a href="index.php#apropos" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">A propos</a>
        <a href="index.php#contactancre" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Contact</a>
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



        //Permet d'afficher les boutons administration et deconnexion si on est connécté sinon on affiche le bouton connecté
        if(isset($_SESSION['mdp'])){

        ?> 
        <a onclick="window.location.href = 'administration.php';" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Administration</a>
            <a onclick="window.location.href = 'deconnexion.php';" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">se deconnecter</a>

        <?php
        }else{
            header("location:connexion.php");
        ?>    
        <a onclick="window.location.href = 'connexion.php';">Connexion</a>              
        <?php } ?>
    </div>



    <?php
    if(isset($_GET["IdUpdate"])){
        $idUpdate = $_GET["IdUpdate"];
        echo "<h1>Modifier le menu n°".$idUpdate."</h1>";
        ?>

        <!-- formulaire qui permet de modifier les données d'un menu  -->

<form action="" method="post" class="form formu" enctype="multipart/form-data">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Titre">Titre :</label>
                        <input id="Titre" type="text" required class="form-control" name="titre">
                        </div>
                        </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <input id="descr" type="text" required class="form-control" name="description">
                        </div>
                        </div>
                        <div class="col-sm-6">
                    <div class="form-group">
                        <label for="image">Image :</label>
                        <input type="file" name="file" class="form-control"/>
                        </div>
                        </div>

                        <div class="box">
                        <input type="checkbox" name="entree" value="Entrée">
                        <label>Entrée</label>
                        <input type="checkbox" name="plat" value="Plat">
                        <label>Plat</label>
                        <input type="checkbox" name="dessert" value="Dessert">
                        <label>Dessert</label>
                        <br>
                        <input type="checkbox" name="publier" value="publier">
                        <label>Publier</label>
                        <input type="checkbox" name="sauver" value="sauver">
                        <label>Sauver</label>
                        </div>
                        <br><br>



                        <?php
                        if(isset($_POST['envoyer'])){


                            //verifier les catégories
                            if(isset($_POST['entree'])){
                                $categorie=1;
                            }else{
                                
                            }
                            if(isset($_POST['plat'])){
                                $categorie=2;
                            }else{
                                
                            }
                            if(isset($_POST['dessert'])){
                                $categorie=3;
                            }else{
                                
                            }


                            $titre = $_POST['titre'];
                            $descr = $_POST['description'];

                            //Avoir la date en PHP lors de la connexion au formulaire
                            $annee = date("Y");
                            $mois = date("m");
                            $jour = date("d");
                            $Datex= '' .$jour. '/' .$mois. '/' .$annee.'';

                            //recuperer les images à mettre dans le dossier
                            if(isset($_FILES['file'])){
                            $tmpName = $_FILES['file']['tmp_name'];
                            $name = $_FILES['file']['name'];
                            $size = $_FILES['file']['size'];
                            $error = $_FILES['file']['error'];
                            $type = $_FILES['file']['type'];

                            $tabExtension = explode('.', $name);
                            $extension = strtolower(end($tabExtension));
                            //Tableau des extensions que l'on accepte
                            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                                if(in_array($extension, $extensions)){
                                    move_uploaded_file($tmpName, './web/'.$name);
                                }
                                else{
                                    echo "Mauvaise extension";
                                }

                            }
                        // oblige a l'utilisateur de choisir entre publier et sauver obligatoirement
                        if(isset($_POST['publier']) && isset($_POST['sauver'])){

                            $erreur= "Veuillez selectionner soit publier soit sauver";
                     
                        }else if(isset($_POST['publier'])){
                                $statut="publier";
                                $erreur="";
                                $sql = ("INSERT INTO `menu`(`titre`, `description`,`bin`,`date_crea`,`id_categorie`,`statut`) VALUES (?,?,?,?,?,?)");
                                $stmt = $conn->prepare($sql);
                                $stmt->execute(array($titre,$descr,$name,$Datex,$categorie,$statut));
                                header('location: menu.php');
                            }else if(isset($_POST['sauver'])){
                                $statut="sauver";
                                $erreur="";
                                $sql = ("INSERT INTO `menu`(`titre`, `description`,`bin`,`date_crea`,`id_categorie`,`statut`) VALUES (?,?,?,?,?,?)");
                                $stmt = $conn->prepare($sql);
                                $stmt->execute(array($titre,$descr,$name,$Datex,$categorie,$statut));
                                header('location: menu.php');
                            }else{
                                $erreur ="Veuillez choisir si vous souhaitez publier ou sauver votre menu";
                            
                    
                        }

                        echo "<p class='box'>". $erreur. "</p><br><br>";
       
                    }
                    ?>
                
                
                    <div class="form-group">
                        <button class="btn btn-primary" name="envoyer" style="margin-left:-300px">Envoyer</button>
                            </div>

</form>

<?php    
    }else{
        echo "Aucun Menu à modifier";
    }
?>





    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>