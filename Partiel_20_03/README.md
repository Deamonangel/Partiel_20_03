# YNOV - B1 - Partiel


## Quelles sont les 2 méthodes HTTP utilisables dans un formulaire en PHP ?

Les métodes HTTP utilisables dans un formulaire sont les tableaux superglobaux **$_GET et $_POST**.

## Quelle est la différence entre include, include_once, require et require_once ?

La différence entre un include et un require :
 **l'include** est une methode d'inclusion de fichier qui lors d'un problème va envoyer un warnning, le **require** à les même proprieter exceter lors d'une erreur ou il bloquera l'exécution de la page, tout en affichant une jolie erreur.

**require_once** et **include_once** on le suffixe _once sert à limiter cette inclusion à une seule par page:
 Dans le cas d'un include_once, s'il est inclus plus d'une fois, un warning, et c'est tout.
 Dans le cas d'un require_once, blocage d'exécution, et retournement d'une erreur.


## Quelle fonction devez-vous appeler pour utiliser les sessions dans votre application ?

La fonction **session** permet d'utiliser des sessions contenu dans Un tableau associatif des valeurs stockées pour les sessions 

## Qu'est-ce qu'un DSN et à quoi sert-il dans le cadre de PDO ?

Un **DNS** est une function qui permet de renseigner une base de donnée (try/catch), il sert a savoir si la connection a la **PDO** est bien link et donc modifiable

## Quelle est la différence entre une requête préparée et une requête non préparée ?

Une **requête préparée** est une méthode qui protêge de l'injection puisqu'elle garde en mémoire la rêquete pour la data base et une **requête non préparée** est vunérable au attaque par injection et passe directement par la PDO

## Quelle est la différence entre la méthode GET et la méthode POST ?

**get**: les données sont rajoutées à l’URI par l’attribut action (avec un séparateur: ?) et sont donc visibles. Les données sont transmisent de l’ordinateur au serveur.

**post**: les données sont incluses dans le formulaire et sont donc invisibles; les données dont on se sert sont déjà sur le serveur, elles ne sont pas transmisent à l'utilisateur
