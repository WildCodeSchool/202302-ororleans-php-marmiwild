<form action="" method="POST" novalidate>
    <label for="title">Titre</label>
    <input type="text" id="title" name="title" value="<?= $recipe['title'] ?? '' ?>" required>

    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10" required><?= $recipe['description'] ?? '' ?></textarea>

    <button><?= $buttonName ?></button>
</form>