<?php

require_once(__DIR__.'/CustomType.php');

class AdmCoworker extends CustomType {

    protected $plugin = 'adm';
    protected $id = 'coworker';
    protected $description = 'Fiche des coworkers';
    protected $name = 'Coworkers';
    protected $singular_name = 'Coworker';
    protected $supports = array( 'title', 'thumbnail' );

    protected $fields = array(
        'contact' => array( 
            'label' => 'Contact',
            'fields' => array(
                'first_name' => 'Prénom',
                'last_name' => 'Nom',
                'company' => 'Entreprise',
                'Phone1' => 'Téléphone fixe perso',
                'Phone2' => 'Téléphone mobile perso',
                'Phone3' => 'Téléphone mobile pro',
                'address' => 'Adresse',
                'email' => 'E-mail perso',
                'emailpro' => 'E-mail professionnel',
                'website1' => 'Site web 1',
                'website2' => 'Site web 2',
                'website3' => 'Site web 3',
                'metier' => 'Métier'
            )
        ),

        'description' => array(
            'label' => 'Description',
            'fields' => array(
                'public_quiesttu' => 'Qui es-tu ?',
                'public_quefaistu' => 'Que fais-tu ?',
                'public_pourquoicoworking' => 'Pourquoi le coworking ?',
                'public_enable' => 'Profil public ?'
            )
        ),

        'social' => array(
            'label' => 'Sur le web',
            'fields' => array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'viadeo' => 'Viadeo',
                'linkedin' => 'Linkedin',
                'Skype' => 'Skype',
                'Pinterest' => 'Pinterest',
                'GooglePlus' => 'GooglePlus'
            )
        )
    );
    protected $columns = array(
        'title' => 'Titre',
        'first_name',
        'last_name'
    );
}