<!DOCTYPE html>
<html lang=fr>
<head> <!--cette partie est utile pour mettre des bases en place-->
    <meta charset="utf-8"> <!--pour pouvoir les accents, utf-8 est fait pour tous les accents utilisés dans le français-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <title>TeamSolary Lol Events</title> <!--incrustation d'un titre dans l'onglet de la page-->
</head>


<body>
    
    <?php
        include('../inc/header.php'); //on insert l'header du site
    ?>
    
    <div class="parallaxun"> <!--première image de fond pour réaliser un effet parallax en css-->
    </div>

    <div> <!--création d'une partie textuelle-->
        <h2 class="titletitre">The beginning of Solary :</h2><br> <!--titre-->
        <div id="colonne">
            <div id="un"> <!--première colonne pour du texte-->
                Solary is above all the story of 8 young people who arrive in Tours with a passion for Esport, Gaming and an inordinate ambition: to become the first French WebTV. Freshly released by their previous employer, these new entrepreneurs had 3 weeks to create the administrative structure of Solary, recruit their first employees and fit out themselves 350 m² of studio.

                Suffice to say that it was a bit sporty, especially when you want to fend for yourself. Because this is the real tour de force of the Solary collective: no investor, no fundraising, Solary is independent and financed with own funds. The 8 founders (Melon, LRB, Jbzz, Chap, Amaury, Taipouz, Caelan, Wakz quickly joined by Narkuss) are all shareholders and cover 100% of the company's capital.

                Solary imposes her creativity and her energy: fight in sumo attire, play on a treadmill, participate in all the LoL competitions in France and Navarre, nothing scares them and the public always responds.

                However, a founding project was missing, something crazy enough to make an impression and suddenly no one was ready for the announcement made in early January 2018.
            </div>
            <div id="deux"> <!--seconde colonne pour du texte-->
                Solary is launching the project to train in Korea as do all the best teams in the world, except that Solary will move all of its TV (15 people) there to broadcast everything as they do from Tours. The colossal budget is difficult to make ends meet, but Solary who has confidence in the support of her community is organizing a crowdfunding.

                Solary is launching the project to train in Korea as do all the best teams in the world, except that Solary will move all of its TV (15 people) there to broadcast everything as they do from Tours. The colossal budget is difficult to make ends meet, but Solary who has confidence in the support of her community is organizing a crowdfunding.

                Solary is launching the project to train in Korea as do all the best teams in the world, except that Solary will move all of its TV (15 people) there to broadcast everything as they do from Tours. The colossal budget is difficult to make ends meet, but Solary who has confidence in the support of her community is organizing a crowdfunding.

            </div>
        </div>
    </div>
    <div class="parallaxdeux"></div> <!--seconde image de fond pour réaliser un effet parallax en css-->

    <div id="last-annonce"> <!--création d'une partie vidéo-->
        <div>
            <h1 class="titletitre">Here is the latest SolaryProd!</h1> <!--titrre de la vidéo-->
            <video id="video" src="https://www.youtube.com/watch?v=HzSriVv5xkQ" controls> <!--incrusation d'une vidéo-->
            </video>
        </div>
    </div>

    <?php
        include('../inc/footer_and_rs.php');  //on insert le footer du site
    ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!--link JQuery-->
    <script src="../javascript/script.js"></script> <!--link page javascript-->

</body>




