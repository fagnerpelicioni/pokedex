<?php

class PokeApi {

    public function __construct()
    {
        $this->baseUrl = 'https://pokeapi.co/api/v2/';
        $this->baseUrlSprites = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/';
    }

    public function getPokeImage($pokeid) {

        $url = $this->baseUrlSprites.'pokemon/'.$pokeid.'.png';
        return $url;

    }

    public function getAllPokemons() {

        $url = $this->baseUrl.'pokemon/';
        return $this->sendRequest($url);       

    }

    public function getPokemon($pokename) {

        $url = $this->baseUrl.'pokemon/'.$pokename;
        return $this->sendRequest($url);

    }

    public function getAllTypes() {

        $url = $this->baseUrl.'type';
        return $this->sendRequest($url);

    }

    public function getType($type) {

        $url = $this->baseUrl.'type/'.$type;
        return $this->sendRequest($url);

    }

    public function getAllAbilities() {

        $url = $this->baseUrl.'ability';
        return $this->sendRequest($url);

    }

    public function getAbility($ability) {

        $url = $this->baseUrl.'ability/'.$ability;
        return $this->sendRequest($url);

    }
    
    public function sendRequest($url) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        if ($http_code != 200) {
            return json_encode('An error has occured.');
        }
    
        return $data;
        }

}


?>