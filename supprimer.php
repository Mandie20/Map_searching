<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once "./bdd.php";

$error_Sup =null;
$error_NonSup = null;

    if(isset($_GET['id_addresse'])){
        $sup = $_GET['id_addresse'];
        $reqDLT = "DELETE FROM addresse where id_addresse=$sup";
        $resultat = $conn->query($reqDLT);
    }
    $affiche = "On vous signal que cette adresse sera supprimer definitivement!";
        echo "<script type='text/javascript'>alert('$affiche');</script>";

    if($resultat)
            {
                $error_Sup = "Suppression effectuee...";
            }else {
                $error_NonSup = "Suppression echouee...";
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ProjetAMP_Samandina_Jerome/assets/css/Style2.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <form name="formdel" class=formulaire action="">
            <label style='text-align: center; color: #960406; margin-bottom:10px;'><?= $error_Sup ?></label>
            <label style='text-align: center; color: #960406; margin-bottom:10px;'><?= $error_NonSup ?></label>
            <p><a style="text-decoration: none;" href="./Acceuil.php" class="submit"><i class="uil uil-arrow-left"></i> Retour</a></p>
        </form>
</div>
</body>
</html>