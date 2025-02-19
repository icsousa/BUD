<?php 
    session_start(); 

    include_once('config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['pass']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['pass']);
        header('Location: singin_up.php');
        exit();
    }

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id === 0) {
        header("Location: pistas.php");
        exit();
    }

    $viewquery = "SELECT `Posição`, `Nome`, `Melhor Tempo` FROM classificacao WHERE id = $id";
    $view = $mysqli->query($viewquery);

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
        (!empty($tempo['MelhorTempo'])) ? $bt = $tempo['MelhorTempo'] : $bt = '--:--:--.--';  // Se estiver vazio, atribui o valor padrão

    } else {
        $bt = '--:--:--.--';
    }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="style(pista).css">
    <title>BUD - <?php echo htmlspecialchars($nome); ?></title>
</head>
<body>
    <header>
        <nav>
            <ul class="navlinks">
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="home.php"> <img src="logo.png"></a></li>
                <li><a href="pistas.php">Pistas</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="form__container">

            <div class="black__container">
                <table>
                    <tr>
                        <th>Posição</th>
                        <th>Nome</th>
                        <th>Melhor Tempo</th>
                    </tr>

                    <?php
                    if ($view->num_rows > 0) {
                        while ($row = $view->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Posição"] . "</td>";
                            echo "<td class='nome'>" . $row["Nome"] . "</td>";
                            echo "<td>" . $row["Melhor Tempo"] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>

                <div class="social">
                <p>Para comunicar ou encontrar a pista, você pode acessar o site oficial ou a localização no Google Maps, disponíveis abaixo.</p>                    
                    <div class="social-icons">
                        <a href="<?php echo htmlspecialchars($website); ?>" target="_blank"  class="icon"><i class="fa-solid fa-globe"></i></a>
                        <a href="<?php echo htmlspecialchars($maps); ?>" target="_blank"  class="icon"><i class="fa-solid fa-location-dot"></i></a>
                    </div>

                </div>
            </div>

            <div class="white__container">
                <div class="trackname__container">
                    <h1>
                        <?php echo htmlspecialchars($nome); ?>
                    </h1>
                    <P>
                        <?php echo htmlspecialchars($rua . ', ' . $local .', '. $cp); ?>
                    </P>
                </div>

                <div class="tracktime__container">
                    <h3>SEU MELHOR TEMPO:</h3>
                    <p>
                        <i>
                            <?php echo htmlspecialchars($bt); ?>
                        </i>
                    </p>
                </div>

                <div class="addtracktime__container">
                    <h2>ATUALIZE O SEU TEMPO</h2>
                    <p>Por questões de segurança, caso tente atualizar seu tempo para um tempo superior, a alteração não será aplicada.</p>
                    <form class="add" action="atualizar_tempo.php" method="POST">
                        <input type="text" id="tempoInput" name="tempoInput" maxlength="11" placeholder="--:--:--.--" />
                        <button>Adicionar tempo</button>
                    </form>
                </div>

                <div class="info__container">
                    <p>Para voltar para a página das <b>PISTAS</b>, ou acessar qualquer outra página do nosso site, utilize a <i><b>"barra de navagação"</i></b> ⬆️.</p>
                </div>
                
            </div>

        </div>
    </div>

    <script src="script(pista).js"></script>

</body>
</html>