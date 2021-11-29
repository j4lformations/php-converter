<?php
session_start();

//On teste si l'utilisateur s'est logué
if (empty($_SESSION['login'])) {
    header('Location:login.php');
    exit();
}

//On recupere le login et mdp
$login = $_SESSION['login'];
$mdp = $_SESSION['mdp'];

//S'ils ne sont pas matchés, on est redirigé
if (($mdp !== "123456") || ($login !== strtolower('Joachim'))) {
    header('Location:login.php');
    exit();
}

//On recupere les saisies de l'utilisateur
if (!empty($_POST['celsius'])) {
    $celsius = $_POST['celsius'];

    if (is_numeric($celsius)) {
        $farhenheit = $celsius * 9 / 5 + 32;
    }
}

require_once 'pages/header.php';
?>
    <div class="container">
        <header>
            projet converter
        </header>
        <main>
            <div class="card">
                <div class="card-header">converter page</div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="celsius">Valeur en °C</label>
                            <input type="text" class="form-control"
                                   placeholder="Entrez la valeur de la temperature en °C"
                                   id="celsius"
                                   name="celsius"/>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-valider">Valider</button>
                            <button type="reset" class="btn btn-reset float-right">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="message">
                <?php
                    if (!empty($celsius) && is_numeric($celsius)) {
                        echo "<div id='resultat'>$celsius °C = $farhenheit °F</div>";
                    } elseif (!empty($celsius) && !is_numeric($celsius)) {
                        echo "<div id='erreur'>Attention à votre saisie, un nombre est attendu</div>";
                    }
                ?>
            </div>
        </main>
    </div>
<?php
require_once 'pages/footer.php'
?>