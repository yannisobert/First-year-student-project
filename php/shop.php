<!DOCTYPE html>
<html lang=fr>
<head> <!--cette partie est utile pour mettre des bases en place-->
    <meta charset="utf-8"> <!--pour pouvoir les accents, utf-8 est fait pour tous les accents utilisés dans le français-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet"> <!--link de la page css-->
    <link rel="preconnect" href="https://fonts.gstatic.com"> <!--link d'une font-->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <title>Shop</title> <!--incrustation d'un titre dans l'onglet de la page-->
</head>

<body> <!--toute cette partie sera ce qu'on verra sur la page du site-->
    
    <?php
        include('../inc/header.php'); //on inclue le header
    ?>

    <div>
        <div id="boutonfiltre">
            <button class="btn bouton" onclick="filterSelection('all')"> Show all</button> <!--bouton pour tout voir lorsqu'on clique dessus lancement du js-->
            <button class="btn bouton" onclick="filterSelection('shirts')"> Shirts</button><!--bouton pour voir les t-shirts lorsqu'on clique dessus lancement du js-->
            <button class="btn bouton" onclick="filterSelection('jackets')"> Jackets</button> <!--bouton pour voir les vestes lorsqu'on clique dessus lancement du js-->
        </div>
    </div>

    <div class="ligneun"> <!--création de la première ligne de t-shirt-->
        <img src="../images/shop/maillot1.png" class="filterDiv shirts petite" alt="imageshirt">  <!--création de plusieurs class pour le système de filtre et l'effet de Lightbox-->
        <img src="../images/shop/maillot2.png" class="filterDiv shirts petite" alt="imageshirt">
        <img src="../images/shop/maillot3.png" class="filterDiv shirts petite" alt="imageshirt">
        
    </div>
    <div id="lignedeux">
        <img src="../images/shop/maillot4.png" class="filterDiv shirts petite" alt="imageshirt">
        <img src="../images/shop/maillot5.png" class="filterDiv shirts petite" alt="imageshirt">
        <img src="../images/shop/maillot6.png" class="filterDiv jackets petite" alt="imagejacket">
        <div class="grande"></div> <!--la class "grande" pour fait apparaitre l'image cliqué en grand (Lightbox)-->
    </div>

    <div class="imagesmoreno">
        <div class="ligneun">
            <img src="../images/shop/dos1.png" class="filterDiv shirts petite" alt="imageshirt">
            <img src="../images/shop/dos2.png" class="filterDiv shirts petite" alt="imageshirt">
            <img src="../images/shop/dos3.png" class="filterDiv shirts petite" alt="imageshirt">
        </div> 
        <button id="boutonseeless" class="bouton">See Less</button> 
        <div class="imagesmorenodeux">
            <section id="lignedeux">
                <img src="../images/shop/dos4.png" class="filterDiv shirts petite" alt="imageshirt">
                <img src="../images/shop/dos5.png" class="filterDiv shirts petite" alt="imageshirt">
                <img src="../images/shop/dos6.png" class="filterDiv jackets petite" alt="imagejacket">
            </section>  
            <button id="boutonseelessdeux" class="bouton">See Less</button> <!--bouton pour voir moins d'article-->
        </div>
        <button id="boutonseedeux" class="bouton">See More</button>
    </div>
    <button id="boutonsee" class="bouton">See More</button> <!--bouton pour voir plus d'artice-->
    <!-- Formulaire  -->

    <form class="wrapper" method="post"> <!--création d'un form pour poster des messages par rapport au shop-->
        <input type="text" name="pseudo" placeholder="Pseudo"> <!--Ligne pour insérer un nom-->
        <textarea id="messageshop" name="message" placeholder="message" cols="30" rows="10"></textarea> <!--Ligne pour insérer un message-->
        <input class="bouton" type="submit" value="Poster"> <!--lorsqu'on clique dessus le message s'envoie avec le nom-->
    </form>

    <?php
        // connexion à la bdd 
        include('../inc/connect.php');
        //Si le formulaire a été posté :
        if ($_POST)
        {
            //J'envoie les infos dans la base de données :
            $pdo->exec("INSERT INTO commentaire (pseudo, message, date_heure_message) VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())");
            
            $_POST['pseudo'] = addslashes($_POST['pseudo']);
            $_POST['message'] = addslashes($_POST['message']);  
        }

        $display = $pdo->prepare('SELECT * FROM commentaire ORDER BY date_heure_message DESC');
        $display->execute();

        $comment_list = $display->fetchAll(PDO::FETCH_ASSOC);  
    ?>

    <?php foreach($comment_list as $l) { ?> <!--cette partie va servir à faire apparaitre tous les commentaires à la suite-->
        
        <div class="wrapper">
            <p class="nom">Pseudo : <?= $l['pseudo']; ?></p>
            <p class="commentaire">Message : <?php
                    $mots = $pdo->query('SELECT mot FROM filtre'); //on récupère les informations des mots filtrés
                    $mots = $mots->fetchAll(PDO::FETCH_COLUMN);
 
                    $rp = $pdo->query('SELECT rp FROM filtre'); //ces deux lignes servent à filtrer les mots bannis
                    $rp = $rp->fetchAll(PDO::FETCH_COLUMN);
 
                    $l['message'] = str_replace($mots, $rp, strtolower($l['message'])); //on remplace les mots bannis par ces mots corrigés
                    $l['message'] = ucfirst($l['message']);
                ?>
                <?= $l['message']; ?></p>
            <p>Date : <?= $l['date_heure_message']; ?></p> <!--on affiche la date et l'heure à laquel est posté le message-->
        </div>
    <?php } ?>

    <?php
        include('../inc/footer_and_rs.php'); //on inclue le footer
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!--link JQuery-->
    <script src="../javascript/script.js"></script> <!--link page javascript-->


</body>


