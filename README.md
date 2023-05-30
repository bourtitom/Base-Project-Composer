# Création d'un site de recherche de chanson


**Objectif**:  > Corriger 2 erreurs identifiées sur le développement produit lors de l’évaluation #4  
 > Ajouter une catégorie et un chanteur en utilisant l’Ajax.
 > afficher la liste des chanteurs rock grâce à l'API

## Etape 1 - La structure de fichiers

Notre application aura la stucture suivante

```
    public/
        index.php
        style/
        image/
    src/
        Controllers/
            ModelsController.php
        Models/
            Models.php
            ModelsManager.php
        Views/
            PageViews/
                index.php
                create.php
            Auth/
                login.php
                register.php
            Layout.php
            404.php            
        Router.php
        Route.php
```

## Etape 2 - Composer et l'autoloading

- Initialiser le dossier comme étant un projet composer
- 
```shell
$ composer init  # crée le fichier composer.json
$ composer install # install l'autoloader
```

- Remplir le fichier composer avec la règle d'autoloading

```json
{
 "name": "tombourti/excomposer",
 "description": "desc de notre application",
 "type": "project",
 "license": "no",
 "autoload": {
  "psr-4": {
   "Excomposer\\": "src/"
  }
 },
 "minimum-stability": "stable",
 "require": {} 
}
```

- Réinitialiser l'autoloader

```shell
$ composer dump-autoload
// le composer dump-autoload est très utiles et prioritaire 
// si vous avez des erreurs dans ce style 
//' Fatal error: Uncaught Error: Class "Excomposer\Router" 
// not found in C:\xampp\htdocs\excomposer\public\index.php:9 
// Stack trace: #0 {main} thrown in
// C:\xampp\htdocs\excomposer\public\index.php on line 9'
// c'est que vous ne l'avais pas fait  

 
```

//lancer : php -S localhost:8000 // dans le dossier public

## Etape 3 - Le router

Voici la liste de route implementée:

- "/", GET => Accueil
- "/login/", GET => affichage du login en get
- "/register/", GET => affichage du register en get
- "/login", POST => se connecte si le compte existe 
- "/register", POST => créer un compte 

