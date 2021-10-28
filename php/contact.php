<?php
    include('../inc/connect.php'); // connexion à la bdd 
?>
<!DOCTYPE html>
<html lang=fr>
<head> <!--cette partie est utile pour mettre des bases en place-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <title>Contact</title><!--incrustation d'un titre dans l'onglet de la page-->
</head>


<body> <!--toute cette partie sera ce qu'on verra sur la page du site-->
    
    <?php
        include('../inc/header.php'); //on insert l'header du site
    ?>

    <div class="parallax">
        <img id="img-para" src="../images/fonds/fonddeux.jpg" alt="aaaaa"> <!--image pour l'effet parallax en JS-->
    </div>



    <div id="contact"> <!--zone où on retrouvera la zone de contact-->
        <div class="wrapper" >
            <h3>Contact us</h3>
            <p>Do not hesitate to send us a<br>message if you have any question !</p>
            <form class="registration" id="registration" method="post">
                <label>Name/Surname</label><br>
                <input name="pseudo" type="text" placeholder="Your Name/Surname" class="nom" /> <br>
                <p class="erreur-nom"></p>

                <label>Mail address</label><br>
                <input name="mail" type="email" placeholder="Your adresse mail" class="email" /><br>
                <p class="erreur-email"></p>

                <label>Your text</label>
                <textarea name="message" placeholder="Your text here" class="texte"></textarea><br>
                <p class="erreur-texte"></p>
  

            <button class="boutonsend bouton">Send</button> <!--bouton pour envoyer le mesage-->


            </form>

        </div>
    </div> 
    <?php
        //Si le formulaire a été posté :
        if ($_POST)
        {
            //J'envoie les infos dans la base de données :
            $pdo->exec("INSERT INTO contact (pseudo, mail, message) VALUES ('$_POST[pseudo]', '$_POST[mail]', '$_POST[message]')");
            
            $_POST['pseudo'] = addslashes($_POST['pseudo']);  
            $_POST['mail'] = addslashes($_POST['mail']); 
            $_POST['message'] = addslashes($_POST['message']);   
        }
        $display = $pdo->prepare('SELECT * FROM contact');
        $display->execute();

        $contact_list = $display->fetchAll(PDO::FETCH_ASSOC);  
    
    ?>
    <?php
        include('../inc/footer_and_rs.php'); //on insert le footer du site
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!--link JQuery-->
    <script src="../javascript/script_contact.js"></script> <!--link page javascript-->

</body>



