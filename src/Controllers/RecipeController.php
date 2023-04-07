<?php

namespace App\Controllers;

use Twig\Environment;
use App\Models\RecipeModel;
use Twig\Loader\FilesystemLoader;

class RecipeController
{
    private RecipeModel $recipeModel;
    private Environment $twig;

    public function __construct()
    {
        $this->recipeModel = new RecipeModel();
        $loader = new FilesystemLoader(__DIR__ . '/../Views/');
        $this->twig = new Environment($loader);
    }

    public function list()
    {
        $recipes = $this->recipeModel->getAllRecipes();

        // Generate the web page
        echo $this->twig->render('listRecipes.html.twig', [
            'recipes' => $recipes,
        ]);
    }

    private function validate(array $recipe): array
    {
        if (empty($recipe['title'])) {
            $errors[] = 'Le titre de la recette est obligatoire';
        }

        $maxTitleLength = 255;
        if (mb_strlen($recipe['title']) > $maxTitleLength) {
            $errors[] = 'Le titre de la recette doit faire moins de ' . $maxTitleLength . ' caractères';
        }

        if (empty($recipe['description'])) {
            $errors[] = 'La description de la recette est obligatoire';
        }

        return $errors;
    }

    public function edit(int $id)
    {
        $recipe = $this->recipeModel->getRecipeById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // nettoyage
            $recipe = array_map('trim', $_POST);
            $errors = $this->validate($recipe);

            // si tout est ok
            if (empty($errors)) {
                $recipe['id'] = $id;
                $this->recipeModel->update($recipe);
                // redirection en GET (qui vide le POST)
                header('Location: /');
                exit();
            }
        }

        // Generate the web page
        echo $this->twig->render('editRecipe.html.twig', [
            'errors' => $errors ?? [],
            'recipe' => $recipe,
        ]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // nettoyage
            $recipe = array_map('trim', $_POST);
            $errors = $this->validate($recipe);

            // si tout est ok
            if (empty($errors)) {
                $this->recipeModel->saveRecipe($recipe);
                // redirection en GET (qui vide le POST)
                header('Location: /');
                exit();
            }
        }

        // Generate the web page
        echo $this->twig->render('addRecipe.html.twig', [
            'errors' => $errors ?? [],
            'recipe' => $recipe ?? [],
        ]);
    }

    public function show(int $id)
    {
        $recipe = $this->recipeModel->getRecipeById($id);

        // Generate the web page
        require __DIR__ . '/../Views/showRecipe.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $this->recipeModel->remove($id);
        }

        header('Location: /');
    }
}
