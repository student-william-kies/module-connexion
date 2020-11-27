<?php
$db = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
session_start();

    if (isset($_POST['logout'])){
        session_destroy();
        header('location:connexion.php');
    }

    if (isset($_SESSION['id'])){
        if (isset($_POST['modify'])){
            if (isset($_POST['newLogin']) && isset($_POST['newPrenom']) && isset($_POST['newNom']) && $_POST['newPassword'] === $_POST['newConfirmPassword']){
                $new_login = htmlspecialchars(trim($_POST['newLogin']));
                $new_prenom = htmlspecialchars(trim($_POST['newPrenom']));
                $new_nom = htmlspecialchars(trim($_POST['newNom']));
                $unhashed_password = htmlspecialchars(trim($_POST['newPassword']));
                $new_confirmPassword = htmlspecialchars(trim($_POST['newConfirmPassword']));
                $session_id = $_SESSION['id'];

                $update_hashed_password = password_hash($unhashed_password, PASSWORD_BCRYPT);

                $update_user = mysqli_query($db, "UPDATE utilisateurs SET login = '$new_login', prenom = '$new_prenom', nom = '$new_nom', password = '$update_hashed_password ' WHERE id = '$session_id'");

                $_SESSION['login'] = $new_login;
                $_SESSION['prenom'] = $new_prenom;
                $_SESSION['nom'] = $new_nom;
                $_SESSION['password'] = $update_hashed_password;

                if ($update_user){
                    echo '<section class="alert alert-success text-center" role="alert">Modification effectuée !</section>';
                }
                else{
                    echo '<section class="alert alert-danger text-center" role="alert">Echec de la modification, réessayer !</section>';
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Project 2077 | Profil</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/profil.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>
    <body>
        <!-- Header de la page -->
        <header>
            <section class="text-center container-fluid" style="background-color: #343a40; color: #fff;">
                <!-- Condition if qui permet si la session est défini, d'afficher bonjour et le log de l'utilisateur && un bouton déconnexion  -->
                <?php if (isset($_SESSION['id'])){ echo 'Bonjour <i class="fas fa-user-circle"></i> ' . $_SESSION['login'] . '<br /><form method="POST" action="profil.php"><input type="submit" name="logout" value="Déconnexion" class="btn btn-danger"></form>';} ?>
            </section>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <section class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#leadUIDemoNav-3" aria-controls="leadUIDemoNav-3" aria-expanded="false" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </button>
                    <section class="collapse navbar-collapse" id="leadUIDemoNav-3">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                            <li class="nav-item"><a class="nav-link active" href="../index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="admin.hp">Admin</a></li>
                            <li class="nav-item"><a class="nav-link" href="sort.php">Tirage au sort</a></li>
                            <?php
                            /* Condition if qui permet si une session est active de faire disparaitre les pages connexion et inscription */
                            if (!isset($_SESSION['id'])){
                                echo '<li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>';
                            }
                            ?>
                            <li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>
                        </ul>
                    </section>
                </section>
            </nav>
        </header>

        <!-- Main de la page -->
        <main>
            <article>
                <?php

                /* Condition if qui permet si la session est active d'afficher le formulaire de modif ou non */
                if (isset($_SESSION['id'])){
                    echo '
                    <form action="profil.php" method="post">
                    <section class="container modify">
                        <section class="row">
                            <section class="col-md-3 modify-left">
                                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                                <h3>Voici votre vitrine !</h3>
                                <p>Modifier vos informations en tout simplicité !</p>
                            </section>
                            <section class="col-md-9 modify-right">
                                <section class="tab-content" id="myTabContent">
                                    <section class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <h3 class="modify-heading">Gérer votre compte</h3>
                                        <section class="row modify-form">
                                            <section class="col-md-6">
                                                <section class="form-group">
                                                    <input type="text" class="form-control" name="newLogin" placeholder="Login *" required>
                                                </section>
                                                <section class="form-group">
                                                    <input type="text" class="form-control" name="newPrenom" placeholder="Prénom *" required>
                                                </section>
                                                <section class="form-group">
                                                    <input type="text" class="form-control" name="newNom" placeholder="Nom *" required>
                                                </section>
                                                <section class="form-group">
                                                    <input type="password" class="form-control" name="newPassword" placeholder="Mot de passe *" required>
                                                </section>
                                                <section class="form-group">
                                                    <input type="password" class="form-control" name="newConfirmPassword" placeholder="Confirmer le mot de passe *" required>
                                                </section>
                                                <input type="submit" class="btnModify" name="modify"  value="Modifier">
                                                <p>(<i>Si vous souhaitez conserver vos paramètres, renseigner les champs requis par vos données actuelles</i>)</p>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>
                </form>';
                }
                else{
                    echo '
                                <section class="jumbotron jumbotron-fluid text-center">
                                    <section class="container">
                                    <h1 class="display-4">Profil</h1>
                                    <p class="lead">Veuillez vous connecter ou vous inscrire afin d\'accéder à votre profil !</p>
                                    </section>
                                </section>
                                <img src="" alt="ErrorLog" style="">';
                }
                ?>
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
