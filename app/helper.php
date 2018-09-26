<?php 

class Helper {


    public function getPokemonIdbyLink ($link) {

        $badid = str_replace('https://pokeapi.co/api/v2/pokemon/', '', $link);
        $id = substr($badid, 0, strpos($badid, "/"));

        return $id;

    }

    public function getTypeIdbyLink ($link) {

        $badid = str_replace('https://pokeapi.co/api/v2/type/', '', $link);
        $id = substr($badid, 0, strpos($badid, "/"));

        return $id;

    }

    public function getAbilityIdbyLink ($link) {

        $badid = str_replace('https://pokeapi.co/api/v2/ability/', '', $link);
        $id = substr($badid, 0, strpos($badid, "/"));

        return $id;

    }

}

?>