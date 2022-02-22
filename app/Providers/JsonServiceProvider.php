<?php

namespace App\Providers;

class JsonServiceProvider
{
    public static function getCidades()
    {
        $path = storage_path() . "/files/cidades.json";

        $json = json_decode(file_get_contents($path), true);

        return $json;
    }

}
