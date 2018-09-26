<?php

include 'app/class.php';
include 'app/helper.php';

include 'includes/header.php';

$data = new PokeApi;
$helper = new Helper;

$poke = $_GET['nome'];
$json = $data->getPokemon($poke);
$pokemon = json_decode($json);


echo $pokemon->name;
echo "<br>";

echo "<img src='". $pokemon->sprites->back_default ."'>";
echo "<img src='". $pokemon->sprites->front_default ."'>";
echo "<br>";

echo "Experiência: ";
echo $pokemon->base_experience;
echo "<br>";

echo "Altura: ";
echo $pokemon->height;
echo "<br>";

echo "Peso: ";
echo $pokemon->weight;
echo "<br><br>";

echo "Habilidades: <br>";
foreach ($pokemon->abilities as $ability) {
    $link = $ability->ability->url;
    $id = $helper->getAbilityIdbyLink($link);

    echo "<a href='ability.php?habilidade=". $id ."'>". $ability->ability->name ."</a>";
    echo "<br>";
}

echo "<br>";
echo "Tipo: <br>";

foreach ($pokemon->types as $type) {
    $tipo = $type->type->name;
    $link = $type->type->url;
    $id = $helper->getTypeIdbyLink($link);

    echo "<a href='type.php?tipo=". $id ."'>". $tipo ."</a>";
    echo "<br>";
}

echo "<br>";
echo "<a href='index.php'>Voltar ao inicio</a>";

include 'includes/footer.php';

?>