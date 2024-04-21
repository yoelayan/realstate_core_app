<?php

namespace App\Libraries;

use App\Controllers\BaseController;
use App\interfaces\ControllerFabricInterface;
use App\Helpers\ModelPathHelper;
use App\Libraries\ResponseJsonBuilder;


abstract class ControllerFabric extends BaseController implements ControllerFabricInterface
{
    private $model;
    protected $nameModel;

    public function __construct()
    {
        $this->model = ModelPathHelper::build($this->nameModel);
    }
    public function index()
    {
        $perPage = $this->request->getVar('per_page') ?? 10 ; // Número de elementos por página
        $currentPage = $this->request->getVar('page') ?? 1; // Obtener la página actual desde la URL, por defecto es 1
        $offset = ($currentPage - 1) * $perPage; // Calcular el desplazamiento

        $totalItems = $this->model->countData($this->request); // Suponiendo que tienes un método para contar los elementos
        $totalPages = ceil($totalItems / $perPage);

        $items = $this->model->findData($this->request, $perPage, $offset);

        $responseBuilder = new ResponseJsonBuilder();
        $responseBuilder->setSuccess($items, 'List of items', [
            'current_page' => $currentPage,
            'per_page' => $perPage,
            'total_pages' => $totalPages,
            'total_items' => $totalItems
        ]);
        $responseBuilder->build();
    }
// TODO: Implementar JsonBuilder
    public function show($id)
    {
        $item = $this->model->find($id);
        return $this->response->setJSON($item);
    }
// TODO: Implementar JsonBuilder
    public function create()
    {
        $item = $this->request->getJSON();
        $this->model->insert($item);
        return $this->response->setJSON($item);
    }
// TODO: Implementar JsonBuilder
    public function update($id)
    {
        $item = $this->request->getJSON();
        $this->model->update($id, $item);
        return $this->response->setJSON($item);
    }
// TODO: Implementar JsonBuilder
    public function delete($id)
    {
        $this->model->delete($id);
        return $this->response->setJSON(['message' => 'Item deleted']);
    }
}
