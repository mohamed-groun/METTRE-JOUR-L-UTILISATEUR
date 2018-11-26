<?php
require 'connexionPDO.php';

$cin=htmlentities($_POST['cin']);
$nom=htmlentities($_POST['nom']);
$prenom=htmlentities($_POST['prenom']);
$age=htmlentities($_POST['age']);



$cnxPDO = ConnexionPDO::getInstance();
$requete = "UPDATE `utilisateur` SET `Nom`=:nom,`Prenom`=:prenom,`Age`=:age WHERE `Cin`=:cin";
$req = $cnxPDO->prepare($requete);
$req->execute(
    array(
        'cin' => $cin,
        'nom' => $nom,
        'prenom' => $prenom,
        'age' => $age,
    )

);



header('location:cnxBD.php');
