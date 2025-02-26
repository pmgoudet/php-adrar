<main>
    <h2><?= $title ?></h2>

    <div>
        <form action="" method="post">
            <label for="task">Task name</label><br>
            <input type="text" name="task" id="task" required><br><br>

            <label for="content">Content</label><br>
            <input type="text" name="content" id="content" required><br><br>

            <label for="category">Category</label><br>
            <select name="category" value="category">
                <?= categoryList($bdd) ?>
            </select><br><br>

            <label for="date">Date</label><br>
            <input type="date" name="date" id="date" required><br><br>

            <input type="submit" name="submit" value="Save"><br><br>
        </form>
        <?= $message ?>
    </div>

    <ul class="view">
        <?= $tasksList ?>
    </ul>


</main>