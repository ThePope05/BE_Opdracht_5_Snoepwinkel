
<?php

class Product extends BaseController
{
    public function index()
    {
        $allProducts = $this->model('ProductModel')->getAllProductsWithStorageData();

        $data = [
            'title' => 'Product',
            'products' => $allProducts
        ];

        $this->view('Product/index', $data);
    }
}
