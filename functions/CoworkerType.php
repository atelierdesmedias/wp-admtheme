<?php
require_once(__DIR__.'/CustomType.php');
class CoworkerType extends CustomType {
    protected $plugin = 'adm';
    protected $id = 'coworker';
    protected $description = 'Fiche des coworkers';
    protected $name = 'Coworkers';
    protected $singular_name = 'Coworker';
    protected $slug = "coworkers";
    protected $taxonomySlug = "metiers";
    protected $supports = array( 'title', 'thumbnail' );
    protected $fields = array(
        'contact' => array(
            'label' => 'Contact',
            'fields' => array(
                'first_name' => 'Prénom',
                'last_name' => 'Nom',
                'company' => 'Entreprise',
                'metier' => 'Métier',
                'phone' => 'Téléphone fixe perso',
                'phone2' => 'Téléphone mobile perso',
                'phone3' => 'Téléphone mobile pro',
                'address' => 'Adresse',
                'email' => 'E-mail perso',
                'emailpro' => 'E-mail professionnel',
                'website1' => 'Site web 1',
                'website2' => 'Site web 2',
                'website3' => 'Site web 3'
            )
        ),
        'description' => array(
            'label' => 'Description',
            'fields' => array(
                'citation' => 'Citation',
                'public_quiesttu' => 'Qui es-tu ?',
                'public_quefaistu' => 'Que fais-tu ?',
                'public_pourquoicoworking' => 'Pourquoi le coworking ?',
                'public_enable' => 'Profil public ?'
            )
        ),
        'social' => array(
            'label' => 'Sur le web',
            'fields' => array(
                'facebook' => 'facebook',
                'twitter' => 'twitter',
                'viadeo' => 'viadeo',
                'linkedin' => 'linkedin',
                'Skype' => 'skype',
                'Pinterest' => 'pinterest',
                'GooglePlus' => 'googleplus'
            )
        ),
        'autres' => array(
            'label' => 'Autre informations',
            'fields' => array(
                'banner' => "ID de l'image bandeau"
            )
        )
    );
    protected $columns = array(
        'title' => 'Titre',
        'first_name',
        'last_name'
    );
}

