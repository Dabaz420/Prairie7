<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Suppresion lien</title>
    </head>

    <body>
        <h1>Supprimer un lien</h1>
        <h3>Voulez vous supprimer ce lien ?</h3>

<?php
    try{
        $nomserveur = "localhost";
        $userBD = "id15187806_damien";
        $MDP = "Dabaz420_BaseD";
        $BaseDonnee = "id15187806_biblio";

        $pdo = new PDO ("mysql:host=$nomserveur;dbname=$BaseDonnee", $userBD, $MDP);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $utils = $pdo->query(" SELECT * FROM `link` WHERE `id`=$supp ");            /*Comme pour la fonction fetchAlllink() on va                                                                          mettre des information de notre base de donné                                                                          dans $utils mais cette fois çi nous ne mettron                                                                         que la ligne qui correspond à la valeur de l'id                                                                         se trouvant dans $supp*/              
        $res = $utils->fetch();                                                     //On récupère donc cette ligne dans $res
        
        echo"<form method=\"post\" action=\"../index.php?action=deleted&id=$supp\">"; /*nous renvoi dans cause : "deleted" dans                                                                                l'index*/
            echo"<p>";
                echo"<label>Nom du site</label>";
                echo"<input type=\"text\" name=\"l_name\" value=\"$res[l_name]\"/>";  /*ici on remplis les zones de texte avec les                                                                     valeur de $res afin que l'utilisateur                                                                  puisse vérifier si il veux bien supprimer ce lien*/
            echo"</p>";
            echo"<p>";
                echo"<label>Description</label>";
                echo"<input type=\"text\" name=\"l_description\" value=\"$res[l_description]\"/>"; //ici aussi
            echo"</p>";
            echo"<p>";
                echo"<label>Mot clès</label>";
                echo"<input type=\"text\" name=\"l_motcles\" value=\"$res[l_motcles]\"/>";  //et encore ici
            echo"</p>";
            echo"<input type=\"submit\">";
        echo"</form>";
        echo"</br>";
        echo "<form method=\"post\" action=\"../index.php?action=annuler\">"; /*Renvois action=annuler ce qui ne correspond à aucun                                                                     case donc nous somme renvoyer dans le default dans                                                                     l'index*/
            echo"<input type=\"submit\" value=\"Annuler\">";
        echo "</form>";
    }
    catch(PDOExeption $e){
            echo "Connexion échouée";
            $pdo->rollBack();
            return;
    }
        
?>

    </body>
</html>