<?php

include 'app/class.php';
include 'app/helper.php';

include 'includes/header.php';

$data = new PokeApi;
$helper = new Helper;

$ability = $_GET['habilidade'];
$json = $data->getAbility($ability);
$ability_data = json_decode($json);

echo $ability_data->name;
echo "<br>";
echo $ability_data->effect_entries[0]->effect;
echo "<br>";
echo $ability_data->effect_entries[0]->short_effect;
echo "<br>Pokemons: <br>";


foreach ($ability_data->pokemon as $pokemon) {
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