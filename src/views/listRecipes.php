<!doctype html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>List of Recipes</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="container">
    <main >
        <header>
            <h1>List of Recipes</h1>
        </header>

        <ul>
            <?php foreach ($recipes as $recipe) : ?>
                <li>
                    <a href="detail-recette?id=<?= $recipe['id'] ?>">
                        <?= htmlentities($recipe['title']) ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>


    </main>
    <footer>
        <a role="button" href="/ajouter-recette">Ajouter</a>

    </footer>
</body>

</html>