<?php
// -----------------------------------------------------------------------------  LOAD SCRIPTS

/**
 * Gestion de chargement assets JS et CSS
 *
 * Logic : en production, webpack est configuré pour générer un fichier "manifest.json"
 * qui contient les noms (avec hash) des assets compilés.
 *
 * Si ce fichier existe : enregistrer le chargement de ces scripts via
 * "wp_register_style" et "wp_register_script" de WP.
 * Si non, en mode développement : servire uniquement le fichier JS sur le port par
 * defaut de webpack dev server http://localhost:4321/
 *
 */
function load_scripts() {

    // get du fichier manifest
    $manifest =  dirname(__FILE__).'/assets/manifest.json';

    // Si le fichier "manifest.json" existe, chercher le nom du fichier généré
    if (realpath($manifest)) {

        // check le content de manifest
        $content = file_get_contents($manifest);
        $json = json_decode($content);
        $css = '/assets/'.$json->{"apps.css"};
        $js = '/assets/'.$json->{"apps.js"};

        // register
        wp_register_style( 'css', get_template_directory_uri() . $css , array(), '', 'all' );
        wp_register_script( 'js', get_template_directory_uri() . $js , array(), '', true );
        wp_enqueue_style( 'css' );
        wp_enqueue_script( 'js' );

    // si le fichier "manifest.json" n'existe pas
    } else {

        $js = '/assets/apps.js';
        // en mode development, les assets sonts servis sur http://localhost:4321/ par webpack
        wp_register_script( 'js', 'http://localhost:4321' . $js , array(), '', true );
        wp_enqueue_script( 'js' );

    };

}
add_action('wp_enqueue_scripts', 'load_scripts', 10);

/**
 * Supprimer les scripts inutils ajoutés par WP
 */
function remove_wp_scripts() {
    // désactiver les scripts suivants :
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
}
add_action('wp_enqueue_scripts', 'remove_wp_scripts', 10);


// -----------------------------------------------------------------------------  DEP

use Symfony\Component\Yaml\Yaml;
//use Symfony\Component\Yaml\Parser;
//use Symfony\Component\Yaml\Exception\ParseException;


// -----------------------------------------------------------------------------  TIMBER

// activer Timber (twig WP extension)
require_once(__DIR__ . '/vendor/autoload.php');
$timber = new \Timber\Timber();


// -----------------------------------------------------------------------------  INIT SITE PROPERTIES

/**
 * Class StarterSite
 */
class StarterSite extends \Timber\Site
{

    function __construct()
    {
        add_theme_support( 'post-formats' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'menus' );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
//        add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
        add_filter( 'timber_context', array( $this, 'add_to_context' ) );
        add_action( 'init', array( $this, 'register_post_types' ) );
        add_action( 'init', array( $this, 'register_taxonomies' ) );
        parent::__construct();
    }

    function register_post_types() {
        //this is where you can register custom post types
    }

    function register_taxonomies() {
        //this is where you can register custom taxonomies
    }

    function add_to_context( $context ) {

        $dico = json_decode( file_get_contents(__DIR__ . '/src/common/dictionary/FR.json'));
//         $dico = Yaml::parseFile(__DIR__ . '/src/common/dictionary/FR.yml');

        // dico
        $context['dico'] = $dico;

        // menu
        $context['menu'] = new Timber\Menu();

        // site context
        $context['site'] = $this;
        return $context;
    }

    function add_to_twig( $twig ) {
        /* this is where you can add your own functions to twig */
        $twig->addExtension( new Twig_Extension_StringLoader() );
        // $twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
        return $twig;
    }

}

/**
 * Instance staterSite
 */
new StarterSite();


// -----------------------------------------------------------------------------  CONFIG



?>
