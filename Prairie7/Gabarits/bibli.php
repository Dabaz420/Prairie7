<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Prairie7</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <table>
            <tr class="criteres">
            <td>id</td>
            <td>Description</td>
            <td>Lien</td>
            <td>Hashtag</td>
            </tr>
        <?php
        foreach ($Utilisateur as $id => $ligne){        /*ici on donne à $ligne la première valeur de $Utilisateur qui contien                                                 notre tableau en 2 dimentions avec toute les info de notre BD.
                                                        Une fois la boucle éxecuter elle recommence pour chaque $id dans    $Utilisatreur  */
                                                        
            $id = $ligne["id"];             //on récupère nos informations dans des variable affin de les afficher dans un tableau
            $nom_lien = $ligne["l_name"];
            $description = $ligne["l_description"];
            $hashtag = $ligne["l_motcles"];
   
            echo "<tr>";                        //la ligne du tableau avec toute nos informations
            echo "<td>$id</td>";
            echo "<td>$description</td>";
            echo "<td>$nom_lien</td>";
            echo "<td>$hashtag</td>";
            echo "<td>
                    <a href=\"index.php?action=modif&id=$id\">      
                      Modifier
                    </a>
                    <a href=\"index.php?action=supp&id=$id\">
                      Supprimer
                    </a>
                  </td>"; //Dans la dernière case du tableau on retouvre un a href avec "index.php?action=modif&id=$id" et un autre avec "index.php?action=supp&id=$id", cela veux simplement dire que si on clique sur Modifier on donne à action la valeur "modif" ce qui nous permet d'exécuter le case `case "modif"` dans l'index et de faire passer la valeur de $id pour savoir quel entré de la BD modifier. Idem avec Supprimer. 
            echo "</tr>";
        }
        ?>
            </br>       
            <a href="index.php?action=new">  <!--Même chose que pour Modifier ou Supprimer mais sans $id car inutile-->
            <p>Nouveau lien</p>
            </a> 
        </table>
    </body>
</html>