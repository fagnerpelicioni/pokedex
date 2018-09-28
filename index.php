<?php

include 'app/class.php';
include 'app/helper.php';

include 'includes/header.php';

$data = new PokeApi;
$helper = new Helper;

$allpoke = $data->getAllPokemons();
$alltypes = $data->getAllTypes();
$abilities = $data->getAbility($ability);

$types = json_decode($alltypes);
$pokemons = json_decode($allpoke);

include 'includes/search-form.php';

foreach (array_slice($types->results, 0, 6) as $type) {
    $nome = $type->name;
    $link = $type->url;
    $id = $helper->getTypeIdbyLink($link);

    ?>

    <a href="type.php?tipo=<?=$id;?>"><?=$nome;?></a>

    <?php
}

echo "<br>";

?>


<div class="container">
    <div class="row">

    <?php
    foreach (array_slice($pokemons->results, 0, 9) as $pokemon) {
        $nome = $pokemon->name;
        $link = $pokemon->url;
        $id = $helper->getPokemonIdbyLink($link);
        
        $image = $data->getPokeImage($id);

        ?>
        <div class="col-md-4 poke-card">

            <img class="responsive" src="<?=$image;?>">
            <p><a href="pokemon.php?nome=<?= $nome; ?>"><?= $nome; ?></a></p>

        </div>

        <?php
    }
    ?>

    </div>
</div>




<?php

include 'includes/footer.php';

?>