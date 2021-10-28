 //rotation logo
 $('#logo').hover(function()
 {
 $('#logo').toggleClass('logo-rotate') //on bascule sur la "class" "logo-rotate"
});

// verification champs du formulaire de contact

var nom = document.querySelector('.nom'); //déclaration des variables
var email = document.querySelector('.email');
var texte = document.querySelector('.texte');

var erreurNom = document.querySelector('.erreur-nom'); //déclaration des variables pour les erreurs des champs à remplir
var erreurEmail = document.querySelector('.erreur-email');
var erreurTexte= document.querySelector('.erreur-texte');


function formatNom(adresse) 
{
  return /^[A-Za-z]+$/.test(adresse); 
}

function formatEmail(adresse) //fonction du format d'email
{
  return /\S+@\S+\.\S+/.test(adresse); //expression régulière d'email qui permet d'avoir un bon format d'email
}



nom.addEventListener("keyup", validationNom); //lorsqu'on appuie sur une touche dans la zone
function validationNom()  //lancement de la fonction
{
  if(formatNom(nom.value) == false) { //lorsqu'on appuie sur une touche dans la zone
    erreurNom.innerHTML ="Le nom n'est pas bon.";  //pour le format du nom
  }
  else
  {
    erreurNom.innerHTML ="Le nom est bon.";    
  }
}

email.addEventListener("keyup", validationEmail); //lorsqu'on appuie sur une touche dans la zone
function validationEmail()  //lancement de la fonction
{
  if(formatEmail(email.value) == false) { //pour le format email
    erreurEmail.innerHTML ="L'email n'est pas bon."; //message si l'email n'est pas bon
  }
  else 
  {
    erreurEmail.innerHTML ="L'email est bon."; //message si l'email est bon
  }
}

texte.addEventListener("keyup", validationTexte); //lorsqu'on appuie sur une touche dans la zone
function validationTexte() 
{
  if(formatTexte(texte.value) == false) { //pour le format email
    erreurTexte.innerHTML ="Le texte n'est pas bon.";
  }
  else
  {
    erreurTexte.innerHTML ="Le texte est bon.";
  }
}


         

//parallax
window.addEventListener("scroll", function() { //lorsqu'on schroll
  const distance = window.scrollY;
  document.querySelector('.parallax').style.transform = `translateY(${distance * 0.55}px)`; //gestion de l'effet de shroll de l'élément avec l'axe Y
});


// bouton retour en haut

jQuery(function(){
  $(function () {
      $(window).scroll(function () { //Fonction appelée quand on descend la page
          if ($(this).scrollTop() > 200 ) {  // Quand on est à 200pixels du haut de page,
              $('#scrollUp').css('right','10px'); // Replace à 10pixels de la droite l'image
          } else { 
              $('#scrollUp').removeAttr( 'style' ); // Enlève les attributs CSS affectés par javascript
          }
      });
  });
});

// menu burger

$( document ).ready(function()  //fonction
{
  $(".cross").hide(); //de base la croix est caché
  $(".menu").hide(); //de base le menu est caché
  $(".hamburger").click(function() //quand on clique sur le bouton burger
  {
    $(".menu").slideToggle( "slow", function() //le menu se déroule
    {
      $(".hamburger").hide(); //on cache le bouton burger
      $(".cross").show();  //on fait apparaitre la croix
    });
  });
  $(".cross").click(function()  //quand on clique sur la croix
  {
    $(".menu").slideToggle( "slow", function() //on enroule le menu
    {
      $(".cross").hide(); //on cache la croix
      $(".hamburger").show(); //on fait apparaitre le bouton burger
    });
  });
});


