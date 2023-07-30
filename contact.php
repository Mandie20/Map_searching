<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ProjetAMP_Samandina_Jerome/assets/css/Contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/95cecf452d3208890088a5b4c19c7ecf?family=Helvetica+Neue+ME" rel="stylesheet" type="text/css"/>
    <title>Contactez_Nos_agents</title>
</head>
<body>
    
<div class="contact-container">
    <div class="left-col">
        <ul>
            <li><a href="./Acceuil.php">Acceuil /</a></li>
            <li><a href="./a_propos.php">About /</a> </li>
            <li><a href="./register.php">Rechercher</a></li>
        </ul>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15130.276714718828!2d-72.3290745850101!3d18.548360941474343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb9e7f2be0262a7%3A0x8b67be75da6179c4!2sNazon%2C%20Port-au-Prince!5e0!3m2!1sfr!2sht!4v1654321157124!5m2!1sfr!2sht" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="right-col">
      <div class="theme-switch-wrapper">
        <label class="theme-switch" for="checkbox">
          <input type="checkbox" id="checkbox" />
          <div class="slider round"></div>
        </label>
        <div class="description">nocturne</div>
      </div>
  
      <h1>Contactez nous</h1>
      <p></p>
  
      <form id="contact-form" method="post" autocomplete="off">
        <label for="name">Nom Complet</label>
        <input type="text" id="name" name="name" placeholder="Votre nom complet" required>
        <label for="email">Adresse Email</label>
        <input type="email" id="email" name="email" placeholder="Votre email adresse" required>
        <label for="message">Message</label>
        <textarea rows="6" placeholder="Entrez votre Message" id="message" name="message" required></textarea>
        <!--<a href="javascript:void(0)">--><button type="submit" id="submit" name="submit">Envoyez</button>
        <!--</a>-->
  
      </form>
      <div id="error"></div>
      <div id="success-msg"></div>
    </div>
  </div>

  <script src="./assets/js/contact.js"></script>
</body>
</html>