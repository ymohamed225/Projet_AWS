<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Participants</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> S'inscrire</a>

        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des inscrit
                $req = mysqli_query($con , "SELECT * FROM inscrit");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'inscrits dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore de Participant Inscrit !" ;
                    
                }else {
                    //si non , affichons la liste de tous les inscrits
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
            <tr>
                <td><?=$row['nom']?></td>
                <td><?=$row['prenom']?></td>
                <td><?=$row['contact']?></td>
                <td><?=$row['email']?></td>
                <!--Nous alons mettre l'id de chaque inscrit dans ce lien -->
                <td><a href="modifier.php?id=<?=$row['id']?>"><img src="images/pen.png"></a></td>
                <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="images/trash.png"></a></td>
            </tr>
            <?php
                    }
                    
                }
            ?>


        </table>




    </div>
</body>

</html>