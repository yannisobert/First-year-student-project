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
	<title>Admin Membres</title>
	<link rel="stylesheet" type="text/css" href="../../../css/admin_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
</head>
<body>
	<div class="one">
        </div>
        <div class="wrapper">
            <h1>Admin Membres</h1>   
            <ul><!--liste pour le menu-->
                <li><a href="../home.php">Home Admin</a></li>
                <li><a href="commentaires.php">Commentaires</a></li>
                <li><a href="membres.php">Membres</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="article.php">Article</a></li>
            </ul>
        </div>
	</div>

	<div id="zonemembre"></div>
	<?php 
		$display = $pdo->prepare('SELECT * FROM users');
		$display->execute();

		$users_list = $display->fetchAll(PDO::FETCH_ASSOC);
	?>
	<?php foreach($users_list as $l) { ?>
		<div class="wrapper">
			<p>Pseudo :<?= $l['username']; ?></p>
            <p class="email">Email : <?= $l['email']; ?></p>
            <p class="user_type">User type : <?= $l['user_type']; ?></p>
			<label>Change user type</label>
			<div>
				<select name="user_type" id="user_type" >
					<option value=""></option>
					<option name ="admin" value="admin">Admin</option>
					<option name ="user" value="user">User</option>
				</select>
				<input type="submit" class="btn" name="register_btn">Change user type	
			</div>
            <a id="bouton" href="delete_user.php?id=<?= $l['id']; ?>">SUPPRIMER</a><br>
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

