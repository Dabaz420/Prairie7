<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modif lien</title>
    </head>

    <body>
        <h1>Modif un lien</h1>
<?php
    try{
        $nomserveur = "localhost";
        $userBD = "id15187806_damien";
        $MDP = "Dabaz420_BaseD";
        $BaseDonnee = "id15187806_biblio";

        $pdo = new PDO ("mysql:host=$nomserveur;dbname=$BaseDonnee", $userBD, $MDP);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $utils = $pdo->query(" SELECT * FROM `link` WHERE `id`=$modif ");        
        $res = $utils->fetch();                                                 /*Comme pour le formulaire de suppresion on                                                                            commence par remplir les champs de texte avec les                                                                      information de la BD pour que l'utilisateur ai plus                                                                     de faciliter lors de la modification*/ 
        
        echo"<form method=\"post\" action=\"../index.php?action=modified&id=$modif\">"; /*Mais cette fois ci le formulaire modifier                                                                             va être traiter dans le case "modified" qui                                                                             appelle une fonction qui va écraser les                                                                                données précédente par celle inscrites dans                                                                              ce formulaire*/
            echo"<p>";
                echo"<label>Nom du site</label>";
                echo"<input type=\"text\" name=\"l_name\" value=\"$res[l_name]\"/>";
            echo"</p>";
            echo"<p>";
                echo"<label>Description</label>";
                echo"<input type=\"text\" name=\"l_description\" value=\"$res[l_description]\"/>";
            echo"</p>";
            echo"<p>";
                echo"<label>Mot clès</label>";
                echo"<input type=\"text\" name=\"l_motcles\" value=\"$res[l_motcles]\"/>";
            echo"</p>";
            echo"<input type=\"submit\">";
        echo"</form>";
    }
    catch(PDOExeption $e){
            echo "Connexion échouée";
            $pdo->rollBack();
            return;
    }

        
?>

    </body>
</html>