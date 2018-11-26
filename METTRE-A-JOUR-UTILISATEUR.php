<?php

require 'connexionPDO.php';


$cnxPDO = ConnexionPDO::getInstance();
$requete = "Select * from utilisateur";
$reponse = $cnxPDO->query($requete);
$personnes=($reponse->fetchAll(PDO::FETCH_OBJ));

?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title> upload</title>
</head>
<body class="container">
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">CIN</th>
        <th scope="col">NOM</th>
        <th scope="col">PRENOM</th>
        <th scope="col">AGE</th>


    </tr>
    </thead>
    </thead>
    <?php
    foreach ($personnes as $personne)
    {
    ?>
    <tr>
        <td> <?= $personne->Cin ?></td>
        <td> <?= $personne->Nom ?></td>
        <td> <?= $personne->Prenom ?></td>
        <td> <?= $personne->Age ?></td>

        <?php
        }

        ?>

    </tr>

</table>
<form action="formulaire-upload.php" method="post">
    <b>CIN TO UPDATE</b> <input type="number" name="cinToUpload" min="1"  max="9999" required>
<input type="submit"  class="btn btn-primary" name="upload" value="MISE A JOUR">
</form>

</body>
</html>