<?php
session_start();

if (!empty($_POST['login'])) {
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $_SESSION['login'] = $login;
    $_SESSION['mdp'] = $mdp;
    header("Location:converter.php");
    exit();
}
require_once 'pages/header.php'
?>

    <div class="container">
        <header>
            projet converter
        </header>
        <main>
            <div class="card">
                <div class="card-header">login form</div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="login">Identifiant</label>
                            <input type="text" class="form-control" placeholder="Entrez votre identifiant" id="login"
                                   name="login"/>
                        </div>
                        <div class="form-group">
                            <label for="mdp">Mot de passe</label>
                            <input type="password" class="form-control" placeholder="Entrez votre mot de passe" id="mdp"
                                   name="mdp"/>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-valider">Valider</button>
                            <button type="reset" class="btn btn-reset float-right">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

<?php
require_once 'pages/footer.php'
?>