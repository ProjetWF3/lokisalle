# lokisalle
Projet de site de location de salle dans le cadre de la formation webforce 3

# installer un nouveau projet
se mettre dans le dossier /htdocs ou /www

puis taper les commandes suivantes :

        git clone https://github.com/projetWF3/lokisalle.git (creation du repertoire du projet ex: /lokisalle)
        git branch -a (permet de voir toutes les branches sur le projet github)
        git checkout -b nom_branche_locale origin/nom_branche_github (recuperer sa branche github sur sa branche locale)
        git branch (permet de voir les branches uniquement en local)
        git branch le_nom_de_sa_branche (se mettre sur sa branche en local)


A ce stade vous pouvez travailler sur votre poste en local...

# sauvegarder son travail en local et mettre ses changements sur github

        git status (permet de voir les fichiers modifiés ou supprimer ou ajouter | à faire souvent)
        git commit -am "son_pseudo : dire ce que l'on a fait brievement"
        git pull origin le_nom_de_sa_branche_github
        git push origin le_nom_de_sa_branche_github
        
