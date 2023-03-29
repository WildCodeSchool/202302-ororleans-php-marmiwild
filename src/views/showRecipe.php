<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $recipe['title'] ?></title>
</head>

<body>
    <a href="/">Home</a>
    <?php if (empty($recipe)) : ?>
        <div>Pas de recette</div>
    <?php else : ?>
        <h1><?= htmlentities($recipe['title']) ?></h1>
        <div>
            <?= htmlentities($recipe['description']) ?>
        </div>
    <?php endif; ?>
</body>

</html>