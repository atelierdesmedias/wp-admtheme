# Scaffolder

Un système de création de **page** et de **composant** est intégré au projet via gulp.

7. Tester le système de scaffolding développé avec gulp permettant de créer une page
ou un composant : 
  
    ```shell
    // créer une page 
    npm run scaff 
    // selectionner page 
    // donner un nom en camelCase au composant page  
    ```       
   aller voir dans le dossier [src/project/pages/](../src/project/pages/) si le composant à bien été créé : 
   
 
    ```shell
    src/                         
    ├── ...                
    ├── project/                       
    │       └── monComposantPage          
    │              |── monComposantPage.scss      # → feuille de style sass     
    │              └── monComposantPage.ts        # → fichier ts relatif à ce composant          
    ```
