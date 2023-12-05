
<?php

class Product extends BaseController
{
    public function index()
    {
        $allProducts = $this->model('ProductModel')->getAllProducts();
        $allStorageInfo = $this->model('StorageModel')->getAllStorageInfo();

        $data = [
            'title' => 'Product',
            'products' => $allProducts,
            'storage' => $allStorageInfo
        ];

        $this->view('Product/index', $data);
    }
}
