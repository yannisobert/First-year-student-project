<?php 
include('../../../inc/connect.php');


?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Commentaires</title>
	<link rel="stylesheet" type="text/css" href="../../../css/admin_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
	<script src="https://cdn.tiny.cloud/1/svsyyrtnq59m1nkselh2hahyzdjsa6bcb3kv49ehxeups23a/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
	


    <form id="zonearticle" method="post">
		Title here  :<input name="titre_article" placeholder="message"></input>
		<textarea name="contenu_article" placeholder="message">Text Here :</textarea>
		Insérer l'url de votre image :<input name="urlimage" class="urlimage">
  		<input class="bouton" type="submit" value="Poster">
		</div>
	</form>

  	<?php
		include('../../../inc/connect.php');
  
		if ($_POST)
		{
			$pdo->exec("INSERT INTO article (titre_article, contenu_article, urlimage) VALUES ('$_POST[titre_article]', '$_POST[contenu_article]', '$_POST[urlimage]')");
			
			$_POST['titre_article'] = addslashes($_POST['titre_article']); 
			$_POST['contenu_article'] = addslashes($_POST['contenu_article']); 
			$_POST['urlimage'] = addslashes($_POST['urlimage']); 
		}

		$display = $pdo->prepare('SELECT * FROM article');
        $display->execute();

		$article_list = $display->fetchAll(PDO::FETCH_ASSOC);  
  	?>

	<?php foreach($article_list as $l) { ?>
        
        <div class="wrapper">
			<p class="titre_article">Title : <?= $l['titre_article']; ?></p>
            <p class="contenu_article">Message : <?php$l['contenu_article'] = ucfirst($l['contenu_article']);?>
            <?= $l['contenu_article']; ?></p>
			<img src="<?php echo $l['urlimage'] ?>" alt="image de l'article">
            <a id="bouton" href="delete_article.php?id=<?= $l['id_article']; ?>">SUPPRIMER</a>
        </div>
    <?php } ?>

	<script>
    	tinymce.init({
      	selector: 'textarea',
      	plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      	toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      	toolbar_mode: 'floating',
      	tinycomments_mode: 'embedded',
      	tinycomments_author: 'Author name',
   		});
  	</script>

	<a id="bouton" href="../../blog.php">Aller sur le site</a>

	<footer>
   		<div class="wrapper">
    	    <h1>Solary</h1>
        	<div class="copyright">Copyright <?php echo date('Y'); ?> © All rights reserved.</div>
    	</div>
	</footer>
	
</body>
</html>