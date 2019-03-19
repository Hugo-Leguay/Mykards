<?php 
echo <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/menu.css') }}">
</head>
<body>
<nav>
   <ul style="width: 1755px;">
     <li class="sub-menu-parent" tab-index="0">
       <a href="/home">Accueil</a>
     </li>
     <li class="sub-menu-parent" tab-index="0">
       <a href="#">Créer un jeu</a>
       <ul class="sub-menu">
         <li><a href="/game/new">52 Cartes</a></li>
         <li><a href="/game/new">36 Cartes</a></li>
         <li><a href="/game/new">UNO</a></li>
         <li><a href="/game/new">7 familles</a></li>
       </ul>
     </li>
     <li class="sub-menu-parent" tab-index="0">
       <a href="#">A propos</a>
       <ul class="sub-menu">
         <li><a href="#">L équipe</a></li>
         <li><a href="#">Nous contacter</a></li>
         <li><a href="#">C.G.U</a></li>
         <li><a href="#">Informations légales</a></li>
       </ul></li>
      <li class="sub-menu-parent" tab-index="0">
       <a href="#">Connexion</a>
       <ul class="sub-menu">
         <li><a href="/connexion/new">Se connecter</a></li>
         <li><a href="/user/new">S inscrire</a></li>
       </ul></li>
   </ul>
 </nav>
    
</body>
</html>