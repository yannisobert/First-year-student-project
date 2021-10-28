<!DOCTYPE html>
<html lang=fr>
<head>
    <meta charset="utf-8"> <!--cette partie est utile pour mettre des bases en place-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet"> <!--link de la page css-->
    <link rel="preconnect" href="https://fonts.gstatic.com"> <!--link d'une font-->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <title>TeamSolary Lol Team</title> <!--incrustation d'un titre dans l'onglet de la page-->
</head>


<body>
    
    <?php
        include('../inc/header.php'); //on insert l'header du site
    ?>
    <div id="margetopteamlist"> <!--marge-->
    </div>
    <div class="colonneequipe"> <!--mise en place de différentes colonnes pour faciliter entre autre le responsive-->
        <div class="unequipe">
            <figure class="transitioncitation"> <!--class pour créer la transition css qui affichera sur l'image une citation ou une phrase marquante du joueur-->
                <img src="../images/team/fraid.jpg" alt="imagejoueur"> <!--photo du joueur-->
                <figcaption>
                    <h3>"mon nom résonnera dans votre tête"</h3> <!--citation qui apparait lorsqu'on passe la souris sur l'image-->
                </figcaption>
            </figure>
            <p class="paraun">Frédéric Simonet aka "FRAID" <br>âge : 25 ans <br> Twitter : <a href="https://twitter.com/Fraid_LoL" target="_blank">@Fraid_LoL</a><br>Rôle : Toplaner</p> <!--information du joueur-->
        </div>

        <div class="deuxequipe"> 
            <figure class="transitioncitation">
                <img src="../images/team/manaty.jpg" alt="imagejoueur">
                <figcaption>
                    <h3>"Rejoins l’équipe fine, la MANATEAM"</h3>
                </figcaption>
            </figure>
            <p class="paradeux">Stéphane Dimier aka "MANATY" <br>âge : 18 ans <br> Twitter : <a href="https://twitter.com/Manaty_LoL" target="_blank">@Manaty_LoL</a><br>Rôle : Jungler</p>
        </div>
    </div>

    <div class="colonneequipe">
        <div class="unequipe">
            <figure class="transitioncitation">
                <img src="../images/team/tonerre.jpg" alt="imagejoueur">
                <figcaption>
                    <h3>"Cette année, la LFL est déjà à nous."</h3>
                </figcaption>
            </figure>
            <p class="paratrois">Scott wMenard aka "TONERRE" <br>âge : 22 ans <br> Twitter : <a href="https://twitter.com/Tonerre_lol" target="_blank">@Tonerre_lol
            </a><br>Rôle : Jungler</p>
        </div>

        <div class="deuxequipe">
            <figure class="transitioncitation">
                <img src="../images/team/dreamsu.jpg" alt="imagejoueur">
                <figcaption>
                    <h3>"En face de moi, que des bots."</h3>
                </figcaption>
            </figure>
            <p class="paraquatre">Joffrey Livet aka "DREAMSU" <br>âge : 23 ans <br> Twitter : <a href="https://twitter.com/dreamsuwya" target="_blank">@dreamsuwya
            </a><br>Rôle : Botlaner</p>
        </div>
    </div>

    <div class="colonneequipe">
        <div class="unequipe">
            <figure class="transitioncitation">
                <img src="../images/team/hantera.jpg" alt="imagejoueur">
                <figcaption>
                    <h3>"Yo c'est hantera."</h3>
                </figcaption>
            </figure>
            <p class="paracinq">Jules Bourgeois aka "HANTERA" <br>âge : 21 ans <br> Twitter : <a href="https://twitter.com/Hanteralol" target="_blank">@Hanteralol
            </a><br>Rôle : Support</p>
        </div>
    </div>

    <?php
        include('../inc/footer_and_rs.php'); //on insert le footer du site
    ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script> <!--link JQuery-->
    <script src="../javascript/script.js"></script> <!--link page javascript-->

</body>
