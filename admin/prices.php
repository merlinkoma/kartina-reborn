<?php

function priceFormat($unprix, $unformat){
    if ($unformat == 'classical') {
        $prixduformat = $unprix * 1.3;
    } elseif ($unformat == 'big') {
        $prixduformat = $unprix * 2.6;
    } elseif ($unformat == 'giant') {
        $prixduformat = $unprix * 5.2;
    } elseif ($unformat == 'collector') {
        $prixduformat = $unprix * 13;
    }
    return $prixduformat;
}

function priceFinition($prixduformat, $lafinition){
    if (($lafinition == 'pp_black') || ($lafinition == 'paper_draw')) {
        $prixdelafinition = $prixduformat;
    } 
    elseif ($lafinition == 'pp_white') {
        $prixdelafinition = $prixduformat * 1.4;
    } 
    elseif  ($lafinition == 'aluminium'){
        $prixdelafinition = $prixduformat * 2.6;
    } 
    elseif ($lafinition == 'acrylic') {
        $prixdelafinition = $prixduformat * 3.35;
    }
    return $prixdelafinition;
}

function priceFrame($price_finition, $frame)
{
    if (($frame == 'none') || ($frame == 'white_wood') || ($frame == 'mahogany') || ($frame == 'brushed_aluminium')) {
        $total_price = $price_finition;
    } elseif (($frame == 'white_satin') || ($frame == 'black_satin') || ($frame == 'walnut') || ($frame == 'oak')) {
        $total_price = $price_finition * 1.45;
    }
    return $total_price;
}

$get_price = $_GET['price'] ?? '';
$get_format = $_GET['format'] ?? '';
$get_finition = $_GET['finition'] ?? '';
$get_frame = $_GET['frame'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="get" name="finition_form">
        <label for="price">Prix</label>
        <input type="text" name="price">

        <label for="format">Format</label>
        <select name="format">
            <option value="classical">Classique</option>
            <option value="big">Grand</option>
            <option value="giant">Géant</option>
            <option value="collector">Collector</option>
        </select>

        <label for="finition">Finition</label>
        <select name="finition">
            <option value="pp_black">Passe-partout noir</option>
            <option value="pp_white">Passe-partout blanc</option>
            <option value="aluminium">Aluminium</option>
            <option value="acrylic">Acrylique</option>
            <option value="paper_draw">Tirage papier</option>
        </select>

        <label for="frame">Frame</label>
        <select name="frame">
            <option value="none">Sans cadre</option>
            <option value="white_wood">Bois blanc</option>
            <option value="mahogany">Acajou mat</option>
            <option value="brushed_aluminium">Aluminium brossé</option>
            <option value="black_satin">Satin noir</option>
            <option value="white_satin">Satin blanc</option>
            <option value="walnut">Noyer</option>
            <option value="oak">Chêne</option>
        </select>

        <button>Calculer</button>
    </form>
</body>

</html>

<?php

if(!empty($_GET)){
    echo 'Prix total avec le format '.$get_format.', la finition '.$get_finition.' et le cadre '.$get_frame.' : '.priceFrame(priceFinition(priceFormat($get_price, $get_format), $get_finition), $get_frame);
}


