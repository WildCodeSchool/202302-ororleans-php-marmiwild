<?php

namespace App\Models;

use PDO;

class RecipeModel
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
    }

    public function getAllRecipes(): array
    {
         // Fetching all recipes from database - assuming the database is okay
        $statement = $this->pdo->query('SELECT id, title FROM recipe');

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getRecipeById(int $id): array|false
    {
        $query = 'SELECT id, title, description FROM recipe WHERE id=:id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function saveRecipe(array $recipe): void
    {

        $query = "INSERT INTO recipe (title, description) VALUES (:title, :description)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':title', $recipe['title']);
        $statement->bindValue(':description', $recipe['description']);
        $statement->execute();
    }

    public function update(array $recipe): void
    {
        $query = "UPDATE recipe SET title=:title, description=:description WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':title', $recipe['title']);
        $statement->bindValue(':id', $recipe['id']);
        $statement->bindValue(':description', $recipe['description']);
        $statement->execute();
    }

    public function remove(int $id) 
    {
        $query = "DELETE FROM recipe WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id);

        $statement->execute();
    }
}
