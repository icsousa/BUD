<?php 
    session_start(); 
    unset($_SESSION['id']);
    unset($_SESSION['erro']);
    unset($_SESSION['success']);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A BUD é uma plataforma para entusiastas das corridas de karts, onde você pode registar os seus tempos, visualizar rankings e conectar-se com outros corredores.">
    <meta name="keywords" content="corrida, ranking, karting, tempos">
    <meta name="author" content="Ivo Costa Sousa">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <title>
        BUD
    </title>
</head>
<body>
    <header>
        <nav id="navbar">
            <ul class="navlinks">
                <li class="select logo">
                    <div class="sombra"></div>
                    <a href="#"><img src="logo.png"></a>
                </li>
            </ul>
            <div class="menu-items">
                <a href="#pistas"><i class="fa-solid fa-flag-checkered"></i></a>
                <a href="#com"><i class="fa-solid fa-comments"></i></a>
                <a href="perfil.php"><i class="fa-solid fa-user"></i></a>
            </div>
        </nav>   
    </header>

    <main>
        <div class="intro__container">
            <div class="slogan">
                <h1 class="animated__text">O melhor amigo do piloto <span></span></h1>
                <?php if (isset($_SESSION['email'])): ?>
                    <button class="inbutton" onclick="window.location.href='index.php#about'">Ver mais</button>
                <?php else: ?>
                    <button class="offbutton" onclick="window.location.href='singin_up.php'">Entrar</button>
                <?php endif; ?>
            </div>
        </div>

        <div class="about__container" id="about">
                <div class="tittle__about">
                    <h1>O QUE É A BUD?</h1>
                </div>
                <div class="text__about">
                    <p>"Para além de nos considerarmos o melhor amigo de todo o tipo de piloto, a BUD é muito mais do que uma simples plataforma: é um ponto de encontro para entusiastas das corridas de karts, sejam eles amadores, profissionais ou apenas apaixonados pela adrenalina das pistas."</p><br>
                    <p>"Com a BUD, os utilizadores podem registar os seus melhores tempos em diferentes pistas e comparar os seus resultados com outros pilotos, através de rankings interativos. Além disso, oferecemos um ambiente onde cada piloto pode criar o seu próprio perfil."</p><br>
                    <p>"A nossa plataforma também promove a interação entre os utilizadores, permitindo a troca de experiências, dicas de pilotagem e até a organização de eventos e campeonatos. Quer sejas um piloto experiente ou alguém que está a dar as primeiras voltas na pista, a BUD oferece as ferramentas certas para te conectares com uma comunidade vibrante e apaixonada pelo mundo do karting."</p><br>
                    <p>"Se procuras superar os teus limites, competir de forma saudável e fazer parte de algo maior, a BUD é o teu lugar. Junta-te a nós e acelera rumo à tua melhor versão na pista!"</p>
                </div>
        </div>

        <div class="spacer"></div>

        <div id="pistas" class="pistas__container">
            <div class="tittle__pistas">
                <h1>PISTAS DISPONÍVEIS?</h1>
            </div>
            <div class="pistas">
                <ul class="list-container">
                    <li class="item" id="item-1" data-link="pista.php?id=1"><span>KiviKart</span><img src="TRACKS/KIVIKART.png"></li>
                    <li class="item" id="item-2" data-link="pista.php?id=2"><span>KV - Kartódromo de Viana</span><img src="TRACKS/KV.png"></li>
                    <li class="item" id="item-3" data-link="pista.php?id=3"><span>Kartódromo Internacional de Braga</span><img src="TRACKS/BRAGA.png"></li>
                    <li class="item" id="item-4" data-link="pista.php?id=4"><span>Indoor Karting Famalicão</span><img src="TRACKS/FAMALICAO.png"></li>
                    <li class="item" id="item-5" data-link="pista.php?id=5"><span>Kartódromo de Rilhadas - Fafe</span><img src="TRACKS/FAFE.png"></li>
                </ul>
            </div>
        </div>

        <div id="com" class="com__container">
            <div class="tittle__com">
                <h1>COMO COMUNICAR?</h1>
            </div>
            <div class="t__com">
                <div class="text__com">
                    <p>"Para facilitar a comunicação entre os utilizadores, criámos um servidor no Discord e um grupo no WhatsApp. Nestes espaços, os membros podem interagir, agendar eventos e discutir diversos temas de forma eficiente e organizada."</p>
                </div>
                <div class="social-icons">
                    <a href="https://discord.gg/V9mXuY2eUv" target="_blank"  class="icon"><i class="fa-brands fa-discord"></i></a>
                    <a href="https://chat.whatsapp.com/FADU9WezBD7CQjKcIsTcxC" target="_blank"  class="icon"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="script.js"></script>
</body>
</html>