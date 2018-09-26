<?php
include 'app/class.php';
include 'app/helper.php';

include 'includes/header.php';

$data = new PokeApi;
$helper = new Helper;

$json = $data->getAllPokemons();
$allpoke = json_decode($json);

$palavra = $_GET['busca'];
$encontrado = 0;
$todospoke = $allpoke->results;
$qntpokemon = count($todospoke);

    for ($i=0; $i < count($todospoke); $i++) { 
        if ($palavra === $todospoke[$i]->name) {
            echo "Pokemon encontrado! <br>";

            $nome = $todospoke[$i]->name;
            $link = $todospoke[$i]->url;

            $id = $helper->getPokemonIdbyLink($link);
            $image = $data->getPokeImage($id);

            ?>

            <img src="<?=$image;?>">
            <a href="pokemon.php?nome=<?= $nome; ?>"><?= $nome; ?></a><br>

            <?php
            $encontrado = 1;
            break;
        } 
    }

    if ($encontrado == 0) {
        echo "Não encontrado!";
    }

include 'includes/search-form.php';

?>

<a href="index.php">Voltar ao inicio</a>

<?php
include 'includes/footer.php';
?>