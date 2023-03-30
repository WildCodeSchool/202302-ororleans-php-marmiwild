<?php

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/' === $urlPath) {
    browseRecipes();
} elseif('/ajouter-recette' === $urlPath) {
    addRecipe();
} elseif('/detail-recette'=== $urlPath && isset($_GET['id']) && is_numeric($_GET['id'])) {
    showRecipe($_GET['id']);
}
 else {
    header('HTTP/1.1 404 Not Found');
    echo 'Page introuvable';
}
