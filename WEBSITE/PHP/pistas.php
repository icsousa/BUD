<?php 
    session_start(); 

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['pass']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['pass']);
        header('Location: singin_up.php');
    }

    $singin = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">
    <link rel="stylesheet" href="swiper-bundel.min.css">
    <link rel="stylesheet" href="style(pistas).css">
    <title>BUD - PISTAS</title>
</head>
<body>
    <header>
        <nav>
            <ul class="navlinks">
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="home.php"> <img src="logo.png"></a></li>
                <li class="select"><a href="pistas.php">Pistas</a></li>
            </ul>
        </nav>
    </header>

    <section class="container">
        <div class="card__container swiper">
            <div class="card__content">
                <div class="swiper-wrapper">
                    <article class="card__article swiper-slide">
                        <div class="card__img">
                            <img src="TRACKS/KIVIKART.png" class="trackimg">
                        </div>
    
                        <div class="card__data">
                            <h3 class="trackname">KIVIKART</h3>
                            <p class="trackloc">
                                Cais Novo, Darque, 4935
                            </p>
                            <a href="#" class="card__button">Ver Tempos</a>
                        </div>
    
                    </article>
    
                    <article class="card__article swiper-slide">
                        <div class="card__img">
                            <img src="TRACKS/KV.png" class="trackimg">
                        </div>
    
                        <div class="card__data">
                            <h3 class="trackname">KV - Kartódromo de Viana</h3>
                            <p class="trackloc">
                                Lugar da Areia, Chafé, 4935
                            </p>
                            <a href="#" class="card__button">Ver Tempos</a>
                        </div>
    
                    </article>
    
                    <article class="card__article swiper-slide">
                        <div class="card__img">
                            <img src="TRACKS/BRAGA.png" class="trackimg">
                        </div>
    
                        <div class="card__data">
                            <h3 class="trackname">Kartódromo Internacional de Braga</h3>
                            <p class="trackloc">
                                Palmeira, Palmeira, 4700
                            </p>
                            <a href="#" class="card__button">Ver Tempos</a>
                        </div>
    
                    </article>
    
                    <article class="card__article swiper-slide">
                        <div class="card__img">
                            <img src="TRACKS/FAMALICAO.png" class="trackimg">
                        </div>
    
                        <div class="card__data">
                            <h3 class="trackname">Indoor Karting Famalicão</h3>
                            <p class="trackloc">
                                Famalicão Central Park Lugar do Xisto, Vila Nova de Famalicão, 4760
                            </p>
                            <a href="#" class="card__button">Ver Tempos</a>
                        </div>
    
                    </article>
                </div>
            </div>
        </div>
    </section>

    <script src="swiper-bundel.min.js"></script>
    <script src="main(pistas).js"></script>

</body>
</html>