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
        'infos' => array( 
            'label' => 'Informations',
            'fields' => array(
                'first_name' => array(
                    'label' => 'Prénom'
                )
            )
        ),

        'social' => array(
            'label' => 'Social',
            'fields' => array(
                'facebook' => array(
                    'label' => 'Facebook'
                )
            )
        )
    );
    protected $columns = array(
        'title' => 'Titre',
        'first_name',
        'last-name'
    );
}