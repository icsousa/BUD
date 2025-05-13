<?php 
    session_start(); 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once('config.php');

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id === 0) {
        header("Location: pistas.php");
        exit();
    }
    $_SESSION['id'] = $id;
    
    $mysqli->query("SET @rownum := 0;");

    $viewquery = "
        SELECT utilizador.Nome AS `Nome`, 
               corrida.MelhorTempo AS `Melhor Tempo`
        FROM corrida
        INNER JOIN utilizador ON corrida.Nr = utilizador.Nr
        WHERE corrida.id = ?
        ORDER BY corrida.MelhorTempo ASC;
    ";

    $stmt = $mysqli->prepare($viewquery);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $view = $stmt->get_result();
    
    $data = [];
    while ($row = $view->fetch_assoc()) {
        $data[] = $row;
    }
    
    $posicao = 1;
    foreach ($data as $key => $row) {
        
        $data[$key]['Posição'] = $posicao;
        $posicao++;
    }

    $querypista = "SELECT Nome, Morada_Localidade, Morada_Rua, Morada_CodigoPostal, Website, Maps FROM pista WHERE id = ?";
    $stmt = $mysqli->prepare($querypista);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $pista = $result->fetch_assoc();

    $nome = $pista['Nome'];
    $local = $pista['Morada_Localidade'];
    $rua = $pista['Morada_Rua'];
    $cp = $pista['Morada_CodigoPostal'];
    $website = $pista['Website'];
    $maps = $pista['Maps'];

    if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
       
        $singin = $_SESSION['email'];
    
        $queryUser = "SELECT Nr FROM utilizador WHERE Email = ?";
        $stmt = $mysqli->prepare($queryUser);
        $stmt->bind_param("s", $singin);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    
        $nr = $user['Nr'];
    
        $queryTempo = "SELECT MelhorTempo FROM corrida WHERE Nr = ? AND id = ?";
        $stmt = $mysqli->prepare($queryTempo);
        $stmt->bind_param("ii", $nr, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $tempo = $result->fetch_assoc();
            (!empty($tempo['MelhorTempo'])) ? $bt = $tempo['MelhorTempo'] : $bt = '--:--:--.--';
        } else {
            $bt = '--:--:--.--'; 
        }
    }
    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="style(pista).css">
    <link rel="icon" type="image/png" href="favicon.png">
    <title>BUD - <?php echo htmlspecialchars($nome); ?></title>
</head>
<body>
    <header>
        <nav id="navbar">
            <ul class="navlinks">
                <li class="select logo">
                    <div class="sombra"></div>
                    <a href="index.php"><img src="logo.png"></a>
                </li>
            </ul>
            <div class="menu-items">
                <a href="index.php#pistas"><i class="fa-solid fa-flag-checkered"></i></a>
                <a href="index.php#com"><i class="fa-solid fa-comments"></i></a>
                <a href="perfil.php"><i class="fa-solid fa-user"></i></a>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="trackname__container">
                <div class="track">
                    <h1>
                        <?php echo htmlspecialchars($nome); ?>
                    </h1>
                    <P>
                        <?php echo htmlspecialchars($rua . ', ' . $local .', '. $cp); ?>
                    </P>
                </div>
                <?php if (isset($_SESSION['email'])): ?>
                    <div class="user">
                        <div class="tracktime__container">
                            <h3>SEU MELHOR TEMPO:</h3>
                            <div class="tracktime__content">
                                <i class="tempomostra">
                                    <?php echo htmlspecialchars($bt); ?>
                                </i>
                                <button class="trash" onclick="window.location.href='apagar_tempo.php'">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="addtracktime__container">
                            <form class="add" action="atualizar_tempo.php" method="POST">
                                <input class="input" type="text" id="tempoInput" name="tempoInput" maxlength="11" placeholder="--:--:--.--" required/>
                                <button class="inputSubmit" type="submit" name="submit">Atualizar</button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="logoff">
                        <button class="offbutton" onclick="window.location.href='singin_up.php'">Entrar</button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="ranking__container">
                <table>
                    <tr>
                        <th>Posição</th>
                        <th>Nome</th>
                        <th>Melhor Tempo</th>
                    </tr>
                    <?php
                    foreach ($data as $key => $row) {
                            echo "<tr>";
                            echo "<td>" . $row["Posição"] . "</td>";
                            echo "<td class='nome'>" . $row["Nome"] . "</td>";
                            echo "<td>" . $row["Melhor Tempo"] . "</td>";
                            echo "</tr>";
                    }
                    ?>
                </table>

                <div class="social">
                    <p>"Para comunicar ou encontrar a pista, você pode acessar o site oficial ou a localização no Google Maps, disponíveis abaixo."</p>                    
                        <div class="social-icons">
                            <a href="<?php echo htmlspecialchars($website); ?>" target="_blank"  class="icon"><i class="fa-solid fa-globe"></i></a>
                            <a href="<?php echo htmlspecialchars($maps); ?>" target="_blank"  class="icon"><i class="fa-solid fa-location-dot"></i></a>
                        </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="script(pista).js"></script>

</body>
</html>