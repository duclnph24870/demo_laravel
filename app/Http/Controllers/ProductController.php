<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $model;

    function __construct () {
        $this->model = new ProductModel();
    }
    
    public function getAll () {
        $result = $this->model->all();
        // Cách gọi khác
        // return $this->model->where('id',1)->get();
        return $result;
    }

    public function add () {
        $dataInsert  = [
            'name' => 'mô hình đồ chơi',
            'price' => 10000,
            'description' => 'Mô tả cho mô hình đồ chơi'
        ];

        $result = $this->model->create($dataInsert);

        return $result;
    }
}
