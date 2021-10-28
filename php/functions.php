<?php 
session_start(); //démarage d'une session

// se connecter à la base de données
$db = mysqli_connect('localhost', 'root', '', 'solary');

// déclaration de variable
$username = "";
$email    = "";
$errors   = array(); 

// appelle la fonction register () si vous cliquez sur register_btn
if (isset($_POST['register_btn'])) {
	register();
}

function register() //commencement de la fonction register
{

// appelle ces variables avec le mot-clé global pour les rendre disponibles dans la fonction() fonction si vous cliquez sur register_btn
	global $db, $errors, $username, $email;

// reçoit toutes les valeurs d'entrée du formulaire. Appelez la fonction e ()
// défini ci-dessous pour échapper aux valeurs du formulaire
$username    =  $_POST['username'] ?? "";
$email       =  $_POST['email'] ?? "";
$password_1  =  $_POST['password_1'] ?? "";
$password_2  =  $_POST['password_2'] ?? ""; 

// validation du formulaire: assurez-vous que le formulaire est correctement rempli
if (empty($username))
{ 
		array_push($errors, "Username is required"); //si vouys n'avez pas écris de nom d'erreur cela affiche un msg d'erreur
}
if (empty($email))
{ 
	array_push($errors, "Email is required"); //si vouys n'avez pas écris d'email d'erreur cela affiche un msg d'erreur
}
if (empty($password_1))
{ 
	array_push($errors, "Password is required"); //si vous n'avez pas écris de mdp d'erreur cela affiche un msg d'erreur
}
if ($password_1 != $password_2) { //si les deux mot de passe ne sont pas pareil cela affiche un message d'erreur
	array_push($errors, "The two passwords do not match");
}

// enregistrer l'utilisateur s'il n'y a pas d'erreurs dans le formulaire
if (count($errors) == 0) 
{
	$password = md5($password_1);// crypter le mot de passe avant de l'enregistrer dans la base de données

	if (isset($_POST['user_type']))
	{
		$user_type = $_POST['user_type'];
		$query = "INSERT INTO users (username, email, user_type, password) 
		VALUES('$username', '$email', '$user_type', '$password')";
		mysqli_query($db, $query); //mysqli_query est utilisée pour simplifier l'acte d'exécuter une requête sur la connexion à la base de données
		$_SESSION['success']  = "New user successfully created!!"; //message de succès si l'utilisateur est bien créé
		header('location: home.php'); //redirection à la page home.php
	}
	else
	{
		$query = "INSERT INTO users (username, email, user_type, password) 
		VALUES('$username', '$email', 'user', '$password')";
		mysqli_query($db, $query); //mysqli_query est utilisée pour simplifier l'acte d'exécuter une requête sur la connexion à la base de données

		$logged_in_user_id = mysqli_insert_id($db); // récupère l'identifiant de l'utilisateur créé

		$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
		$_SESSION['success']  = "You are now logged in"; //message de succès si l'utilisateur est bien conencté
		header('location: index.php'); //redirection à la page index.php
	}
}
}

// retourne le tableau des utilisateurs à partir de leur id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query); //mysqli_query est utilisée pour simplifier l'acte d'exécuter une requête sur la connexion à la base de données
	$user = mysqli_fetch_assoc($result);
	return $user;
}	

function display_error() { //lancement de la fonction d'erreur
	global $errors;

	if (count($errors) > 0){ //si il y a au moins une erreur
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	


function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true; //retour sur la page qui a appelé la fonction
	}else{
		return false;
	}
}

// déconnecte l'utilisateur si le bouton de déconnexion est cliqué
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// appelle la fonction login () si vous cliquez sur register_btn
if (isset($_POST['login_btn'])) {
	login();
    }

    // Login utilisateur
    function login(){
	global $db, $username, $errors, $user_type;
    
    $username = $_POST['username'];
	$password = $_POST['password'];

    // On s'assure que le formulaire est correctement rempli
    if (empty($username)) { 
		array_push($errors, "Username is required"); //message d'erreur si username non complété
	}
	if (empty($password)) {
		array_push($errors, "Password is required"); //message d'erreur si password non complété
	}

        // tentative de connexion si aucune erreur sur le formulaire
	    if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { 
            // vérifie si l'utilisateur est administrateur ou utilisateur
            $logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') { //Si user_type est admin
				$_SESSION['user'] = $logged_in_user; 
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/home.php');		  //redirection vers home.php
			}else{
				$_SESSION['user'] = $logged_in_user; //alors si les deux sont équivalents 
				$_SESSION['success']  = "You are now logged in"; //message de réussite

				header('location: blog.php'); //redirection vers blog.php
			}
		}else {
			array_push($errors, "Wrong username/password combination"); //si ni l'un ni l'autre message d'erreur
		}
	}
    }

function isAdmin() //lancement de la fonction isAdmin
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) { //si le user_type et user est égal à admin
		return true; //retourne sur la page où a été demander cette fonction
	}else{
		return false;
	}
}


