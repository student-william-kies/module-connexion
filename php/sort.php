<?php
/* Démarrage de la session */
session_start();

/* Condition if qui permet si le formulaire de logout est défini, de pouvoir se déconnecter */
if (isset($_POST['logout'])){

    session_destroy();
    header('location:connexion.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Project 2077| Tirage au sort</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/sort.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>
    <body>
        <!-- Header de la page -->
        <!-- Header de la page -->
        <header>
            <section class="text-center container-fluid" style="background-color: #343a40; color: #fff;">
                <!-- Condition if qui permet si la session est défini, d'afficher bonjour et le log de l'utilisateur && un bouton déconnexion  -->
                <?php if (isset($_SESSION['id'])){ echo 'Bonjour <i class="fas fa-user-circle"></i> ' . $_SESSION['login'] . '<br /><form method="POST" action="sort.php"><input type="submit" name="logout" value="Déconnexion" class="btn btn-danger"></form>';} ?>
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
                <section class="jumbotron jumbotron-fluid text-center">
                    <section class="container">
                        <h1 class="display-4">Tirage au sort</h1>
                        <p class="lead">Le tirage n'a pas encore eu lieu ! Patientez encore quelques temps et vous aurez peut etre une chance de remporté 2 ans de vie Marsienne !</p>
                    </section>
                </section>
                <img src="../images/mars-trip.svg" alt="Voyages vers Mars" style="width: 30%; margin-left: 34%;">;
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
