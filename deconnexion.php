<?php
// Permet de detruire les session afin de se deconnecter
session_start();
$_SESSION = array();
session_destroy();
header('Location: connexion.php')

?>