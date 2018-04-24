# Workflow

Le projet contient les fichiers necessaires au bon fonctionnement d'un thème wordpress basic.
Celui-ci comprend également des fichiers relatif à l'environement de développement.

Ce thême s'oganise de la manière suivante (tous les fichiers ne sont pas décris ici, seul ceux qui nécessitent explication) : 

```shell
wp-admtheme/                         
├── config/                     # → dossier de configuration de l'environement de développement
│       ├── templates           # → les templates utliser lors du scaffolding de pages et de composants             
│       ├── webpack.parts/      # → les fichiers de configuration de webpack 
│       ├── global.config.js    # → path dev server / prod server 
│       ├── global.path.js      # → les chemins utilisés par webpack 
│       └── postcss.config.js   # → configuration du module postcss utilisé par webpack 
├── ...   
├── doc/                        # → documentations du projet 
├── ...       
├── .babelrc                    # → configuration du transpileur babel
├── ...       
├── package.json                # → contient les dépendances à charger via npm
├── package-lock.json           # → fichier versionner à ne pas effacer 
├── ...       
├── gulpfile.js                 # → fichier gulp contenant la configuration de scaffolding (voir la doc scaffolder)
├── ...              
├── webpack.config.babel.js     # → config principale webpack (l'extention babel pemet d'utiliser les import ES6 dans ce fichier)
├── ...              
├── tsconfig.json               # → config de typescript 
├── ...
              
``` 
 
 
# Fonctionnement des sources 


Le dossier [src](../src/) contient toutes **les sources de développement front**, 
hormis la DOM qui est directement appliquée dans les fichiers php.

```shell
src/                         
├── common/                     # → tout ce qui est valable sur l'ensemble du projet
│       ├── atoms               # → variables             
│       ├── core                # → fonctionnement général du framework front
│       ├── element             # → elements mixins (title, subtitle...)   
│       ├── fonts               # → fonts delclaration    
│       ├── helpers             # → helpers mixins (grid, posiiton...)   
│       ├── images              # → images fav, library and sprites    
│       ├── layout              # → layouts styles   
│       └── _common.scss        # → IMPORTANT : point de sortie de l'ensemble des fichiers scss qui va être importé en référence dans tous les autres fichiers scss
├── project/                    # → le contenu du projet
│       ├── components          # → composants              
│       └── pages               # → composant spéciquement "page"  
└── main.ts
              
``` 
 

## SASS

Chaque page et composant est doté d'un fichier [scss](https://sass-lang.com/).


    // -----------------------------------------------------------------------------  IMPORT
    
    // importe le point de sortie de toutes les mixins et libs 
    
    // common style & mixins
    @import '../../../common/_common';
    
    // -----------------------------------------------------------------------------  DEBUT STYLE
    
    
    // nom du block composant (généré par le scaffolding, NE PAS CHANGER)
    .homePage
    {
      // --------------------------------------------------------------------------- PROPERTIES
    
    
        Variable définie dans le but d'avoir la possibilité d'appeler le nom du block n'importe ou dans le fichier
        
        // Call block element anywhere. Use it like this : .#{$this}_element
        $this : homePage;
    
      // --------------------------------------------------------------------------- BLOCK
    
      Déclarer ici uniquement les propriétés SCSS relative au block.
      !!! IMPORTANT !!!
      Ne jamais positionner un block ici ! toujours le poisitionner depuis son parent pour une meilleure réutilisation du composant
    
      // --------------------------------------------------------------------------- ELEMENTS
    
      Déclarer ici les propriétés des éléments du block :
      (Le saviez vous ? En scss, le signe "&" permet de dupliquer la class parent.
      
      ex : 
         
          &_header
          {
      
          }
          
          deviendra donc à la compilation : 
          
          .homePage_header 
          {
          
          }
    
      // --------------------------------------------------------------------------- MODIFIERS
          
      &_header
      {
           &-bleu
           {
                color : blue;
           }
      }
           
      deviendra a la compilation : 
      
      .homePage_header-blue
      {
        color: blue;
      }
      
    
      // --------------------------------------------------------------------------- CHILDREN
    
      // --------------------------------------------------------------------------- PATCHES


