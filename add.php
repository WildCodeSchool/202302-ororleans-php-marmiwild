<?php
require_once 'config.php';

require __DIR__ . '/src/models/recipeModel.php';

// si on a soumis le form, on est en POST
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // nettoyage
    $recipe = array_map('trim', $_POST);

    // validation
    if(empty($recipe['title'])) {
        $errors[] = 'Le titre de la recette est obligatoire';
    }
    
    $maxTitleLength = 255;
    if(mb_strlen($recipe['title']) > $maxTitleLength) {
        $errors[] = 'Le titre de la recette doit faire moins de ' . $maxTitleLength . ' caractères';
    }

    if(empty($recipe['description'])) {
        $errors[] = 'La description de la recette est obligatoire';
    }

    // si tout est ok
    if(empty($errors)) {
        saveRecipe($recipe);
        // redirection en GET (qui vide le POST)
        header('Location: index.php');
        exit();
    }
}


// Generate the web page
require __DIR__ . '/src/views/addRecipe.php';
