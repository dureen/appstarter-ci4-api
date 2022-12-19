<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModel;
// use App\Config\Services;

class ProductController extends ResourceController
{
    use ResponseTrait;

    // GET all product
    public function index()
    {
        $model = new ProductModel();
        $data['produk'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    // create a product
    public function create()
    {
        $model = new ProductModel();
        $name = $this->request->getVar('name');
        $price  = $this->request->getVar('price');
        if(!$name && !$price) {
            $name = htmlspecialchars($_GET['name']);
            $price = htmlspecialchars($_GET['price']);
        }
        $data = [
            'name' => $name, 
            'price' => $price,
        ];
        $model->save($data);
        $res = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => true,
            ],
            'data'     => $data,
        ];
        return $this->respondCreated($res);
    }

    // Single product view
    public function show($id = null)
    {
        $model = new ProductModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Not found.');
        }
    }
    // Update a product
    public function update($id = null)
    {
        $model = new ProductModel();
        $name = $this->request->getVar('name');
        $price  = $this->request->getVar('price');
        if(!$name && !$price) {
            $name = htmlspecialchars($_GET['name']);
            $price = htmlspecialchars($_GET['price']);
        }
        $data = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
        ];
        $model->save($data);
        $res = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => true,
            ],
            'data'     => $data,
        ];
        return $this->respond($res);
    }

    // Delete a product
    public function delete($id = null)
    {
        $model = new ProductModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $res = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => true,
                ]
            ];
            return $this->respondDeleted($res);
        } else {
            return $this->failNotFound('Not found.');
        }
    }
}
