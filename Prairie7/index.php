<?php

    //On utilise un switch case pour effectuer des actions selon ce que l'utilisateur veut faire
    //Par défaut quand la page se lance $_GET["action"] = NULL ce qui ne correspond à aucun case
    //Par conséquent c'est le default (tout en bas) qui s'exécute.
    
    switch($_GET["action"]){
        case "new" :                            //s'exécute si l'utilisateur clique sur "Nouveau lien" (voir bibli.php)
            include "Form/form_add.php";        //On inclut le formulaire pour ajouter un nouveau lien
        break;

        case "add" :                            //Une fois le formulaire d'ajout validé ce case s'execute
            require "Model/utilisateur.php";    //On requiert à nouveau utilisateur.php
            AddNewlink();                       //On appelle la fonction AddNewlink de utilisateur.php
            $Utilisateur = FetchAlllinks();     //Puis on affiche de nouveau notre tableau mis à jour.
            include "Gabarits/bibli.php";
        break;

        case "supp" :                           //s'execute si l'utilisateur clique sur "Supprimer" (voir bibli.php)
            $supp = $_GET["id"];                /*On récupère la valeur de id qui est passer dans la bare d'url                                                      (grace au ahref="index.php?action=supp&id=$id" dans bibli.php)*/
            include "Form/form_supp.php";       //On inclut le formulaire pour supprimer un lien
        break;

        case "deleted" :                        //s'exécute si l'utilisateur valide le formulaire de suppresion (form_supp.php)
            require "Model/utilisateur.php";    //On requiert encore utilisateur.php
            Supplink();                         //On appelle la fonction Supplink() de utilisateur.php
            $Utilisateur = FetchAlllinks();     //Puis on affiche de nouveau notre tableau mis à jour.
            include "Gabarits/bibli.php";
        break;

        case "modif" :                          //s'exécute si l'utilisateur clique sur "Modifier" (voir bibli.php)
            $modif = $_GET["id"];               /*On récupère la valeur de id qui est passer dans la bare d'url                                                      (grace au ahref="index.php?action=modif&id=$id" dans bibli.php)*/
            include "Form/form_modif.php";      //On inclut le formulaire pour modifier un lien
        break;

        case "modified" :                       //s'exécute si l'utilisateur valide le formulaire de modification (form_modif.php)
            require "Model/utilisateur.php";    //On requiert aussi utilisateur.php
            Modiflink();                        //On appelle la fonction Modiflink() de utilisateur.php
            $Utilisateur = FetchAlllinks();     //Puis on affiche de nouveau notre tableau mis à jour.
            include "Gabarits/bibli.php";
        break;
            
        default :                               //Ici on va simplement charger le tableau avec tout les liens.
            require "Model/utilisateur.php";    //Ici on requiert le fichier utilisateur.php
            $Utilisateur = FetchAlllinks();     /*On met le résultat de la fonction dans une variable (voir FetchAlllink dans                                       utilisateur.php)*/
            include "Gabarits/bibli.php";       /*Grace à la variable $Utilisateur notre Gabarit va automatiquement se remplir avec les                              valeur de notre BD*/
        break;
    }
?>
