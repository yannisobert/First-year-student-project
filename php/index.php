<!DOCTYPE html>
<html lang=fr> 
<head> <!--cette partie est utile pour mettre des bases en place-->
    <meta charset="utf-8"> <!--pour pouvoir les accents, utf-8 est fait pour tous les accents utilisés dans le français-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="../css/style.css" rel="stylesheet"> <!--link de la page css-->
    <link rel="preconnect" href="https://fonts.gstatic.com"> <!--link d'une font-->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <title>Team Solary Legue Of Legends</title><!--incrustation d'un titre dans l'onglet de la page-->
</head>

<body><!--toute cette partie sera ce qu'on verra sur la page du site-->
    
    <?php
        include('../inc/header.php'); //on insert l'header du site
    ?>
                        


    <div id="annonce">
        <div id="imageannonce"> <!--création d'un id pour incuster une image-->
            <a id="boutonannonce"href="shop.php"><button class="abc" >SHOP NOW</button></a> <!--bouton pour rediriger vers la page du shop/galerie-->
        </div>  
    </div>
    
    <div>
        <div id="slider"> <!--création de la zone slider-->
            <img src="../images/slider/slider_un.jpg" alt="images" id="slide"> <!--l'image de base dans le slider-->
            <div id="precedent" onclick="ChangeSlide(-1)"><</div> <!--bouton slider image gauche/précédent-->
            <div id="suivant" onclick="ChangeSlide(1)">></div> <!--bouton slider image droite/suivante-->
        </div>
    </div>  
    <?php
        include('../inc/footer_and_rs.php'); //on insert le footer du site
    ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script> <!--link JQuery-->
    <script src="../javascript/script.js"></script> <!--link page javascript-->

</body>

