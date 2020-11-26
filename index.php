<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Project 2077</title>
        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
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
                            <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="php/admin.hp">Admin</a></li>
                            <li class="nav-item"><a class="nav-link" href="php/inscription.php">Inscription</a></li>
                            <li class="nav-item"><a class="nav-link" href="php/connexion.php">Connexion</a></li>
                            <li class="nav-item"><a class="nav-link" href="php/profil.php">Profil</a></li>
                        </ul>
                    </section>
                </section>
            </nav>
        </header>

        <!-- Main de la page -->
        <main>
            <article>
                <section class="container-fluid main-info-section text-center">
                    <h1>PROJECT 2077</h1>
                    <p>Vivez une aventure grandeur nature</p>
                </section>
            </article>
        </main>

        <section class="container-fluid text-center project">
            <h1>Notre projet !</h1>
            <section class="container">
                <p>Depuis de nombreux voyage sur la Lune & Saturne, l'humanité ne cesse d'accroitre ses connaissances sur ce qui nous entour. C'est alors,
                <br />qu'avec le temps, et l'argent, nous avons pu créer la société privée PROJECT 2077, et nous avons l'honneur de vous
                <br /> offrir pour notre lancement, une opportunité de voyage sur MARS d'une durée de 2 ans pour une famille entière afin de voir la population Marsienne !</p>

                <br />

                <p>Vous souhaitez vivre une aventure unique en son genre et découvrir la vie spatial de nos astronautes et voir la planète rouge ? avec PROJECT MARS, tout est possible !
                    Inscrivez-vous sur le notre site et vous serait automatiquement participant du concours visant à gagnez 2 ans sur la fameuse planète Mars !</p>
            </section>
        </section>

        <section class="container-fluid text-center carousel-section">
            <h1>Quelques images Marsiennes</h1>
            <p>Voici ce que vous pouvez voir et visiter sur Mars !</p>
            <section class="container">
                <section class="carousel slide" id="main-carousel" data-ride="carousel">
                    <ol class="carousel-indicators" hidden>
                        <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#main-carousel" data-slide-to="1"></li>
                        <li data-target="#main-carousel" data-slide-to="2"></li>
                        <li data-target="#main-carousel" data-slide-to="3"></li>
                    </ol>

                    <section class="carousel-inner">
                        <section class="carousel-item active">
                            <img class="d-block img-fluid" src="images/carousel1.svg" alt="">
                        </section>
                        <section class="carousel-item">
                            <img class="d-block img-fluid" src="images/carousel2.svg" alt="">
                        </section>
                        <section class="carousel-item">
                            <img class="d-block img-fluid" src="images/carousel3.svg" alt="">
                        </section>
                        <section class="carousel-item">
                            <img src="images/carousel4.svg" alt="" class="d-block img-fluid">
                        </section>
                    </section>
                </section>
            </section>
        </section>


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