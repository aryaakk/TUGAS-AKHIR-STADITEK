<?php

namespace staditek\TugasAkhir\App\model\Order_Detail;

use staditek\TugasAkhir\App\config\database;

class orderDetailModel extends database
{
    private $table = "tbl_order_detail";

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT reference_no, order_date, order_status, product_name, quantity, quantity_price, $this->table.status, company_name FROM $this->table JOIN tbl_order ON $this->table.order_id = tbl_order.order_id JOIN tbl_pet_product ON $this->table.pet_product_id = tbl_pet_product.pet_product_id JOIN tbl_vendor ON $this->table.vendor_id = tbl_vendor.company_id");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(order_id, pet_product_id, quantity, quantity_price, status, vendor_id) VALUES(
            :order_id, 
            :pet_product_id,
            :quantity,
            :quantity_price,
            :status,
            :vendor_id
        )");
        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE order_detail_id = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            order_id = :order_id,
            pet_product_id = :pet_product_id,
            quantity = :quantity,
            quantity_price = :quantity_price,
            status = :status,
            vendor_id = :vendor_id
            WHERE order_detail_id = :order_detail_id 
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE order_detail_id = '$id'");
        return $statement->execute();
    }
}