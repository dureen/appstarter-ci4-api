<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModel;

// use App\Config\Services;

class ProductController extends ResourceController
{
    use ResponseTrait;

    // get all product
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
        if($name===null && $price===null) {
            return $this->respondCreated([
                'error'    => 403,
                'messages' => 'Failed to add new data (variable=null).',
            ]);
        }
        $data = [
            'name' => $name,
            'price' => $price,
        ];

        $model->save($data);
        $res = [
            // 'data' => $data,
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Product data was successfully added.'
            ]
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
        $name = $_GET['name']; // 
        // $name = $this->request->getVar('name'); // this is doen't work on $_GET
        $price  = $_GET['price'];// 
        // $name = $this->request->getVar('price'); // this is doen't work on $_GET
        if($name===null && $price===null) {
            return $this->respondCreated([
                'error'    => 403,
                'messages' => 'Failed to add new data (variable=null).',
            ]);
        }
        $data = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
        ];
        $model->save($data);
        $res = [
            // 'data' => $data,
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Product data was successfully updated.'
            ]
        ];
        return $this->respond($res);
    }

    // Delete a product
    public function delete($id = null)
    {
        $model = new ProductModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $res = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Product data was successfully deleted.'
                ]
            ];
            return $this->respondDeleted($res);
        } else {
            return $this->failNotFound('Not found.');
        }
    }
}
