

<?php
require 'connexionPDO.php';


$cnxPDO = ConnexionPDO::getInstance();



if (isset($_POST['cinToUpload'])) {


    $cin = $_POST['cinToUpload'];


    $requete = 'SELECT * FROM `utilisateur` WHERE `utilisateur`.`Cin` = '.$cin;

    $reponse = $cnxPDO->query($requete);

    $personnes = ($reponse->fetchAll(PDO::FETCH_OBJ));


$x=0;
foreach ($personnes as $personne) {
    if (($personne->Cin == $cin) || ($cin!="")) {
        $x++;
    }
}
if ($x!=0) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
                  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
                  crossorigin="anonymous">
            <meta charset="UTF-8">
            <title>Ajout </title>
        </head>
        <body class="container">
        <form method="post" action="uploiding.php">
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
                foreach ($personnes

                as $personne)
                {
                ?>
                <tr>
                    <td><input value="<?= $personne->Cin ?>" name="cin"></td>
                    <td><input value="<?= $personne->Nom ?>" name="nom"></td>
                    <td><input value="<?= $personne->Prenom ?>" name="prenom"></td>
                    <td><input value="<?= $personne->Age ?>" name="age"></td>

                    <?php
                    }

                    ?>

                </tr>

            </table>
            <input type="submit" class="btn btn-primary" name="upload" value="MISE A JOUR">
        </form>
        </body>

        </html>
    <?php }
      else  echo ( " <b>  CIN INTROUVABLE</b>") ;
}


    ?>