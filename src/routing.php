<?php

use App\Controllers\RecipeController;

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/' === $urlPath) {
    $recipeController = new RecipeController();
    $recipeController->list();
} elseif ('/ajouter-recette' === $urlPath) {
    $recipeController = new RecipeController();
    $recipeController->add();
} elseif ('/detail-recette' === $urlPath && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $recipeController = new RecipeController();
    $recipeController->show($_GET['id']);
} elseif ('/modifier-recette' === $urlPath && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $recipeController = new RecipeController();
    $recipeController->edit($_GET['id']);
}
elseif ('/supprimer-recette' === $urlPath) {
    $recipeController = new RecipeController();
    $recipeController->delete();
}  elseif ('/contact' === $urlPath) {
    $contactController = new ContactController();
    $contactController->index();
} 
else {
    header('HTTP/1.1 404 Not Found');
    echo 'Page introuvable';
}
