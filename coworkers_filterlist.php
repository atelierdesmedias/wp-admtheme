<ul id="coworkers-filterlist">
    <?php
    // no default values. using these as examples
    $taxonomies = array( 'adm_coworker_tag');
    $args = array(
        'orderby'           => 'name',
        'order'             => 'ASC',
        'hide_empty'        => true,
        'exclude'           => array(),
        'exclude_tree'      => array(),
        'include'           => array(),
        'number'            => '',
        'fields'            => 'all',
        'slug'              => '',
        'parent'            => '',
        'hierarchical'      => true,
        'child_of'          => 0,
        'get'               => '',
        'name__like'        => '',
        'description__like' => '',
        'pad_counts'        => false,
        'offset'            => '',
        'search'            => '',
        'cache_domain'      => 'core'
    );
    $terms = get_terms($taxonomies, $args);
    foreach ($terms as $term):
        if($term->count > 0): ?>
            <li class="coworkers-filterlist-item "><a class="<?php if($wp_query->query_vars['adm_coworker_tag'] == $term->slug): ?>active<?php endif; ?>" href="<?= get_bloginfo('url') . '/' . 'les-coworkers' . '/' . $term->slug; ?>"><?= $term->name; ?></a></li>
        <?php endif;
    endforeach; ?>
</ul>