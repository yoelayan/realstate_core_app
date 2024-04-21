<?php

namespace App\Helpers;

class ModelPathHelper
{
    public static function build(string $modelName)
    {
        $model = 'App\Models\\' . $modelName . 'Model';
        return new $model();
    }
}