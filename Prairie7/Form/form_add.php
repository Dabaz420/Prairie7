<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout lien</title>
    </head>

    <body>
        <h1>Ajoutez un nouveau lien</h1>

        <form method="post" action="../index.php?action=add">  <!--action=add donc le case `case "add"` va s'executer une fois le                                                      formulaire valider-->
            <p>
                <label>Nom du site</label>
                <input type="text" name="l_name"/>
            </p>
            <p>
                <label>Description</label>
                <input type="text" name="l_description"/>
            </p>
            <p>
                <label>Mot clès</label>
                <input type="text" name="l_motcles"/>
            </p>
            <input type="submit">
        </form>
    </body>
</html>