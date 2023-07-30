<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "./bdd.php";

    $addresse_u =null;
    $ville = null;
    $pays = null;
    $code_postal =null;
    $id_addresse =null;
    $data = null;

if (isset($_GET['id_addresse']) && $_GET['id_addresse'] > 0) {
    $id_addresse = (int) $_GET['id_addresse'];
    $aff = "SELECT * FROM addresse WHERE id_addresse=$id_addresse";
    $sql2 = $conn->query($aff);
    $data = $sql2->fetchObject();
} else {
    header("Location:./Acceuil.php");
}

if (isset($_POST['btmod'])) {
    echo 'Modification';

    $addresse_u = strip_tags(htmlspecialchars($_POST['addresse_u']));
    if(isset($_POST['addresse_u']) && !empty($_POST['addresse_u'])){
        $addresse_u = strip_tags(htmlspecialchars( trim($_POST['addresse_u'])));
    }else {
        $erros['txtA'] = "Veillez bien preciser l'addresse";
    }

    $ville = strip_tags( htmlspecialchars($_POST['ville']));
    if(isset($_POST['ville']) && !empty($_POST['ville'])){
        $ville = strip_tags(htmlspecialchars(trim($_POST['ville'])));
    }else {
        $erros['txtV'] = "Veillez bien preciser la ville";
    }

    $pays = strip_tags( htmlspecialchars ($_POST['pays']));
    if(isset($_POST['pays']) && !empty($_POST['pays'])){
        $pays = strip_tags(htmlspecialchars (trim($_POST['pays'])));
    }else {
        $erros['txtV'] = "Veillez bien preciser le pays";
    }

    $code_postal = strip_tags(htmlspecialchars($_POST['code_postal']));
    if(isset($_POST['code_postal']) && !empty($_POST['code_postal'])){
        $code_postal = strip_tags(htmlspecialchars( trim($_POST['code_postal'])));
    }else {
        $erros['txtC'] = "Veillez bien preciser le code postal";
    }

    $result = $conn->prepare("UPDATE addresse SET addresse_u=?,ville=?,pays=?, code_postal=? WHERE id_addresse= ?");
    $result->execute([$addresse_u, $ville, $pays, $code_postal, $id_addresse]);

    header("Location:./Acceuil.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ProjetAMP_Samandina_Jerome/assets/css/Style2.css">
    <title>Document</title>
</head>

<body>
    <div class="conteainer-BG">
    <div class="container pad">
        <form action="" name="formulaire form-padding" method="Post" class="formulaire" enctype="multipart/form-data">
            <h2 align="center">Mettre a jour l'addresse...</h2>

            <label><b>Identifiant</b></label>
            <input type="number" name="id_addresse" class="zonetext" value=<?= $data->id_addresse ?> readonly>

            <label for=""><b>Adresse</b></label>
            <input type="text" name="addresse_u" class="zonetext" placeholder="Modifier l'adresse" value=<?= $data->addresse_u ?> required>

            <label class="ville-position"><b>Ville</b></label>
            <input type="text" name="ville" class="zonetext" placeholder="Modifier la ville.." value=<?= $data->ville ?> required>

            <label for=""><b>Pays</b></label>
                <input type="text" name="pays" class="zonetext" placeholder="Modifier le pays" value=<?= $data->pays ?> required>

                <label for=""><b>Code Postal</b></label>
                    <input type="text" name="code_postal" class="zonetext" placeholder="Modifier le code postal " value=<?= $data->code_postal ?> required>

            <input type="submit" class="submit" name="btmod" value="Metre a jour">

            </label>
        </form>
    </div>
    </div>
</body>

</html>