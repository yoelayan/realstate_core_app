<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\ModelFiltersBuilder;

class RealStateModel extends Model
{
    protected $table            = 'real_state';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "code_property", // Código único de la propiedad
        "country_id", // País
        "region_id", // Región del país
        "city_id", // Ciudad de la región
        "currency_id", // ¿Que tipo de moneda se ve reflejado el negocio? (Bolívares, Euros, Dólares, etc..)
        "kind_property_id", // ¿Que tipo de propiedad es? (Apartamento, casa, terreno, local, etc..)
        "kind_market_id", // ¿A que mercado pertenece? (Primario, secundario)
        "kind_unit_area_id", // ¿Que tipo de unidad se utilizara para medir el inmueble? (Metros cuadrados, Millas, Pies, etc..)
        "property_conditions_id", // Condiciones del inmueble
        "business_model_id", // ¿Cúal es el modelo de negocio? (Venta, Alquiler, Financiamiento, etc..)
        "sale_price", // Precio de venta
        "rental_price", // Canon de alquiler
        "location_coordinates", // Coordenadas de ubicacion del inmueble
        "address", // Dirección del inmueble
        "meters_characteristics", // Metraje del inmueble (Metros de terreno, metros de construcción y metros de altura)
        "general_characteristics", // Caracteristicas del inmueble (Baños, Puestos de estacionamiento, Habitaciones, Cubiculos, Salas, Cocinas, Patios, Piscinas, etc..)
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findData($request, $perPage, $offset)
    {
        // Utiliza ModelFiltersBuilder para construir la consulta con filtros aplicados
        $query = ModelFiltersBuilder::build($this, $request);

        // Aplica la paginación a la consulta
        return $query->findAll($perPage, $offset);
    }
    public function countData($request)
    {
        // Utiliza ModelFiltersBuilder para construir la consulta con filtros aplicados
        $query = ModelFiltersBuilder::build($this, $request);

        // Retorna la cantidad de registros encontrados
        return $query->countAllResults();
    }

}
