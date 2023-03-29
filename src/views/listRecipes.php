<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>List of Recipes</title>
    </head>
    <body>
        <h1>List of Recipes</h1>
        <a href="add.php">Ajouter</a>
        <ul>
            <?php foreach ($recipes as $recipe) : ?>
            <li>
                <a href="show.php?id=<?= $recipe['id'] ?>">
                    <?= htmlentities($recipe['title']) ?>
                </a>
            </li>
            <?php endforeach ?>
        </ul>
    </body>
</html>
