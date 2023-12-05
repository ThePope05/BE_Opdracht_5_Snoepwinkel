<?php

class StorageModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllStorageInfo()
    {
        $this->db->query("SELECT * FROM storage");

        return $this->db->execute(true);
    }
}
