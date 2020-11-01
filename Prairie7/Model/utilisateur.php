<?php
    function FetchAlllinks(){
    
        $nomserveur = "localhost";                      //Variables pour la BD
        $userBD = "nom_d_utilisateur";
        $MDP = "mot_de_passe";
        $BaseDonnee = "nom_base_donnee";
        
        try {
             $pdo = new PDO ("mysql:host=$nomserveur;dbname=$BaseDonnee", $userBD, $MDP);  //Connexion à la BD
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             echo "Connexion réussie";
             
             $utils = $pdo->query('SELECT * FROM `link` ORDER BY `id`'); //Récupération de la table link dans la variable $utils
             $mesResultat = array();                                     //création d'un tableau
             
             $res = $utils->fetch();                                     /*On donne à $res la valeur de la première ligne de la                                                              table link qui se trouve dans $utils*/
        
             while($res != NULL){           //Tant que $res n'es pas nul nous allons effectuer les actions suivante
                $id = $res['id'];           /*Déclarer une variable qui prendra la valeur de $res['id'] afin d'ordoner le tableau                             $mesResultat tel que $mesResultat['id'] == $res['id']*/
                
                $mesResultat[$id] = $res;   /*Remplir un tableau en 2 dimensions avec une colone id et une colone qui est la ligne                         entière de la table qui se trouve dans $res*/  
                
                $res = $utils->fetch();     //Passer à la ligne suivante de la table     
                
             }
        }

        catch(PDOExeption $e){
            echo "Connexion échouée";
            $pdo->rollBack();
            return;
        }
        return $mesResultat;
    };

    function AddNewlink(){                  //Fonction pour ajouter un lien

        try{
            $nomserveur = "localhost";                      //Variables pour la BD
            $userBD = "nom_d_utilisateur";
            $MDP = "mot_de_passe";
            $BaseDonnee = "nom_base_donnee";
            $add = $_POST;

            $pdo = new PDO ("mysql:host=$nomserveur;dbname=$BaseDonnee", $userBD, $MDP);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);          
            $l_name = $add['l_name'];
            $l_description = $add['l_description'];
            $l_motcles = $add['l_motcles'];

            $insertion = "INSERT INTO link (l_name,l_description,l_motcles)
                VALUES ('$l_name','$l_description','$l_motcles')";
            
            $pdo->exec($insertion);
        }
        catch(PDOExeption $e){
            echo "Connexion échouée";
            $pdo->rollBack();
            return;
        }
        return;
    };

    function Supplink(){            //Fonction pour supprimer un lien

        try{
            $nomserveur = "localhost";                      //Variables pour la BD
            $userBD = "nom_d_utilisateur";
            $MDP = "mot_de_passe";
            $BaseDonnee = "nom_base_donnee";
            $supp = $_GET["id"];
            
            $pdo = new PDO ("mysql:host=$nomserveur;dbname=$BaseDonnee", $userBD, $MDP);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
            $sql = "DELETE FROM `link` WHERE `id`=$supp";  //$supp qui contient l'id du lien à supprimer
            $sth = $pdo->prepare($sql);
            $sth->execute();
        }
        catch(PDOExeption $e){
            echo "Connexion échouée";
            $pdo->rollBack();
            return;
        }
        return;
    };

    function Modiflink(){                       //Fonction pour modifier un lien

        try{
            $nomserveur = "localhost";                      //Variables pour la BD
            $userBD = "nom_d_utilisateur";
            $MDP = "mot_de_passe";
            $BaseDonnee = "nom_base_donnee";
            $modif = $_GET["id"];              //$modif prend la valeur de l'id qui est passer par la barre url
            $modified = $_POST;                //$modified prend les valeurs du formulaire modifier    
            
            $pdo = new PDO ("mysql:host=$nomserveur;dbname=$BaseDonnee", $userBD, $MDP);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $l_name = $modified['l_name'];
            $l_description = $modified['l_description'];
            $l_motcles = $modified['l_motcles'];
    
            $sth = "UPDATE link     
                SET l_name=\"$l_name\"
                WHERE id=\"$modif\"
                ";
            $pdo->exec($sth);
    
            $sth = "UPDATE link
                SET l_description=\"$l_description\"
                WHERE id=\"$modif\"
                ";
            $pdo->exec($sth);
    
            $sth = "UPDATE link
                SET l_motcles=\"$l_motcles\"
                WHERE id=\"$modif\"
                ";
            $pdo->exec($sth);
        }
        catch(PDOExeption $e){
            echo "Connexion échouée";
            $pdo->rollBack();
            return;
        }
        return;
    };
?>
