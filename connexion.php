<?php
  //connexion à la base de données
  $con = mysqli_connect("Localhost","zds18_l3info_2021_g11","cjJzAcdf;=Z{","zds18_l3info_2021_g11");
  if(!$con){
     echo "Vous n'êtes pas connecté à la base de donnée";
  }
?>