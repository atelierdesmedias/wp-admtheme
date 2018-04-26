# Workflow

Le projet contient les fichiers necessaires au bon fonctionnement d'un thème wordpress basic.
Celui-ci comprend également des fichiers relatif à l'environement de développement.

Ce thême s'oganise de la manière suivante (tous les fichiers ne sont pas décris ici, seul ceux qui nécessitent explication) : 

```shell
wp-admtheme/                         
├── config/                     # → dossier de configuration de l'environement de développement
│       ├── templates           # → les templates utlisés lors du scaffolding de pages et de composants             
│       ├── webpack.parts/      # → les fichiers de configuration de webpack (modules, plugins etc...) 
│       ├── global.config.js    # → path dev server / prod server 
│       ├── global.path.js      # → les chemins utilisés par webpack 
│       └── postcss.config.js   # → configuration du module postcss utilisé par webpack 
├── ...   
├── doc/                        # → documentations du projet 
├── ...       
├── .babelrc                    # → configuration du transpileur babel
├── ...       
├── package.json                # → contient les dépendances à charger via npm
├── package-lock.json           # → dependances versionnées (ne pas effacer) 
├── ...       
├── gulpfile.js                 # → fichier gulp contenant la configuration de scaffolding (voir la doc scaffolder)
├── ...              
├── webpack.config.babel.js     # → config principale webpack (l'extention babel pemet d'utiliser les import ES6 dans ce fichier)
├── ...              
├── tsconfig.json               # → config de typescript 
├── ...
              
``` 
 
 