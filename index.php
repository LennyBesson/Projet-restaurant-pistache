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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap" rel="stylesheet">
</head>
<body>
    <!-- navbar avec les différents boutons  -->
    <div class="navbar">
        <img class="logo" src="img/logo.PNG" onclick="window.location.href = 'index.php';" alt="logo du site"/>
        <a href="#differentplat" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Différents plats</a>
        <a href="#apropos" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">A propos</a>
        <a href="#contactancre" class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 140px">Contact</a>
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
    
    <div>
        <img class="hero" src="img/hero.png" alt="image hero d'un plat franco-méditerranéen"/>
        <h1 id="titre">Cuisine franco-méditerranéenne</h1>
    </div>




<!-- Text a propos -->
    <div id="apropos" class="propos"><br>
        <h2>A propos de nous</h1><br>
        Au restaurant Pistache, vous pourrez déguster des plats raffinés issus de la cuisine
        franco-méditerranéenne. Passion et dévouement sont nos leitmotivs. Venir chez nous c’est
        l’assurance de découvrir une expérience culinaire hors du commun.<br><br>

        La cuisine franco-méditerranéenne allie les saveurs françaises et méditerranéennes. Elle se caractérise par l'utilisation d'herbes aromatiques, de légumes frais,
         de fruits de mer et d'huile d'olive. Des plats emblématiques tels que la bouillabaisse, la ratatouille et la salade niçoise en font partie. Les desserts comprennent
          la tarte Tatin, les crêpes au citron, les clafoutis et les madeleines. Cette cuisine offre une explosion de saveurs méditerranéennes dans une ambiance conviviale.
    </div>



<!-- les differents plats de presentation avec bouton qui mène à la page des menus -->
    <div class="card-group inspiration" id="differentplat">
  <div class="card">
    <img class="card-img-top plat" src="img/plat1.jpg" alt="plat Aubergines farcies ">
    <div class="card-body">
      <h5 class="card-title">Aubergines farcies</h5>
      <p class="card-text">Des aubergines sont évidées et remplies d'une farce savoureuse à base de viande hachée, d'oignons, d'ail, de tomates et d'herbes, puis cuites au four.</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top plat" src="img/plat3.jpg" alt="plat Côte de bœuf à la bordelaise">
    <div class="card-body">
      <h5 class="card-title">Côte de bœuf à la bordelaise</h5>
      <p class="card-text">Une côte de bœuf grillée ou rôtie, accompagnée d'une sauce bordelaise riche à base de vin rouge, d'échalotes et d'herbes aromatiques.</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top plat" src="img/plat2.jpg" alt="plat Tian d'aubergines">
    <div class="card-body">
      <h5 class="card-title">Tian d'aubergines</h5>
      <p class="card-text">Un plat français de Provence, similaire à la version méditerranéenne. Les aubergines sont tranchées et cuites avec des tomates, des oignons, de l'ail et des herbes, puis gratinées au four.</p>
      <div class="btn btn-primary" style="background-color:#D49817;border-color:#522A00;width: 160px" onclick="window.location.href = 'menu.php';">Menu de saison -></div>

    </div>
  </div>
</div>



<!-- Page de contact avec lien google map -->
<section class="mb-4 contactPage" id="contactancre">
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contacter nous</h2>
    <p class="text-center w-responsive mx-auto mb-5">
Avez-vous des questions? N'hésitez pas à nous contacter directement. Notre équipe reviendra vers vous dans les plus brefs délais pour vous aider.</p>

<p>Téléphone : +32 0499 55 55 555</p>
<p>Email : pistache@hotmail.com</p>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2530.5791956254675!2d5.550355076459652!3d50.63493357406365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c0fa23d5428f09%3A0xb2d67cd8c42ca291!2sCentre%20IFAPME%20de%20Li%C3%A8ge%20(Lige-Huy-Verviers)!5e0!3m2!1sfr!2sfr!4v1687845621586!5m2!1sfr!2sfr" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>



</section>



    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>