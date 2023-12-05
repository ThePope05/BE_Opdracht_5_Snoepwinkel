
<?php

class Product extends BaseController
{
    public function index()
    {
        $allProducts = $this->model('ProductModel')->getAllProducts();

        $data = [
            'title' => 'Product',
            'products' => $allProducts
        ];

        $this->view('Product/index', $data);
    }
}
