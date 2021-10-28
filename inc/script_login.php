<?php

    session_start();

    if(isset($_POST['submit'])){ //si cela a été soumit
        if(isset($_POST['username']) and !empty($_POST['username'])){
            if(filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)){
                if(isset($_POST['password']) and!empty($_POST['password'])){


                    require "server.php";

                    $password =sha1($_POST['password']);

                    $getdata = $pdo->prepare("SELECT email FROM admin WHERE email=? and password = ?");
                    $getdata->execute(array($_POST['username'], $password));

                    $rows = $getdata->rowCount();

                    if($rows==true)
                    {
                        $_SESSION['admin']=$_POST['username'];
                        header("Location:inc/dashboard.php");
                    }else{
                        $erreur ="Username ou mot de passe inconnue"; //message d'erreur 
                    }
                }else{ 
                    $erreur = "Veuillez saisir votre password";//message d'erreur  
                }
            }else{
                $erreur = "Veuillez saisir un email valide!"; //message d'erreur 
            }
        }else{
            $erreur = "Veuillez saisir un UserName"; //message d'erreur 
        }
    }

?>