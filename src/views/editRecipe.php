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
        <h1>Modifier une recette</h1>
        <?php if (!empty($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
        <?php $buttonName = 'Editer' ?>
        <?php include '_form.php' ?>

        <footer>
            <a role="button" class="secondary outline" href="/">Retour</a>
        </footer>
    </main>
</body>

</html>
