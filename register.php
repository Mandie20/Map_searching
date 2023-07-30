<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once "./bdd.php";

    $addresses = null;

    if(isset($_POST['btsubmit'])){
        $addresses = strip_tags($_POST['txtAD']);

    if (!empty($_POST['txtAD'])) {
        $addresses = strip_tags(htmlspecialchars(htmlentities(trim($_POST['txtAD']))));
    } else {
        $erros['txtA'] = "L'addresse ne doit pas etre null";
    }

    $adresseParse = str_replace(" ", "+", $addresses);
    $adressQuery = $conn->prepare("SELECT * FROM addresse WHERE addresse_u=? OR  ville=? OR pays=? OR code_postal=?");
    $adressQuery->execute([$addresses, $addresses, $addresses, $addresses]);
    
    if ($adressQuery->rowCount() > 0) {
        $reload = true;
    } else {
        $errors = "Adresse Introuvable dans la basse de donnée";
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../ProjetAMP_Samandina_Jerome/assets/css/Style2.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet"> 
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<title>Ajouter</title>
</head>
<body>
	<div class="page-wrapper">
        <div class="nav-wrapper">
            <div class="grad-bar"></div>
            <div class="head">
                <a id="logo" href="./register.php">Sam's Reperage</a>
                
                <nav id="nav">
                    <button aria-label="Abrir Menu" id="hamburg" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
                        <span id="hamburg__icon"></span>
                    </button>
        
                    <ul id="menu" role="menu">
                        <li><a href="./Acceuil.php"><i class="uil uil-home"></i> Accueil</a></li>
                        <li><a href="./register.php"><i class="uil uil-search-alt"></i> Rechercher</a></li>
                        <li><a href="./a_propos.php"><i class="uil uil-info-circle"></i> A_Propos</a></li>
                        <li><a href="./contact.php"><i class="uil uil-envelope"></i> Contact</a></li>
                        <li><a href="./deconecter.php"><i class="uil uil-user"></i> Log out</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <section class="headline headline-Seach">
            <div class="formAuto">
                <h2>Executez vos recherches</h2>
                <form action="" name="formAuto" method="post" autocomplete="off">
                    <input id="motcle" type="text" name="txtAD" value="<?= isset($addresses) ? $addresses : '' ?>" placeholder="Entrez l'addresse complete...">
                    <input class="btfind" type="submit" name="btsubmit" value="Recherche">
                </form>
            </div>
        </section>

        <section class="features features-content">
            <div class="feature-container feature-container-content">
            <p style="color: F30;"><?= isset($errors) ? $errors : '' ?></p>
            <?php if (isset($reload)) : ?>
                <iframe class="iframeG" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDMXoJyL6TlggHntTEO-hG3SjXoozQwTmQ&q=<?= $addresses ?>">
                </iframe>
            <?php endif; ?>
            </div>
        </section>
    </div>

    <script src="./assets/js/NewJS.js"></script>
</body>
</html>