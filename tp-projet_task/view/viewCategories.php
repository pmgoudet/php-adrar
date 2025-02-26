<main>
    <div>
        <form action="" method="post">
            <label for="category">Category</label><br>
            <input type="text" name="category" id="category" required><br><br>

            <input type="submit" name="submit" value="Save"><br><br>
        </form>
        <?= $message ?>
    </div>

    <ul>
        <?= $categoriesList ?>
    </ul>
</main>