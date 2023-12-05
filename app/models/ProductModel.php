<?php

class ProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProducts()
    {
        $this->db->query("SELECT * FROM product");

        return $this->db->execute(true);
    }

    public function getAllProductsWithStorageData()
    {
        $this->db->query("SELECT * FROM product
                          INNER JOIN storage ON product.id = storage.productid");

        return $this->db->execute(true);
    }
}
