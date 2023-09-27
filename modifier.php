<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

         //connexion à la base de donnée
          include_once "connexion.php";
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos d'un employé
          $req = mysqli_query($con , "SELECT * FROM inscrit WHERE id = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($nom) && isset($prenom)  && isset($contact) && isset($email)){
               //requête de modification
               $req = mysqli_query($con, "UPDATE inscrit SET nom = '$nom' , prenom = '$prenom' , contact = '$contact' , email = '$email' WHERE id = $id");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "Participant non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs SVP !";
           }
       }
    
    ?>

    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier le participant : <?=$row['nom']?> </h2>
        <p class="erreur_message">
            <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">

            <label>Prénom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>">

            <label>Contact</label>
            <input type="number" name="contact" value="<?=$row['contact']?>">

            <label>Email</label>
            <input type="email" name="email" value="<?=$row['email']?>">

            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>

</html>