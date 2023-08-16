<?php
        session_start();
?>
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

 <!-- navbar avec les différents boutons  -->
    <div class="navbar">
        <img class="logo" src="img/logo.PNG" onclick="window.location.href = 'index.php';" alt="logo du site"/>
        <a href="index.php#differentplat" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Différents plats</a>
        <a href="index.php#apropos" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">A propos</a>
        <a href="index.php#contactancre" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Contact</a>

    </div>

    <!-- Formulaire pour se connecter en admin email : Admin mdp: abcd -->
    <form method="POST" action="" style="text-align:center"><br>
        <label for="email">Adresse mail</label>
        <input type="text" name="email"><br>
        <label for="mdp">Mote de passe</label>
        <input type="password" name="mdp"><br><br>
        <input class="btn btn-primary" type="submit" name="envoie" style="background-color:#D49817;border-color:#522A00;width: 140px">
    </form>


    <!-- lien avec la bdd pour effectuer la connexion de l'utilisateur -->
<?php
$bdd= new PDO('mysql:host=localhost;dbname=Pistache;charset=utf8','root','');
    if(isset($_POST['envoie'])){
        if(!empty($_POST['email']) AND !empty($_POST['mdp'])){
            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $recup = $bdd->prepare('SELECT * FROM user WHERE mail = ? AND mdp = ?');
            $recup->execute(array($email, $mdp));

            if($recup->rowCount() > 0){
                $_SESSION['email'] = $email;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['id'] = $recup->fetch()['id'];
                echo "bievenu";
                header('Location: administration.php');
            }else{
                echo "Votre adresse mail ou votre mot de passe est incorrect";
            }

        }else{
            echo "Veuillez compléter tout les  champs";
        }
    }


?>












    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>