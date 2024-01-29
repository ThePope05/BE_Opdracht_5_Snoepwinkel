
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

        $tableData = [];

        foreach ($allProductData as $group) {


            $allergyEl = "
                <a href='/Product/AllergyInfo/" . $group['product']->id . "' class='danger'>
                    <span class='material-symbols-rounded'>
                        error
                    </span>
                </a>
            ";

            $deliveryEl = "
                <a href='/Product/DeliveryInfo/" . $group['product']->id . "'>
                    <span class='material-symbols-rounded'>
                        local_shipping
                    </span>
                </a>
            ";

            if (!$this->model('ProductModel')->productHasAllergyData($group['product']->id)) {
                $allergyEl = "
                    <span class='material-symbols-rounded' style='color: green;'>
                        check_circle
                    </span> 
                ";
            }

            if ($group['storageData']->inStorage < 1) {
                $group['storageData']->inStorage = "No stock";
            }

            $tableData[count($tableData)] = [
                'tableData' => [
                    $group['product']->barcode,
                    $group['product']->name,
                    $group['storageData']->packageUnit . " Kg",
                    $group['storageData']->inStorage,
                    $allergyEl,
                    $deliveryEl
                ]
            ];
        }

        $data = [
            'title' => 'Product overview',
            'tableHead' => [
                'Barcode',
                'Name',
                'Package unit(Kg)',
                'Amount in storage',
                'Allergy info',
                'Delivery info'
            ],
            'tableData' => $tableData
        ];

        $this->view('Product/tablePage', $data);
    }

    public function AllergyInfo($productId)
    {
        $allergyData = $this->model('ProductModel')->getProductAllergyData($productId);

        $tableData = [];

        foreach ($allergyData as $allergy) {
            $tableData[count($tableData)] = [
                'tableData' => [
                    $allergy->name,
                    $allergy->description
                ]
            ];
        }

        $data = [
            'title' => 'Allergy info',
            'tableHead' => [
                'Name',
                'Description'
            ],
            'tableData' => $tableData
        ];

        $this->view('Product/tablePage', $data);
    }

    public function DeliveryInfo($productId)
    {
        $thisProduct = $this->model('ProductModel')->getProductById($productId);

        $supplierData = $this->model('ProductModel')->getProductSupplierData($productId);

        $tableData = [];

        $tableData[count($tableData)] = [
            'tableData' => [
                $thisProduct->name,
                $supplierData->dateDelivery,
                $supplierData->amount,
                $supplierData->dateNextDelivery
            ]
        ];

        $data = [
            'title' => 'Delivery info',
            'tableHead' => [
                'Product name',
                'Date of last delivery',
                'Amount',
                'Date of next delivery'
            ],
            'tableData' => $tableData
        ];

        $this->view('Product/tablePage', $data);
    }
}
