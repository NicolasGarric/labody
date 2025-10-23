<?php
// Page d’accueil (réglages > lecture : page statique)
require_once dirname(__DIR__, 3) . '/vendor/autoload.php';
$context = Timber\Timber::context();
$context['post'] = Timber\Timber::get_post();
Timber\Timber::render('pages/home.twig', $context);
