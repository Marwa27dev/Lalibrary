<?php
include_once "headers/header1.php";
include "config.php";

$message = '';
if (isset($_POST["connecter"])) {
    if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
        $email = $_POST['email'];
        $password = $_POST['pwd'];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $user = $cnx->query($sql)->fetch();

        if ($user && password_verify($password, $user['pwd'])) {
            $_SESSION['user'] = $user;
            header('Location: main.php');
            exit();
        } else {
            $message = 'Mauvais identifiants';
        }
    } else {
        $message = "L'email et mot de passe sont obligatoires";
    }
}
?>
<main class="auth-page">
    <section class="auth-card">
        <div class="auth-visual">
            <span class="auth-kicker">LaLibrary</span>
            <h1>Votre espace lecture.</h1>
            <p>Connectez-vous pour explorer les livres, gerer votre panier et suivre vos commandes.</p>
        </div>
        <div class="auth-form">
            <form action="login.php" method="post">
                <span class="auth-kicker">Connexion</span>
                <h2>Bienvenue</h2>
                <p class="auth-subtitle">Entrez vos informations pour continuer.</p>
                <?php if (!empty($message)) : ?>
                    <div class="alert alert-danger" role="alert"><?= $message ?></div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="exemple@email.com" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Votre mot de passe" required>
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="connecter" value="Se connecter">
            </form>
            <div class="dropdown-divider"></div>
            <p class="auth-link">Pas encore membre? <a href="register.php">Creer un compte</a></p>
        </div>
    </section>
</main>
<script src="assets/library-pro.js"></script>
</body>
</html>
