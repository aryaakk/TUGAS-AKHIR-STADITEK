<?php

namespace staditek\TugasAkhir\App\model\Vendor;

use staditek\TugasAkhir\App\config\database;

class vendorModel extends database
{
    private $table = 'tbl_vendor';

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(company_name, company_contact_person, company_email, company_contact_number, company_website, company_profile, vendor_username, vendor_password, user_id) VALUES(
            :company_name,
            :company_contact_person,
            :company_email,
            :company_contact_number,
            :company_website,
            :company_profile,
            :vendor_username,
            :vendor_password,
            :user_id
        )");
        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE company_id  = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            company_name=:company_name, 
            company_contact_person=:company_contact_person, 
            company_email=:company_email,
            company_contact_number=:company_contact_number,
            company_website=:company_website,
            company_profile=:company_profile,
            vendor_username=:vendor_username,
            vendor_password=:vendor_password,
            user_id=:user_id
            WHERE company_id = :company_id
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE company_id = '$id'");
        return $statement->execute();
    }
}