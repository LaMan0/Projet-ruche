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
                <div class="col-sm-1">
                </div>
                <div class="col-sm-3"> 
                    <script src="https://static.elfsight.com/platform/platform.js" async></script>
                    <div class="elfsight-app-3227014b-94f6-4026-8d98-c48d8fb4b18c" data-elfsight-app-lazy></div>
                </div>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-7">
                    <?php
                        $url = "https://youtu.be/Bg0sCIVuv-E";

                    $videoId = basename(parse_url($url, PHP_URL_PATH));
                    $embedUrl = "https://www.youtube.com/embed/Bg0sCIVuv-E" . $videoId;
                    ?>
                    <iframe src="<?= $embedUrl ?>" width="560" height="315" allowfullscreen></iframe>
                    <!-- <iframe width="560" height="315" src="https://youtu.be/embed/Bg0sCIVuv-E" frameborder="0" allowfullscreen class="rounded-4"></iframe> -->
                </div>
                <table class="table table-dark">
                    <tr class="table-active">
                        <td>La température intérieur est de :
                        <?php
                            include ('identifiants.php');
                            /* Connexion à la base de données */
                            $link = mysqli_connect($host, $user, $pass, $bdd);
                            if (mysqli_connect_errno()) {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }
                            if (!$link) {
                                die('Echec de connexion au serveur de base de données : ' . mysqli_connect_error() . '(' . mysqli_connect_errno() . ') ');
                            }

                            // Envoi d'une requête pour un encodage en UTF-8
                            $query = "SET NAMES UTF8";
                            mysqli_query($link, $query);

                            // Envoi d'une requête pour lire la dernière valeur de la température intérieure
                            $query = "SELECT temp_int FROM `projet_ruche` ORDER BY date DESC LIMIT 1";
                            if ($reponse = mysqli_query($link, $query)) {
                                if ($ligne = mysqli_fetch_array($reponse)) {
                                    $temp_int = $ligne['temp_int'];
                                    echo $temp_int . ' °C<br />';
                                } else {
                                    echo "Aucune donnée trouvée.<br />";
                                }
                                mysqli_free_result($reponse); // Libération des résultats
                            } else {
                                echo "Erreur de requête : " . mysqli_error($link) . "<br />";
                            }
                            ?>
                        </td>
                        <td>Le poids de la ruche est de :
                        <?php
                            // Envoi d'une requête pour lire la dernière valeur du poids
                            $query = "SELECT poids FROM `projet_ruche` ORDER BY date DESC LIMIT 1";
                            if ($reponse = mysqli_query($link, $query)) {
                                if ($ligne = mysqli_fetch_array($reponse)) {
                                    $poids = $ligne['poids'];
                                    echo $poids . ' kg<br />';
                                } else {
                                    echo "Aucune donnée trouvée.<br />";
                                }
                                mysqli_free_result($reponse); // Libération des résultats
                            } else {
                                echo "Erreur de requête : " . mysqli_error($link) . "<br />";
                            }
                            ?>
                        </td>
                        <td>Le pourcentage de la batterie est de : 
                        <?php
                            // Envoi d'une requête pour lire la dernière valeur de la tension de la batterie
                            $query = "SELECT tension_batterie FROM `projet_ruche` ORDER BY date DESC LIMIT 1";
                            if ($reponse = mysqli_query($link, $query)) {
                                if ($ligne = mysqli_fetch_array($reponse)) {
                                    $tension_batterie = $ligne['tension_batterie'];
                                    echo $tension_batterie . ' %<br />';
                                } else {
                                    echo "Aucune donnée trouvée.<br />";
                                }
                                mysqli_free_result($reponse); // Libération des résultats
                            } else {
                                echo "Erreur de requête : " . mysqli_error($link) . "<br />";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>L'humidité intérieure est de : 
                        <?php
                            // Envoi d'une requête pour lire la dernière valeur de l'humidité intérieure
                            $query = "SELECT h_int FROM `projet_ruche` ORDER BY date DESC LIMIT 1";
                            if ($reponse = mysqli_query($link, $query)) {
                                if ($ligne = mysqli_fetch_array($reponse)) {
                                    $h_int = $ligne['h_int'];
                                    echo $h_int . ' %<br />';
                                } else {
                                    echo "Aucune donnée trouvée.<br />";
                                }
                                mysqli_free_result($reponse); // Libération des résultats
                            } else {
                                echo "Erreur de requête : " . mysqli_error($link) . "<br />";
                            }
                            ?>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <div class="col-sm-12">
                <p class="text-end fst-italic" style="color: grey" >Projet réalisé par : NONY Maé; PREASCA Daniel; ROUILLARD Nathan TSTI2D2</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>