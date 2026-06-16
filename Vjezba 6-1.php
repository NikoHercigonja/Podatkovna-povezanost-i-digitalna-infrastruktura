<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vježba 6.1</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 30px;
        }

        h1, h2 {
            color: #333;
        }

        .osoba {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);

            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            align-items: center;
        }

        .osoba p {
            margin: 0;
            font-size: 17px;
        }

        .auti-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .auto-kartica {
            background-color: white;
            width: 260px;
            padding: 18px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);

            border-left: 8px solid #3498db;
            transition: 0.3s;
        }

        .auto-kartica:hover {
            transform: scale(1.03);
        }


        .nije-registriran {
            border-left: 8px solid red;
        }


        .skupi-auto {
            background: linear-gradient(135deg, #fff5cc, #ffe082);
            border-left: 8px solid gold;
            color: #5c4300;
        }

        .skupi-auto h3 {
            color: #7a5600;
        }

        .auto-kartica h3 {
            margin-top: 0;
        }

        .cijena {
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
        }

    </style>
</head>
<body>

<?php

$jsonPodaci = file_get_contents("Vjezba 6-1.json");

$osoba = json_decode($jsonPodaci);

?>

<h1>Podaci o osobi</h1>

<div class="osoba">

    <p><strong>Ime:</strong> <?= $osoba->ime ?></p>

    <p><strong>Prezime:</strong> <?= $osoba->prezime ?></p>

    <p><strong>Starost:</strong> <?= $osoba->starost ?></p>

    <p><strong>Grad:</strong> <?= $osoba->grad ?></p>

    <p>
        <strong>Zaposlen:</strong>
        <?= $osoba->zaposlen ? "Da" : "Ne" ?>
    </p>

</div>

<h2>Automobili</h2>

<div class="auti-container">

<?php

foreach($osoba->auti as $auto) {

    $klasa = "auto-kartica";

    if(!$auto->registriran) {
        $klasa .= " nije-registriran";
    }

    if($auto->cijena > 20000) {
        $klasa .= " skupi-auto";
    }

    echo "
        <div class='$klasa'>

            <h3>$auto->marka $auto->model</h3>

            <p><strong>Godina:</strong> $auto->godina</p>

            <p><strong>Registriran:</strong> " .
                ($auto->registriran ? "Da" : "Ne") .
            "</p>

            <p class='cijena'>
                {$auto->cijena} EUR
            </p>

        </div>
    ";
}

?>

</div>

</body>
</html>
