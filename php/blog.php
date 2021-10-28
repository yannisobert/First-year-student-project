
<?php //on ajoute les liens des pages php
	include('../inc/connect.php'); 
	include('functions.php');
	if (!isLoggedIn())
	{
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html lang=fr>
<head> <!--cette partie est utile pour mettre des bases en place-->
    <meta charset="utf-8"> <!--pour pouvoir les accents, utf-8 est fait pour tous les accents utilisés dans le français-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet"> <!--link de la page css-->
    <link rel="preconnect" href="https://fonts.gstatic.com"> <!--link d'une font-->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <title>TeamSolary Lol Blog</title><!--incrustation d'un titre dans l'onglet de la page-->
</head>


<body><!--toute cette partie sera ce qu'on verra sur la page du site-->

    <?php
        include('../inc/header.php'); //on insert l'header du site
    ?>

<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!--informations sur l'utilisateur connecté-->
		<div class="profile_info">
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="admin/home.php" style="color: red;">Logout</a>
					</small>
				<?php endif ?>
			</div>
		</div>
	</div>
	<?php

		if ($_POST) //si l'article a été posté 
		{
			$pdo->exec("INSERT INTO article (titre_article, contenu_article, urlimage) VALUES ('$_POST[titre_article]', '$_POST[contenu_article]', '$_POST[urlimage]')");
	 
			$_POST['titre_article'] = addslashes($_POST['titre_article']); 
			$_POST['contenu_article'] = addslashes($_POST['contenu_article']); 
			$_POST['urlimage'] = addslashes($_POST['urlimage']); 
		}

		
		
		$display = $pdo->prepare('SELECT * FROM article'); //on récupère les articles dans la base de donnée
		$display->execute();

		$article_list = $display->fetchAll(PDO::FETCH_ASSOC);  
	?>
	<?php foreach($article_list as $l) { ?> <!--on va afficher toutes les articles à la suite-->
        <div class="wrapper">
			<div id="colonnearticle"> 
				<div id="articletexte">
            		<p id="article">Title : <?php
                	$l['titre_article'] = ucfirst($l['titre_article']);?>
            		<?= $l['titre_article']; ?></p><br> <!--on affiche le titre-->
            		<p id="article">Contenu : 
					<?php $l['contenu_article'] = ucfirst($l['contenu_article']); ?> <!--on affiche le contenu de l'article-->
            		<?= $l['contenu_article']; ?></p><br>=
					<img id="imagearticle" src="<?php echo $l['urlimage'] ?>" alt="image de l'article">
				</div>

				
			</div>
        </div>
    <?php } ?>
                    
    <?php
        include('../inc/footer_and_rs.php'); //on insert le footer du site
    ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!--link JQuery-->
    <script src="../javascript/script.js"></script> <!--link page javascript-->
</body>



