// bouton retour en haut
jQuery(function(){
  $(function () {
      $(window).scroll(function () { //Fonction appelée quand on descend la page
          if ($(this).scrollTop() > 200 ) {  // Quand on est descend de 200 pixels du haut de page,
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



//slider page d'accueil

var slide = new Array("../images/slider/slider_un.jpg", "../images/slider/slider_deux.jpg"); // création variable avec les images qui seront dans la slide
var numero = 0; // création varriable avec un chiffre
    
function ChangeSlide(sens) {
    numero = numero + sens;
    if (numero < 0)
        numero = slide.length - 1;
    if (numero > slide.length - 1)
        numero = 0;
    document.getElementById("slide").src = slide[numero];
};



//dark mode

function myFunction()
{
  var element=document.body; // récupération du body
  element.classList.toggle("dark-mode"); // affectation du dark mode
}


//rotation logo
$('.logo').hover(function(){ // lorsqu'on passe au dessus du logo
  $('.logo').toggleClass('logo-rotate') // mise en place de la class "logo-rotate"
});


// LightBox

$(function () {
  $(".petite").click(function () { // lorsqu'on clique sur un élément avec la class "petite"
      var SourcePetiteImage = $(this).attr('src'); // récupération de la source de l'image dans les dossiers
      $(".grande").html("<img src='" + SourcePetiteImage + "'>"); // affectation de la class "grande" sur l'élément de la class "petite" récupéré deux lignes plus haut
      $(".grande").fadeIn("slow").css("display", "flex"); // apparition de l'élément avec sa nouvelle class "grande"
  });

  $(".grande").click(function () { // lorsqu'on clique sur un élément avec la class "grande"
      $(".grande").fadeOut("fast"); // disparition de l'élément 
  });
});


  // Filtre Shop

filterSelection("all")
function filterSelection(c) {
  var x, i;       //variable
  x = document.getElementsByClassName("filterDiv"); //on récupère les éléments avec la class choisi avec l'un des boutons
  if (c == "all") c = ""; 
  // ajouter "show"
  for (i = 0; i < x.length; i++) {
    RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) AddClass(x[i], "show");
  }
}

// Voir
function AddClass(element, name) {    
  var i, arr1, arr2;      //variable
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Caché
function RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}




//apparition et disparition d'éléments/de produits de la boutique

$(document).ready(function(){ // dans le document
  $("#boutonsee").click(function()//Dès qu'on clique sur le bouton(#boutonsee) ,
  {  
      $(".imagesmoreno").fadeIn("slow").show(); //on fait apparaitre la class "imagesmoreno" (nom d'une section d'images) avec une apparition qui se fait petit à petit
      $("#boutonsee").fadeIn("slow").hide(); //on fait cacher la class "boutonsee" (nom d'une section d'images) avec une apparition qui se fait petit à petit
      $("#boutonseeless").fadeIn("slow").show(); //on fait apparaitre la class "boutonseeless" (nom d'une section d'images) avec une apparition qui se fait petit à petit
      $("#boutonseedeux").show(); //on fait apparaitre la class "boutonseedeux" (nom d'une section d'images)
  });
  $("#boutonseedeux").click(function()
  { 
    $(".imagesmorenodeux").fadeIn("slow").show();
    $("#boutonseedeux").fadeIn("slow").hide();
    $("#boutonseeless").fadeIn("slow").hide();
    $("#boutonseelessdeux").fadeIn("slow").show();
  });
  $("#boutonseeless").click(function()
  { 
    $(".imagesmoreno").hide();
    $("#boutonsee").show();
    $("#boutonseeless").hide();
  });
  $("#boutonseelessdeux").click(function()
  { 
    $(".imagesmoreno").hide();
    $(".imagesmorenodeux").hide();
    $("#boutonsee").show();
    $("#boutonseeless").hide();
    $("#boutonseelessdeux").hide();
  });
});





