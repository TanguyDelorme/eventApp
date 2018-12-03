Page eventApp.php
Page "user" . Par défaut affiche tous les events créé en France. 
Choisir une région permet de voir les events de cette région et de créer un évent dans cette région.
Cliquer sur l'adresse affiche une carte google map avec la position de l'utilisateur et de l'event, le trajet en voiture pour y aller ainsi que chaque direction pour s'y rendre.
Cliquer sur subscribe permet de s'inscrire à l'event. La gestion de doublon se fait sur l'adresse mail, on ne peut s'inscrire qu'une fois par event.
La carte est créer via la librairie franceJvmap dans le projet.

Pour se connecter au mode admin il faut se logger les id sont admin, admin pour faire simple. La connexion marche par session.

Page adminEvent.php
Affiche les event créer grâce à l'outil dataTable.
On peut trier sur l'ensemble des colonnes grâce au search input en haut à droite ou par colonne via les search de chaque colonne.
La colonne modifier permet de mettre à jour l'event correspondant.
La colonne supprimer permet de supprimer l'event correspondant.
Cliquer sur l'adresse affiche la carte google map de l'event.
Cliquer sur une ligne affiche une deuxieme table avec les participants de l'event cliqué.

Le dossier include contient la connexion à la bdd et la vérification pour la session user.

La map est faite via l'api google map et une api key.

Les couleurs et navigateurs viennent du template Freelancer.
