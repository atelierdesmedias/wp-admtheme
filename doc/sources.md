
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
└── main.ts                     # → point de sortie JS
              
``` 
 
## SASS

Chaque page et composant est doté d'un fichier [scss](https://sass-lang.com/).
Voir l'exemple [dummyComponent.scss](../src/project/components/dummyComponent/dummyComponent.scss)


## JS (TYPESCRIPT)

Chaque page et composant est doté d'un fichier [typescript](https://www.typescriptlang.org/).
Voir [dummyComponent.scss](../src/project/components/dummyComponent/dummyComponent.ts)

Voici l'arborescence du [dummyComponent](../src/project/components/dummyComponent) : 

```shell
src/                         
├── ..                    
├── project/                   
│       └── components         
│              └── dummyComponent
│                     └── dummyComponent.scss
│                     └── dummyComponent.ts  
└── main.ts
              
``` 
 
