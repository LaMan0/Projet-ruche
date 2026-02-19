<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet ruche</title>
    <link rel="icon" type="image/png" href="images/abeille.png">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- important pour responsive -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<div class="p-2 mb-2 bg-dark text-white">

    <div class="container mt-4">
        <div class="row">
            <div class="p-2 bg-secondary bg-opacity-20 border border-light rounded-pill">
                <h1 class="text-center">Projet grand oral de SIN 2024-2025</h1>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">

            <!-- Widget météo -->
            <div class="col-12 col-lg-3 mb-3"> 
                <script src="https://static.elfsight.com/platform/platform.js" async></script>
                <div class="elfsight-app-3227014b-94f6-4026-8d98-c48d8fb4b18c" data-elfsight-app-lazy></div>
            </div>

            <!-- Vidéo YouTube responsive -->
            <div class="col-12 col-lg-7 mb-3">
                <?php
                    $url = "https://youtu.be/Bg0sCIVuv-E";
                    $videoId = basename(parse_url($url, PHP_URL_PATH));
                    $embedUrl = "https://www.youtube.com/embed/" . $videoId;
                ?>
                <div class="ratio ratio-16x9 rounded-4 overflow-hidden">
                    <iframe src="<?= $embedUrl ?>" allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <!-- Tableau données -->
        <table class="table table-dark mt-4">
            <tr class="table-active">
                <td>La température intérieure est de :
                <?php
                    include('identifiants.php');

                    $link = mysqli_connect($host, $user, $pass, $bdd);
                    if (!$link) {
                        die("Erreur connexion MySQL : " . mysqli_connect_error());
                    }

                    mysqli_set_charset($link, "utf8");

                    function afficherValeur($link, $champ) {
                        $query = "SELECT $champ FROM projet_ruche ORDER BY date DESC LIMIT 1";
                        $result = mysqli_query($link, $query);
                        if ($row = mysqli_fetch_assoc($result)) {
                            return $row[$champ];
                        } else {
                            return "Aucune donnée";
                        }
                    }

                    echo afficherValeur($link, "temp_int") . " °C";
                ?>
                </td>

                <td>Le poids de la ruche est de :
                    <?= afficherValeur($link, "poids") ?> kg
                </td>

                <td>Le pourcentage de la batterie est de :
                    <?= afficherValeur($link, "tension_batterie") ?> %
                </td>
            </tr>

            <tr>
                <td>L'humidité intérieure est de :
                    <?= afficherValeur($link, "h_int") ?> %
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <p class="text-end fst-italic" style="color: grey">
            Projet réalisé par : NONY Maé; PREASCA Daniel; ROUILLARD Nathan TSTI2D2
        </p>
    </div>
</div>
</body>
</html>
