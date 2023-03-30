<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">

</head>

<body class="container">
    <main>
        <h1>Ajouter une recette</h1>
        <?php if (!empty($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
        <form action="" method="POST" novalidate>
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" value="<?= $recipe['title'] ?? '' ?>" required>

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" required><?= $recipe['description'] ?? '' ?></textarea>

            <button>Ajouter</button>
        </form>
        <footer>
            <a role="button" class="secondary outline" href="/">Retour</a>
        </footer>
    </main>
</body>

</html>