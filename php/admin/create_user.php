<?php include('../functions.php') ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration system PHP and MySQL - Create user</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - create user</h2>
	</div>
	
	<form method="post" action="create_user.php" enctype="multipart/form-data">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<input type="submit" class="btn" name="register_btn"> + Create user
		</div>
		
      </fieldset>
	</form>
	
	<?php
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {	
   $tailleMax = 2097152; //variable qui défini la taille max d'une image uploadé
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png'); //variable qui défini les formats d'images autorisés et pour qu'on ne puisse pas mettre un fichier qui n'est pas une image
   if($_FILES['avatar']['size'] <= $tailleMax) { 
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "avatar/".$_SESSION['id'].".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if($resultat) {
            $updateavatar = $pdo->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
            $updateavatar->execute(array(
               'avatar' => $_SESSION['id'].".".$extensionUpload,
               'id' => $_SESSION['id']
               ));
            header('Location: profil.php?id='.$_SESSION['id']);
         } else {
            $msg = "Erreur durant l'importation de votre photo de profil"; //message d'erreur si il se passe un problème lors de l'importation
         }
      } else {
         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png"; //message d'erreur car mauvais format
      }
   } else {
      $msg = "Votre photo de profil ne doit pas dépasser 2Mo"; //message d'erreur car trop l'image est trop volumineuse
   }
}
?>
</body>
</html>

