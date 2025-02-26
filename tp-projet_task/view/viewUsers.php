<main>
    <div>
        <form action="" method="post">
            <label for="name">Last name</label><br>
            <input type="text" name="name" id="name" required><br><br>
            <label for="firstname">First name</label><br>
            <input type="text" name="firstname" id="firstname" required><br><br>
            <label for="email">E-mail</label><br>
            <input type="email" name="email" id="email" required><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required><br><br>
            <label for="passwordConf">Confirm your password</label><br>
            <input type="password" name="passwordConf" id="passwordConf" required><br><br>
            <input type="submit" name="submit" value="Inscription"><br><br>
        </form>
        <?= $message ?>
    </div>

    <ul class="view">
        <?= $usersList ?>
    </ul>
</main>