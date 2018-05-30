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


// -----------------------------------------------------------------------------  TIMBER

// activer Timber (twig WP extension)
require_once(__DIR__ . '/vendor/autoload.php');
$timber = new \Timber\Timber();

// dep
use Symfony\Component\Yaml\Yaml;
//use Symfony\Component\Yaml\Parser;
//use Symfony\Component\Yaml\Exception\ParseException;


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

        // dictionary
        $url = __DIR__ . '/src/common/dictionary/FR.json';
        $dicoContent = file_get_contents($url);
        $dico = json_decode($dicoContent);

//        $url = '/src/common/dictionary/FR.yaml';
//        $dico = Yaml::parseFile($url);
//        $dico = Yaml::parse(file_get_contents($url));

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


/**
 * Set FR locale
 */
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
/*** clean ups and enhancements, uncomment to use */
//require_once('functions/custom_post_types.php');

/**
 * This theme uses wp_nav_menus() for the header menu, utility menu and footer menu.
 */
//register_nav_menus(array(
//    'primary' => __('Primary Menu', 'adm')
//));

/**
 * Custom images formats def
 */
add_image_size('coworker-list-item', 172, 174, true);
add_image_size('blog-list', 220, 200, true);
add_image_size('coworker-banner', 690, 200, array('center', 'center'));


// This theme uses wp_nav_menu() in one location.
register_nav_menu('primary', __('Primary Menu', 'themename'));


/* Change the lenght of the excerpt */

if (!function_exists('twentyeleven_excerpt_length')) {

    function twentyeleven_excerpt_length($length)
    {
        return 30;
    }
}
add_filter('excerpt_length', 'twentyeleven_excerpt_length');

/**
 * Returns a "Continue Reading" link for excerpts
 */

if (!function_exists('twentyeleven_continue_reading_link')) {

    function twentyeleven_continue_reading_link()
    {
        return ' <span class="readmore"><a title="' . get_the_title() . '" href="' . esc_url(get_permalink()) . '"><span class="icon-arrow-right-3" > </span>Lire la suite</a></span>';
    }
}
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyeleven_continue_reading_link()
 */

if (!function_exists('twentyeleven_auto_excerpt_more')) {

    function twentyeleven_auto_excerpt_more($more)
    {
        return ' &hellip;' . twentyeleven_continue_reading_link();
    }
}

add_filter('excerpt_more', 'twentyeleven_auto_excerpt_more');

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 */

if (!function_exists('twentyeleven_custom_excerpt_more')) {

    function twentyeleven_custom_excerpt_more($output)
    {
        if (has_excerpt() && !is_attachment()) {
            $output .= twentyeleven_continue_reading_link();
        }
        return $output;
    }
}
add_filter('get_the_excerpt', 'twentyeleven_custom_excerpt_more');


/**************** Adding some html5 functionnalities to comments************/

add_filter('comment_form_default_fields', 'twentytenfive_comments');
if (!function_exists('twentytenfive_comments')) {

    function twentytenfive_comments()
    {

        $req = get_option('require_name_email');

        $fields = array(
            'author' => '<p>' . '<label for="author">' . __('Name', 'themename') . '</label> ' . ($req ? '<span>*</span>' : '') .
                '<input id="author" name="author" type="text" value="' . '" size="30"' . ' placeholder =' . __('"What shall we call you?"', 'themename') . ($req ? ' required' : '') . '/></p>',

            'email' => '<p><label for="email">' . __('Email', 'themename') . '</label> ' . ($req ? '<span>*</span>' : '') .
                '<input id="email" name="email" type="email" value="' . '" size="30"' . ' placeholder =' . __('"Leave us a valid email adress"', 'themename') . ($req ? ' required' : '') . ' /></p>',

            'url' => '<p><label for="url">' . __('Website', 'themename') . '</label>' .
                '<input id="url" name="url" type="url" value="' . '" size="30" placeholder=' . __('"Have you got a nice website ?"', 'themename') . '/></p>'

        );
        return $fields;
    }
}

add_filter('comment_form_field_comment', 'twentytenfive_commentfield');
if (!function_exists('twentytenfive_commentfield')) {

    function twentytenfive_commentfield()
    {
        $commentArea = '<p><label for="comment">' . __('Comment', 'themename') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required placeholder =' . __('"What\'s in your mind ?"', 'themename') . '  ></textarea></p>';
        return $commentArea;
    }
}

/** Adding html5 functionnalities to searchform ***/
if (!function_exists('html5_search_form')) {
    function html5_search_form($form)
    {
        $form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
		<p><label class="screen-reader-text" for="s">' . __('Search for:', 'themename') . '</label>
		<input type="search" value="' . get_search_query() . '" name="s" id="s"  autocomplete="on" placeholder =' . __('"What are you looking for?"', 'themename') . ' />
		<input type="submit" id="searchsubmit" value="' . esc_attr__('Search') . '" />
		</p>
		</form>';
        return $form;
    }
}

add_filter('get_search_form', 'html5_search_form');


/** we need a second form not to duplicate ids on the search result page when there is no results */
if (!function_exists('get_search_form_HTML5_bis')) {
    function get_search_form_HTML5_bis()
    {
        echo '<form role="search" method="get" id="searchform_bis" action="' . home_url('/') . '" >
		<p><label class="screen-reader-text" for="s2">' . __('Search for:', 'themename') . '</label>
		<input type="search" value="' . get_search_query() . '" name="s" id="s2"  autocomplete="on" placeholder =' . __('"What are you looking for?"', 'themename') . ' />
		<input type="submit" id="searchsubmit_bis" value="' . esc_attr__('Search', 'themename') . '" />
		</p>
		</form>';
    }
}


/*** Add a login stylesheet and a wordpress specifiq stylesheet------------
 * Special thanks to Valentin Brandt :
 * http://www.geekeries.fr/snippet/personnaliser-interface-ui-wordpress-3-2/
 * comment code if not needed -----------*/

if (!function_exists('gk_ui_wp32_login')) {
    function gk_ui_wp32_login()
    {
        echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/custom_login.css"/>';
    }
}

if (!function_exists('gk_ui_wp32_admin')) {
    function gk_ui_wp32_admin()
    {
        wp_enqueue_style('admin', get_bloginfo('template_directory') . '/css/custom_admin.css');
    }
}

add_action('login_head', 'gk_ui_wp32_login');
add_action('admin_enqueue_scripts', 'gk_ui_wp32_admin');

// filter triggered function for apply email sends (postuler)
function set_html_content_type()
{
    return 'text/html';
}

/**
 * Get excerpt from string
 *
 * @param String $str String to get an excerpt from
 * @param Integer $startPos Position int string to start excerpt from
 * @param Integer $maxLength Maximum length the excerpt may be
 * @return String excerpt
 */
function getExcerpt($str, $startPos = 0, $maxLength = 50)
{
    if (strlen($str) > $maxLength) {
        $excerpt = substr($str, $startPos, $maxLength - 3);
        $lastSpace = strrpos($excerpt, ' ');
        $excerpt = substr($excerpt, 0, $lastSpace);
        $excerpt .= ' ...';
    } else {
        $excerpt = $str;
    }
    return $excerpt;
}

/**
 * Events custom rewrite
 *
 */
function events_custom_rewrite()
{
    add_rewrite_tag('%event_id%', '([^&]+)');
    add_rewrite_rule('^les-evenements/([0-9]+)/?', 'index.php?pagename=les-evenements&event_id=$matches[1]', 'top');
}

add_action('init', 'events_custom_rewrite');



?>
