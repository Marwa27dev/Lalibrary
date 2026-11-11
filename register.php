<?php
include 'headers/header1.php';
include 'config.php';

$message = '';
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['phone'];
    $email = $_POST['email'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
    $role = '';

    $a = explode('@', $email);
    if (isset($a[1]) && $a[1] === 'admin.com') {
        $role = 'admin';
    } else {
        $role = 'user';
    }

    $sql = "INSERT INTO users (nom, prenom, adresse, tel, email, pwd, role_) VALUES ('$nom','$prenom','$adresse','$tel','$email','$pwd','$role')";
    $stmt = $cnx->query($sql);

    if ($stmt) {
        header('Location: login.php');
        exit();
    } else {
        $message = 'Erreur lors de l\'inscription.';
    }
}
?>
<main class="auth-page">
    <section class="auth-card auth-card-register">
        <div class="auth-visual">
            <span class="auth-kicker">LaLibrary</span>
            <h1>Creer votre carte lecteur.</h1>
            <p>Inscrivez-vous pour commander vos livres favoris et retrouver votre historique.</p>
        </div>
        <div class="auth-form">
            <?php if (!empty($message)) : ?>
                <div class="alert alert-danger" role="alert"><?= $message ?></div>
            <?php endif; ?>
            <form action="register.php" method="post">
                <span class="auth-kicker">Inscription</span>
                <h2>Nouveau compte</h2>
                <p class="auth-subtitle">Remplissez les informations de votre profil.</p>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" required>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="phone">Telephone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" required>
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Enregistrer">
            </form>
            <div class="dropdown-divider"></div>
            <p class="auth-link">Vous avez deja un compte? <a href="login.php">Connectez-vous</a></p>
        </div>
    </section>
</main>
<script src="assets/library-pro.js"></script>
</body>
</html>
