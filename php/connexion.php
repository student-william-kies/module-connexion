<?php
/* Connexion a la base de données */
$db = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
/* Démarrage de la session */
session_start();

    /* Condition if qui permet de se connecter */
    if (isset($_POST['signin'])){
        $user = htmlspecialchars(trim($_POST['login']));
        $user_password = htmlspecialchars(trim($_POST['password']));
        $error_login = 'Veuillez réessayer ! Utilisateur introuvable (Login/mot de passe incorrect).';


        $get_password = mysqli_query($db, "SELECT password FROM utilisateurs WHERE login = '" . mysqli_real_escape_string($db, $user) . "'");
        $result = mysqli_fetch_row($get_password);

        if (!$result){
            echo '<section class="alert alert-danger text-center" role="alert">' . $error_login . '</section>'; /* Utilisateur incorrect */
        }
        else{
            $check_password = $result[0];
            if (password_verify($user_password, $check_password)) {
                $check_data = mysqli_query($db, "SELECT id, login, password FROM utilisateurs WHERE login = '" . mysqli_real_escape_string($db, $user) . "' AND password = '" . mysqli_real_escape_string($db, $check_password) . "'");
                $info_user = mysqli_fetch_assoc($check_data);

                if (mysqli_num_rows($check_data)){
                    $_SESSION['id'] = $info_user['id'];
                    $_SESSION['login'] = $info_user['login'];
                    $_SESSION['password'] = $info_user['password'];

                    header('location:../index.php');
                    exit();
                }
            }
            else{
                echo '<section class="alert alert-danger text-center" role="alert">' . $error_login . '</section>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Project 2077 | Connexion</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/connexion.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>
    <body>
        <!-- Header de la page -->
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <section class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#leadUIDemoNav-3" aria-controls="leadUIDemoNav-3" aria-expanded="false" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </button>
                    <section class="collapse navbar-collapse" id="leadUIDemoNav-3">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                            <li class="nav-item"><a class="nav-link active" href="../index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="sort.php">Tirage au sort</a></li>
                            <li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>
                            <li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>
                            <li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>
                        </ul>
                    </section>
                </section>
            </nav>
        </header>

        <!-- Main de la page -->
        <main>
            <article>
                <!-- Formulaire -->
                <form action="connexion.php" method="post">
                    <section class="container log">
                        <section class="row">
                            <section class="col-md-3 log-left">
                                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                                <h3>Bonjour!</h3>
                                <p>En vous connectant, vous aurez peut etre la chance de gagné l'offre de lancement et de savoir si vous etes l'heureux(se) élus(es) !</p>
                            </section>
                            <section class="col-md-9 log-right">
                                <section class="tab-content" id="myTabContent">
                                    <section class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <h3 class="log-heading">Connectez vous !</h3>
                                        <section class="row log-form">
                                            <section class="col-md-6">
                                                <section class="form-group">
                                                    <input type="text" class="form-control" name="login" placeholder="Login *" required>
                                                </section>
                                                <section class="form-group">
                                                    <input type="password" class="form-control" name="password" placeholder="Mot de passe *" required>
                                                </section>
                                                <input type="submit" class="btnLog" name="signin"  value="Se connecter">
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>
                </form>
            </article>
        </main>

        <!-- Footer de la page -->
        <footer class="page-footer font-small">
            <section class="footer-copyright text-center py-3">© 2020 Copyright
                <a href="https://www.instagram.com/william_ksii/" target="_blank"><i class="fab fa-instagram"></i> WilliamKies</a>
            </section>
        </footer>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>