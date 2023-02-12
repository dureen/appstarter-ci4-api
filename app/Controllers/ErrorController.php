<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class ErrorController extends ResourceController
{
    public function index()
    {
        //
    }

    public function isNotFound()
    {
        $description = 'Router is not found.';
        return $this->failNotFound($description);
    }
}
