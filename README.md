# lokisalle
Projet de site de location de salle dans le cadre de la formation webforce 3

# installer un nouveau projet
se mettre dans le dossier /htdocs ou /www

puis taper les commandes suivantes :

        git config --global user.name "Votre nom ou pseudo"
        git config --global user.email "votre@email.com"
        git clone https://github.com/projetWF3/lokisalle.git (creation du repertoire du projet ex: /lokisalle)
        git branch -a (permet de voir toutes les branches sur le projet github)
        git checkout -b nom_branche_locale origin/nom_branche_github (recuperer sa branche github sur sa branche locale)
        git branch (permet de voir les branches uniquement en local)
        git branch le_nom_de_sa_branche (se mettre sur sa branche en local)


A ce stade vous pouvez travailler sur votre poste en local...

# sauvegarder son travail en local et mettre ses changements sur github
        pwd (pour visualiser ou l'on se trouve dans l'arborescence)
        cd /c/xampp/htdocs/lokisalle (se remettre dans le dossier /htdocs ou /www)
        git checkout nom_branche_locale (ex: git checkout tanala)
        git status (permet de voir les fichiers modifiés ou supprimer ou ajouter | à faire souvent)
        git add . (si nouveaux fichiers créés, faire cette commande)
        git commit -am "son_pseudo : dire ce que l'on a fait brievement"
        git pull origin le_nom_de_sa_branche_github
        git push origin le_nom_de_sa_branche_github (puis mettre son pseudo et son mot de passe)
        git status
        puis faire les réglages via l'interface de github
# si c'est bon on balance sur la branche développement ce qui vient d'être sauvegardé sur notre branche perso
        git checkout developpement
        git status
        git pull origin developpement
        git pull origin branche_perso
        git push origin developpement (puis mettre son pseudo et son mot de passe)
        git status
# si c'est toujours okayy on retourne sur sa branche et on continue dessus
        git checkout sa_branche_locale
        ...puis on refait l'avant dernière tétape ainsi de suite...
        
# Cas : A et B ont travaillés sur leurs branches perso. Ils ont sauvegardé sur leur branche perso et sur la branche developpement chacun de leur coté.
# A veut reprendre le travail fait par B tout en conservant son propre travail (à A). A doit s'assurer d'être sur sa branche et faire :
        git checkout .
        git checkout developpement 
        git pull origin developpement (pour voir ce qui est sur la branche developpement)
        git checkout sa_branche_perso (pour retourner sur sa branche perso)
        git pull origin developpement (pour rappatrier ce qui est sur la branche developpement sur sa branche perso)
        
        
        
        
        
        
