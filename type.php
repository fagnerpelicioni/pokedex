<?php

include 'app/class.php';
include 'app/helper.php';

include 'includes/header.php';

$data = new PokeApi;
$helper = new Helper;

$type = $_GET['tipo'];
$json = $data->getType($type);
$type_data = json_decode($json);

//danos
$damages = $type_data->damage_relations;

$double_damage_from = $damages->double_damage_from;
$double_damage_to = $damages->double_damage_to;
$half_damage_from = $damages->half_damage_from;
$half_damage_to = $damages->half_damage_to;
$no_damage_from = $damages->no_damage_from;
$no_damage_to = $damages->no_damage_to;

echo $type_data->name;
echo "<br>";

if ($double_damage_from) {
    echo "Recebe dano duplo de: <br>";
    foreach ($double_damage_from as $dano) {
        echo $dano->name;
        echo "<br>";
    }
}

if ($double_damage_to) {
    echo "Fornece dano duplo de: <br>";
    foreach ($double_damage_to as $dano) {
        echo $dano->name;
        echo "<br>";
    }
}

if ($no_damage_from) {
    echo "Não recebe dano de: <br>";
    foreach ($no_damage_from as $dano) {
        echo $dano->name;
        echo "<br>";
    }
}


echo "<br>";
echo "Pokemons: <br>";

foreach ($type_data->pokemon as $pokemon) {
    $nome = $pokemon->pokemon->name;
    $link = $pokemon->pokemon->url;

    echo "<a href='pokemon.php?nome=". $nome ."'>". $nome ."</a>";
    echo "<br>";
}
?>

<a href="index.php">Voltar ao inicio</a>

<?php
include 'includes/footer.php';

?>