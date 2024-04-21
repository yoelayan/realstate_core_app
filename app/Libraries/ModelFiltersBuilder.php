<?php

namespace App\Libraries;

class ModelFiltersBuilder
{   
    // TODO: Crear funcion split que separe el campo del metodo de busque: description__like
    public static function build($model, $request){
        // validate allowedFieldsFilters in get request
        $allowedFieldsFilters = $model->allowedFieldsFilters;
        $filters = [];
        foreach ($allowedFieldsFilters as $field) {
            // dont use has method because it will return false if the value is 0

            try {
                $value = $request->input($field);
                if ($value) {
                    $filters[$field] = $value;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        foreach ($filters as $key => $value) {
            $model->where($key, $value);
        }
        return $model;
    }
}