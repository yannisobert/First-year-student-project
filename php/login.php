<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Dela+Gothic+One&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="blog.php" class="wrapper">
		<div id="form">
			<div class="input-group"> <!--partie du nom-->
				<label>Username</label><br>
				<input type="text" name="username" > <!--zone pour écrire le nom-->
			</div><br>
			<div class="input-group"> <!--partie du mot de passe-->
				<label>Password</label><br>
				<input type="password" name="password"> <!--zone pour écrire le mot de passe-->
			</div>
		</div>
		<div class="input-group">
			<button type="submit" class="btn bouton" name="login_btn">Login</button> <!--bouton pour confirmer la connexion-->
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>

