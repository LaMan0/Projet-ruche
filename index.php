<!DOCTYPE html>
<html>
    <head>
        <title>Projet ruche</title>
        <link rel="icon" type="image/png" href="images/abeille.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="p-2 mb-2 bg-dark text-white">

            <div class="container mt-5"> 
                <div class="row">
                    <div class="p-1 bg-secondary bg-opacity-20 border border-light rounded-pill">
                        <div class="col-sm-12">
                            <h1 class="text-center">Projet grand oral de SIN 2024-2025</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">

                    <div class="col-sm-1"></div>

                    <div class="col-sm-3"> 
                        <script src="https://static.elfsight.com/platform/platform.js" async></script>
                        <div class="elfsight-app-3227014b-94f6-4026-8d98-c48d8fb4b18c" data-elfsight-app-lazy></div>
                    </div>

                    <div class="col-sm-1"></div>

                    <div class="col-sm-7">
                        <?php
                            $url = "https://youtu.be/Bg0sCIVuv-E";
                            $videoId = basename(parse_url($url, PHP_URL_PATH));
                            $embedUrl = "https://www.youtube.com/embed/" . $videoId;
                        ?>
                        <iframe src="<?= $embedUrl ?>" width="560" height="315" allowfullscreen class="rounded-4"></iframe>
                    </div>

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

                                $query = "SELECT temp_int FROM projet_ruche ORDER BY date DESC LIMIT 1";
                                $result = mysqli_query($link, $query);

                                if ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['temp_int'] . " °C";
                                } else {
                                    echo "Aucune donnée";
                                }
                                ?>
                            </td>

                            <td>Le poids de la ruche est de :
                            <?php
                                $query = "SELECT poids FROM projet_ruche ORDER BY date DESC LIMIT 1";
                                $result = mysqli_query($link, $query);

                                if ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['poids'] . " kg";
                                } else {
                                    echo "Aucune donnée";
                                }
                                ?>
                            </td>

                            <td>Le pourcentage de la batterie est de :
                            <?php
                                $query = "SELECT tension_batterie FROM projet_ruche ORDER BY date DESC LIMIT 1";
                                $result = mysqli_query($link, $query);

                                if ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['tension_batterie'] . " %";
                                } else {
                                    echo "Aucune donnée";
                                }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>L'humidité intérieure est de :
                            <?php
                                $query = "SELECT h_int FROM projet_ruche ORDER BY date DESC LIMIT 1";
                                $result = mysqli_query($link, $query);

                                if ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['h_int'] . " %";
                                } else {
                                    echo "Aucune donnée";
                                }

                                mysqli_close($link);
                            ?>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>

                    <div class="col-sm-12">
                        <p class="text-end fst-italic" style="color: grey">
                            Projet réalisé par : NONY Maé; PREASCA Daniel; ROUILLARD Nathan TSTI2D2
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
