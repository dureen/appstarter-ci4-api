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
            'status'   => 1,
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
        if(! $name) return $this->respond('Name field is required');
        $price  = $this->request->getVar('price');
        if(! $price) return $this->respond('Price field is required');
        $data = [
            'name' => $name, 
            'price' => $price,
        ];
        $model = new ProductModel();
        $model->save($data);
        $res = [
            'status'   => 1,
            'code'     => 201,
            'message' => 'Created.',
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
            $res = [
                'status'   => 1,
                'code'     => 200,
                'message' => 'OK.',
                'data'     => $data,
            ];
            return $this->respond($res);
        } else {
            $res = [
                'status'   => 0,
                'code'    => 404,
                'message' => 'Not found.',
            ];
            return $this->failNotFound($res);
        }
    }

    // Update a product
    public function update($id=null)
    {
        $input = $this->request->getRawInput();

        if(! $input['name']) return $this->respond('Name field is required');
        if(! $input['price']) return $this->respond('Price field is required');
    
        $model = new ProductModel();
        $product = $model->where('id', $id)->first();
        if($product) {
            $data = [
                'id' => $id,
                'name' => $input['name'] ?? $product['name'],
                'price' => $input['price'] ?? $product['price'],
            ];
            $model->save($data);
            $res = [
                'status'   => 1,
                'code'     => 200,
                'message' => 'Updated.',
                'data'     => $data,
            ];
            return $this->respond($res);
        } else {
            $res = [
                'status'   => 0,
                'code'    => 404,
                'message' => 'Not found.',
            ];
            return $this->failNotFound($res);
        }
    }

    // Delete a product
    public function delete($id = null)
    {
        $model = new ProductModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $res = [
                'status'   => 1,
                'code'    => 200,
                'message' => 'deleted',
            ];
            return $this->respondDeleted($res);
        } else {
            $res = [
                'status'   => 0,
                'code'    => 404,
                'message' => 'Not found.',
            ];
            return $this->failNotFound($res);
        }
    }
}
