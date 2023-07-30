<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once "./bdd.php";

    $add_a = null;
    $add_v = null;
    $add_p = null;
    $add_cod = null;
    $message = null;

if (isset($_POST['btADD'])) {
    $add_a = strip_tags(htmlspecialchars($_POST['txtAD']));

    if (isset($_POST['txtAD']) && !empty($_POST['txtAD'])) {
        $add_a = strip_tags(htmlspecialchars(htmlentities(trim($_POST['txtAD']))));
    } else {
        $erros['txtA'] = "username invalide";
    }


    if(isset($_POST['txtVIL']) && !empty($_POST['txtVIL'])){
        $add_v = strip_tags(htmlspecialchars(htmlentities(trim($_POST['txtVIL']))));
    } else {
        $erros['txtv'] = "Ville invalide";
    }

    if(isset($_POST['txtPay']) && !empty($_POST['txtPay'])){
        $add_p = strip_tags(htmlspecialchars(htmlentities(trim($_POST['txtPay']))));
    } else {
        $erros['txtP'] = "Pays invalide";
    }

    if(isset($_POST['txtcode']) && !empty($_POST['txtcode'])){
        $add_cod = strip_tags(htmlspecialchars(htmlentities(trim($_POST['txtcode']))));
    } else {
        $erros['txtCD'] = "Code postal invalide";
    }

    if (!isset($errors)) {
        $reqADD = "INSERT INTO addresse (addresse_u , ville, pays, code_postal) values (?, ?, ?, ?)";

        $resultat = $conn->prepare($reqADD)->execute([$add_a, $add_v, $add_p, $add_cod]);
        $message= "Enregistrement reussit";
    } else {
        $errors = "Echec de l'insertion de donnees";
    }

    @header("Location:./Acceuil.php?name="+$message);
}
?>

<?php 
    $result_s=$conn->query("SELECT * FROM addresse");
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
    <title>SAM'S Reperage</title>
</head>

<body>
    <div class="page-wrapper">
        <div class="nav-wrapper">
            <div class="grad-bar"></div>
            <div class="head">
                <a id="logo" href="./Acceuil.php">Sam's Reperage</a>

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

        <section class="headline">
            <h1 style=" width:100%; position:absolute; top: 80px; text-align:center; color:#000; font-family: italic;"> B<i class="uil uil-map-pin"></i>envenue </h1>
            <div class="container">
                <form name="formADD" method="post" class="formulaire" action="">
                    <h2 align="center">Ajouter une adresse</h2>
                    <div class="container_content-label">
                        <div class="content_label">
                            <label for=""><b>Adresse</b></label>
                            <input type="text" name="txtAD" class="zonetext" placeholder="Entrer l'adresse" required>
                        </div>

                        <div class="content_label">
                            <label for=""><b>Ville</b></label>
                            <input type="text" name="txtVIL" class="zonetext" placeholder="Entrer la vile" required>
                        </div>
                    </div>

                    <div class="container_content-label">
                        <div class="content_label">
                            <label for=""><b>Pays</b></label>
                            <input type="text" name="txtPay" class="zonetext" placeholder="Entrer le pays" required>
                        </div>

                        <div class="content_label">
                            <label for=""><b>Code Postal</b></label>
                            <input type="text" name="txtcode" class="zonetext" placeholder="Enter le code postal " required>
                        </div>
                    </div>

                    <div class="content-submit">
                        <input type="submit" name="btADD" value="Ajouter" class="submit">
                    </div>
                    <span style="color: F30; width:100%; text-align:center;"><?=isset($message) ? $message: '' ?></span>
                    <span style="color: F30; width:100%; text-align:center;"><?= isset($errors) ? $errors : '' ?></span> 
                </form>
            </div>
        </section>

        <section class="features">
            <div class="feature-container second__container">
                <div class="formulaire formul-col">
                    <table class="tab">
                        <tr>
                            <th class="color_sible visible">reference</th>
                            <th class="sible">Addresse</th>
                            <th class="color_sible">Ville</th>
                            <th class="sible">Pays</th>
                            <th class="color_sible">Code postal</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <?php while($data=$result_s->fetchObject()): ?>
                            <tr>
                                <td class="color_sible visible"><?=$data->id_addresse?></</td>
                                <td><?=$data->addresse_u?></td>
                                <td class="color_sible"><?=$data->ville?></td>
                                <td><?=$data->pays?></td>
                                <td class="color_sible"><?=$data->code_postal?></td>
                                <td id="ligne">
                                    <a class="icon_conf color1" href=<?='./modifier.php?id_addresse='.$data->id_addresse?>><i class="uil uil-edit-alt"></i></a>
                                </td>
                                <td id="ligne">
                                    <a class="icon_conf color2" href=<?='./supprimer.php?id_addresse='.$data->id_addresse?>><i class="uil uil-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <script src="./assets/js/NewJS.js"></script>
</body>

</html>