
<?php

class Product extends BaseController
{
    public function index()
    {
        $allProducts = $this->model('ProductModel')->getAllProducts();

        $allProductData = [];

        foreach ($allProducts as $product) {
            $allProductData[count($allProductData)] = [
                'product' => $product,
                'storageData' => $this->model('StorageModel')->getProductStorageData($product->id)
            ];
        }

        $data = [
            'title' => 'Products',
            'products' => $allProductData
        ];

        $this->view('Product/index', $data);
    }

    public function AllergyInfo($productId)
    {
        $allergyData = $this->model('ProductModel')->getProductAllergyData($productId);

        if (count($allergyData) == 0) {
            $allergyData = [
                (object) [
                    'name' => 'No allergy info',
                    'description' => 'No allergy info'
                ]
            ];
        }

        $data = [
            'title' => 'Allergy info',
            'allergyData' => $allergyData
        ];

        $this->view('Product/AllergyInfo', $data);
    }

    public function DeliveryInfo($productId)
    {
        $thisProduct = $this->model('ProductModel')->getProductById($productId);

        $allProductData = [
            'product' => $thisProduct,
            'delivery' => $this->model('ProductModel')->getProductSupplierData($thisProduct->id)
        ];

        $data = [
            'title' => 'Delivery info',
            'product' => $allProductData
        ];

        $this->view('Product/DeliveryInfo', $data);
    }
}
