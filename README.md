Page eventApp.php
Page "user" . Par d�faut affiche tous les events cr�� en France. 
Choisir une r�gion permet de voir les events de cette r�gion et de cr�er un �vent dans cette r�gion.
Cliquer sur l'adresse affiche une carte google map avec la position de l'utilisateur et de l'event, le trajet en voiture pour y aller ainsi que chaque direction pour s'y rendre.
Cliquer sur subscribe permet de s'inscrire � l'event. La gestion de doublon se fait sur l'adresse mail, on ne peut s'inscrire qu'une fois par event.
La carte est cr�er via la librairie franceJvmap dans le projet.

Pour se connecter au mode admin il faut se logger les id sont admin, admin pour faire simple. La connexion marche par session.

Page adminEvent.php
Affiche les event cr�er gr�ce � l'outil dataTable.
On peut trier sur l'ensemble des colonnes gr�ce au search input en haut � droite ou par colonne via les search de chaque colonne.
La colonne modifier permet de mettre � jour l'event correspondant.
La colonne supprimer permet de supprimer l'event correspondant.
Cliquer sur l'adresse affiche la carte google map de l'event.
Cliquer sur une ligne affiche une deuxieme table avec les participants de l'event cliqu�.

Le dossier include contient la connexion � la bdd et la v�rification pour la session user.

La map est faite via l'api google map et une api key.

Les couleurs et navigateurs viennent du template Freelancer.
