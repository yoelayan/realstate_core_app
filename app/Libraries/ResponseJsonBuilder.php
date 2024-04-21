<?php

namespace App\Libraries;

// TODO: Implementar interfaces
class ResponseJsonBuilder
{
    private $response;
    private $headers;

    public function __construct()
    {
        $this->response = [];
        $this->headers = [];
    }

    public function setSuccess($data = null, $message = 'Success', $pagination = null)
    {
        $this->response['success'] = true;
        $this->response['data'] = $data;
        $this->response['message'] = $message;
        if ($pagination) {
            $this->response['pagination'] = $pagination;
        }
        $this->setStatusCode(200);
    }

    public function setError($message = 'Error', $code = 500, $errors = [])
    {
        $this->response['success'] = false;
        $this->response['message'] = $message;
        $this->response['errors'] = $errors;
        $this->setStatusCode($code);
    }

    public function setPagination($currentPage, $perPage, $totalPages, $totalItems)
    {
        $this->response['pagination'] = [
            'current_page' => $currentPage,
            'per_page' => $perPage,
            'total_pages' => $totalPages,
            'total_items' => $totalItems
        ];
    }

    private function setStatusCode($code)
    {
        $this->headers[] = "HTTP/1.1 " . $code . " " . $this->getStatusMessage($code);
    }

    private function getStatusMessage($code)
    {
        $status = [
            200 => 'OK',
            404 => 'Not Found',
            500 => 'Internal Server Error'
        ];
        return $status[$code] ?? 'Unknown Status';
    }

    public function build()
    {
        $response = service('response'); // Obtiene el servicio de respuesta de CodeIgniter

        // Establece los encabezados HTTP necesarios
        foreach ($this->headers as $header) {
            $response->setHeader($header, true);
        }

        // Establece el tipo de contenido como JSON
        $response->setContentType('application/json');

        // Configura el cuerpo de la respuesta con los datos JSON codificados
        $response->setBody(json_encode($this->response));

        // Envía la respuesta al cliente y termina la ejecución
        $response->send();
        exit;
    }
}