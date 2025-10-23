<?php
use Timber\Timber;

$context         = Timber::context();
$context['post'] = Timber::get_post();               // ← l’item CPT courant
$overrides       = $context['post']->meta('homepage') ?: [];

$defaults = [
  'header' => [
    'title_hidden'       => "Envie de vous faire plaisir ?",
    'title_image'        => null,
    'title_image_mobile' => null,
  ],
  'slider' => ['cards' => []],
];

$context['data'] = array_replace_recursive($defaults, $overrides);

Timber::render('pages/homepage.twig', $context);
