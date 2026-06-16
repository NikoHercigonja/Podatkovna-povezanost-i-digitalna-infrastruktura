<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<title>Automobili JSON</title>

<style>
body{
    margin:0;
    font-family:Segoe UI, sans-serif;
    background:#eef2f7;
}

.wrapper{
    max-width:1100px;
    margin:0 auto;
    padding:40px 20px;
}

h2{
    margin:0 0 20px;
}

.osoba{
    background:#fff;
    padding:22px;
    border-radius:16px;
    display:flex;
    flex-wrap:wrap;
    gap:20px;
    justify-content:space-between;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    margin-bottom:30px;

}

.osoba p{
    margin:0;
    font-size:20px;
}

.auti{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:20px;
}

.kartica{
    background:#fff;
    border-radius:16px;
    padding:18px;
    box-shadow:0 8px 22px rgba(0,0,0,0.06);
    position:relative;
    overflow:hidden;
}

.kartica:hover{
    transform:translateY(-5px);
    transition:0.2s ease;
}

.kartica::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:6px;
    height:100%;
    background:#4a90e2;
}

.skuplji{
    background:linear-gradient(135deg,#fff6cc,#ffe08a);
    border:1px solid rgba(212,175,55,0.4);
}

.skuplji::before{
    background:#d4af37;
}

.povoljniji::before{
    background:#2ecc71;
}

.neregistriran::after{
    content:"NIJE REGISTRIRAN";
    position:absolute;
    top:12px;
    right:12px;
    font-size:10px;
    padding:5px 8px;
    background:#e74c3c;
    color:#fff;
    border-radius:8px;
    font-weight:600;
}

.registriran::after{
    content:"REGISTRIRAN";
    position:absolute;
    top:12px;
    right:12px;
    font-size:10px;
    padding:5px 8px;
    background:#2ecc71;
    color:#fff;
    border-radius:8px;
    font-weight:600;
}

h3{
    margin:0 0 10px;
}

.info{
    font-size:13px;
    margin:4px 0;
    color:#444;
}

.tag{
    margin-top:10px;
    display:inline-block;
    font-size:12px;
    font-weight:700;
    padding:6px 10px;
    border-radius:10px;
    background:rgba(0,0,0,0.05);
}

.skuplji .tag{
    background:rgba(212,175,55,0.2);
}

.povoljniji .tag{
    background:rgba(46,204,113,0.15);
}

</style>
</head>

<body>

<div class="wrapper">

<?php
$json=file_get_contents("Vjezba 6-2.json");
$osoba=json_decode($json);
?>

<h2>Osoba</h2>

<div class="osoba">
    <p><strong>Ime:</strong> <?= $osoba->ime ?></p>
    <p><strong>Prezime:</strong> <?= $osoba->prezime ?></p>
    <p><strong>Grad:</strong> <?= $osoba->grad ?></p>
    <p><strong>Starost:</strong> <?= $osoba->starost ?></p>
    <p><strong>Zaposlen:</strong> <?= $osoba->zaposlen ? "Da" : "Ne" ?></p>
</div>

<h2>Automobili</h2>

<div class="auti">

<?php
foreach($osoba->auti as $auto){

    $klasa="kartica";

    if($auto->cijena>20000){
        $klasa.=" skuplji";
        $status="Skuplji automobil";
    } else {
        $klasa.=" povoljniji";
        $status="Povoljniji automobil";
    }

    if($auto->registriran){
        $klasa.=" registriran";
    } else {
        $klasa.=" neregistriran";
    }

    echo "
        <div class='$klasa'>
            <h3>$auto->marka $auto->model</h3>

            <div class='info'>Godina: $auto->godina</div>
            <div class='info'>Boja: $auto->boja</div>
            <div class='info'>Gorivo: $auto->gorivo</div>
            <div class='info'>Kilometri: $auto->kilometri</div>
            <div class='info'>Vlasnik od: $auto->vlasnik_od</div>
            <div class='info'>Cijena: {$auto->cijena} EUR</div>

            <div class='tag'>$status</div>
        </div>
    ";
}
?>

</div>

</div>

</body>
</html>
