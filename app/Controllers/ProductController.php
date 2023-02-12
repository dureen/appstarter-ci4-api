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
        $res = [
            'status'   => 200,
            'code'     => 200,
            'message' => 'OK.',
            'data'     => $data,
        ];
        return $this->respond($res);
    }

    // create a product
    public function create()
    {
        $name = $this->request->getVar('name');
        $price  = $this->request->getVar('price');
        $data = [
            'name'  => $name,
            'price' => $price,
        ];
        $model = new ProductModel();
        $status = $model->save($data);
        if($status) {
            $res = [
                'status'   => 201,
                'code'     => 201,
                'message' => 'Created.',
            ];
            return $this->respondCreated($res);
        } else {
            $errors = [
                'status'   => 400,
                'code'     => 400,
                'message' => 'Failed to create data.',
            ];
            return $this->fail($errors, 400);
        }
    
    }

    // Single product view
    public function show($id = null)
    {
        $model = new ProductModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            $res = [
                'status'   => 200,
                'code'     => 200,
                'message' => 'OK.',
                'data'     => $data,
            ];
            return $this->respond($res);
        } else {
            $description = 'Not found.';
            return $this->failNotFound($description);
        }
    }

    // Update a product
    public function update($id=null)
    {
        $input = $this->request->getRawInput();
    
        $model = new ProductModel();
        $product = $model->where('id', $id)->first();
        if($product) {
            $data = [
                'id' => $id,
                'name' => $input['name'] ?? $product['name'],
                'price' => $input['price'] ?? $product['price'],
            ];
            $status = $model->save($data);
            if ($status) {
                $res = [
                    'status'   => $status,
                    'code'     => 200,
                    'message' => 'Updated.',
                ];
                return $this->respond($res);
            } else {
                $errors = [
                    'status'   => 400,
                    'code'     => 400,
                    'message' => 'Failed to update data.',
                ];
                return $this->fail($errors, 400);
            }
        } else {
            $description = 'Not found.';
            return $this->failNotFound($description);
        }
    }

    // Delete a product
    public function delete($id = null)
    {
        $model = new ProductModel();
        $data = $model->find($id);
        if ($data) {
            $status = $model->delete($id);
            if ($status) {
                $res = [
                    'status'   => $status,
                    'code'    => 200,
                    'message' => 'deleted',
                ];
                return $this->respondDeleted($res);
            } else {
                $errors = [
                    'status'   => 400,
                    'code'     => 400,
                    'message' => 'Failed to delete a data.',
                ];
                return $this->fail($errors, 400);
            }
        } else {
            $description = 'Not found.';
            return $this->failNotFound($description);
        }
    }
}
