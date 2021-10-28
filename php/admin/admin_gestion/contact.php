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
	<title>Admin Contact</title>
	<link rel="stylesheet" type="text/css" href="../../../css/admin_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
</head>
<body>
        <div class="wrapper">
            <h1>Admin Contact</h1>   
            <ul><!--liste pour le menu-->
                <li><a href="../home.php">Home Admin</a></li>
                <li><a href="commentaires.php">Commentaires</a></li>
                <li><a href="membres.php">Membres</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="article.php">Article</a></li>
            </ul>
        </div>
    <!--code pour pouvoir voir et supprimer des demandes de contact-->
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php 
		$display = $pdo->prepare('SELECT * FROM contact');
		$display->execute();

		$contact_list = $display->fetchAll(PDO::FETCH_ASSOC);
	?>
	<?php foreach($contact_list as $l) { ?>
		<div class="wrapper">
			<p>Pseudo :<?= $l['pseudo']; ?></p>
            <p class="mail">Email : <?= $l['mail']; ?></p>
            <p class="message">Message : <?= $l['message']; ?></p>
            <a id="bouton" href="delete_contact.php?id=<?= $l['id_contact']; ?>">SUPPRIMER</a><br>
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