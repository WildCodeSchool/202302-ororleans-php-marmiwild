<!doctype html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $recipe['title'] ?></title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">

</head>

<body class="container">
    <main>
        <?php if (empty($recipe)) : ?>
            <div>Pas de recette</div>
        <?php else : ?>
            <h1><?= htmlentities($recipe['title']) ?></h1>
            <div>
                <?= htmlentities($recipe['description']) ?>
            </div>
        <?php endif; ?>
    </main>
    <footer>
        <a role="button" class="secondary outline" href="/">Retour</a>
    </footer>
</body>

</html>