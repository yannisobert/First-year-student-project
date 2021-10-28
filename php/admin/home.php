<?php 
include('../../inc/connect.php');
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php'); //redirige vers la page login
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../css/admin_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
	<script src="https://cdn.tiny.cloud/1/svsyyrtnq59m1nkselh2hahyzdjsa6bcb3kv49ehxeups23a/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<header>
        <div class="wrapper">
            <h1>Solary Admin Page</h1>   
            <ul><!--liste pour le menu-->
                <li><a href="home.php">Home Admin</a></li>
                <li><a href="admin_gestion/commentaires.php">Commentaires</a></li>
                <li><a href="admin_gestion/membres.php">Membres</a></li>
                <li><a href="admin_gestion/contact.php">Contact</a></li>
                <li><a href="admin_gestion/article.php">Article</a></li>
            </ul>
        </div>
	</div>
	</header>
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
	</div>
	<?php endif ?>

	<!--informations sur l'utilisateur connecté-->
	<div class="profile_info">
		<div>
			<?php  if (isset($_SESSION['user'])) : ?>
				<strong>Pseudo :<?php echo $_SESSION['user']['username']; ?></strong>
				<ul>
					<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
					<br>
					<a href="home.php?logout='1'" style="color: red;" id="bouton">logout</a>
                   &nbsp; <a href="create_user.php" id="bouton"> + add user</a>
				</ul>
			<?php endif ?>
		</div>
	</div>	

	<a id="bouton" href="../blog.php">Aller sur le site</a>
	
</div>

<footer>
   <div class="wrapper">
        <h1>Solary</h1>
        <div class="copyright">Copyright <?php echo date('Y'); ?> © All rights reserved.</div>
    </div>
</footer>


</body>
</html>



