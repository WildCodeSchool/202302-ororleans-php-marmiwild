<?php
require_once 'config.php';

// Input GET parameter validation (integer >0)
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
if (false === $id || null === $id) {
    header("Location: /");
    exit("Wrong input parameter");
}

// Fetching a recipe from database -  assuming the database is okay
require __DIR__ . '/src/models/recipeModel.php';
$recipe = getRecipeById($id);

// Generate the web page
require __DIR__ . '/src/views/showRecipe.php';

