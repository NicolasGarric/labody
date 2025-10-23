<?php
use Timber\Timber;
use Timber\Site;

if ( ! class_exists( \Timber\Timber::class ) ) {
  add_action('admin_notices', function() {
    echo '<div class="error"><p>Timber n’est pas chargé. Assure-toi d’avoir installé timber/timber via Composer.</p></div>';
  });
  return;
}

add_filter('timber/twig/environment/options', function ($options) {
  $options['cache'] = false;
  $options['auto_reload'] = true;
  return $options;
});


class LocaldySite extends Site {
  public function __construct() {
    // Dossiers Twig
    Timber::$dirname = ['views', 'views/layouts', 'views/pages'];

    // Supports utiles
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');

    // Contexte global
    add_filter('timber/context', [$this, 'add_to_context']);

    parent::__construct();
  }

  public function add_to_context($context) {
    $context['site'] = $this;
    return $context;
  }
}
new LocaldySite();

add_action('init', function () {
  register_post_type('homepage', [
    'label'        => 'Homepages',
    'labels'       => [
      'singular_name' => 'Homepage',
      'add_new_item'  => 'Ajouter une Homepage',
      'edit_item'     => 'Modifier la Homepage',
      'new_item'      => 'Nouvelle Homepage',
      'menu_name'     => 'Homepage',
    ],
    'public'             => true,            // ← public
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => false,           // mets true si tu veux Gutenberg/REST
    'has_archive'        => false,
    'rewrite'            => ['slug' => 'homepage', 'with_front' => false], // ← permalien propre
    'query_var'          => true,
    'exclude_from_search'=> true,
    'publicly_queryable' => true,            // ← rend accessible en front
    'supports'           => ['title','thumbnail'], // le contenu passe par ACF/Twig
    'menu_position'      => 21,
    'menu_icon'          => 'dashicons-admin-home',
    'capability_type'    => 'page',
    'map_meta_cap'       => true,
  ]);
});

