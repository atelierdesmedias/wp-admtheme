# installation


1. lancer son serveur local php

2. créer un dossier nommé "adm" (ou whatever...)

3. Le projet étant un thême wordpress, télécharger le core wordpress sur [worpdress.org](http://wordpress.org/)
et placer le contenu du dossier dézipé dans le dossier précédement créé.
 
4. Aller dans le dossier `wp-content/themes/` :
    
    ```shell
    $ cd wp-content/themes/
    ``` 

    puis cloner le projet [wp-admtheme](https://github.com/atelierdesmedias/wp-admtheme) avec ssh.

    ```shell
    $ git clone git@github.com:atelierdesmedias/wp-admtheme.git
    ```
    
    ```shell
    adm/                         
    ├── index.php               
    ├── ...   
    ├── wp-content        
    │       ├── ...          
    │       ├── plugins/        # → insller les plugins wp ici (TODO)
    │       └── themes/         # → installer le thème ici
    ├── ...        
    ```
5. se déplacer dans le dossier du thème fraichement installé :
  
   ```shell
   $ cd wp-admtheme 
   ``` 
   puis installer les dépendances front du projet via [npm](https://www.npmjs.com/)
   avec la commande bash suivante : (la liste des dépendances se trouve dans `package.json`)
  
   ```shell
   $ npm i  
   ```    

6. Une fois les dépendances installées, tester module bundler 
 
   ```shell
   // lancer webpack + devServer + hot reload
   $ npm run dev
   
   // lancer webpack avec compile des assets minifiés et optimizés
   $ npm run prod
   ```       
 
7. Tester le système de scaffolding développé avec gulp permettant de créer une page
ou un composant : 
  
    ```shell
    // créer une page 
    $ gulp scaff 
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
 
 









