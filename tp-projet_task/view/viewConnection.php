<main>

    <form action="" method="post">
        <label for="login">Login</label><br>
        <input type="text" name="login" id="login" required><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" name="submitConnection" value="Connect"><br>
    </form>
    <p><?= $connectionMsg ?></p>
</main>