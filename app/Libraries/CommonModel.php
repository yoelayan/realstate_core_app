<?php

namespace App\Libraries;

use CodeIgniter\Model;
use App\Libraries\ModelFiltersBuilder;

abstract class CommonModel extends Model
{
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'description',
        'code'
    ];
    protected $allowedFieldsFilters = [
        'description',
    ];
    protected $extraAllowedFields = [];

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

    public function extraAllowedFields(){
        $this->allowedFields = array_merge($this->allowedFields, $this->extraAllowedFields);
    }

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
