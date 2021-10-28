<?php 
include('../../../inc/connect.php');
include('../../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Commentaires</title>
	<link rel="stylesheet" type="text/css" href="../../../css/admin_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
</head>
<body>
        <div class="wrapper">
            <h1>Admin Commentaire</h1>   
            <ul><!--liste pour le menu-->
                <li><a href="../home.php">Home Admin</a></li>
                <li><a href="commentaires.php">Commentaires</a></li>
                <li><a href="membres.php">Membres</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="article.php">Article</a></li>
            </ul>
        </div>

    <div id="margecommentaires">
    </div>
    <!--code pour pouvoir voir et supprimer des commentaires-->
	<?php
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

	<!--code pour pouvoir voir et supprimer des commentaires-->
    <?php foreach($comment_list as $l) { ?>
        
        <div class="wrapper">
            <p class="nom">Pseudo : <?= $l['pseudo']; ?></p>
            <p class="commentaire">Message : <?php
                    $mots = $pdo->query('SELECT mot FROM filtre');
                    $mots = $mots->fetchAll(PDO::FETCH_COLUMN);
 
                    $rp = $pdo->query('SELECT rp FROM filtre');
                    $rp = $rp->fetchAll(PDO::FETCH_COLUMN);
 
                    $l['message'] = str_replace($mots, $rp, strtolower($l['message']));
                    $l['message'] = ucfirst($l['message']);
                ?>
                <?= $l['message']; ?></p>
            <p class="date">Date et heure: <?= $l['date_heure_message']; ?></p>
            <a id="bouton" href="delete.php?id=<?= $l['id_commentaire']; ?>">SUPPRIMER</a>
        </div>
    <?php } ?>

    <a id="bouton" href="../../blog.php">Aller sur le site</a>

	<footer>
   		<div class="wrapper">
    	    <h1>Solary</h1>
        	<div class="copyright">Copyright <?php echo date('Y'); ?> © All rights reserved.</div>
    	</div>
	</footer>
	
</body>
</html>