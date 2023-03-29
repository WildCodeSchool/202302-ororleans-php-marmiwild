<?php
require_once 'config.php';

require __DIR__ . '/src/models/recipeModel.php';
$recipes = getAllRecipes();

// Generate the web page
require __DIR__ . '/src/views/listRecipes.php';
