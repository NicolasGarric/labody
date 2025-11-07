<?php
/**
 * Template Name: Homepage
 * web/app/themes/localdy/homepage.php
 */
use Timber\Timber;

$context = Timber::context();

$defaults = [
  'header' => [
    'title_hidden'       => "Envie de vous faire plaisir ?",
    'title_image'        => null,
    'title_image_mobile' => null,
  ],
  'slider' => ['cards' => []],
];

$hp = Timber::get_posts([
  'post_type'      => 'homepage',
  'posts_per_page' => 1,
  'post_status'    => 'publish',
]);

$overrides = [];
if (!empty($hp)) {
  $context['post'] = $hp[0];
  $overrides = $hp[0]->meta('homepage') ?: [];
}

$context['data'] = array_replace_recursive($defaults, $overrides);

Timber::render('pages/homepage.twig', $context);
