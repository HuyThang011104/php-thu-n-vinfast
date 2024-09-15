<?php
class billModel extends model
{
    public function getListBill($condition = '')
    {
        if (empty($condition)) {
            $query = $this->selectAll('bill_car');
        } else {
            $query = $this->getAllraw("SELECT * FROM bill_car WHERE $condition");
        }
        return $query;
    }
    public function getListBillProduct($condition = '')
    {
        if (empty($condition)) {
            $query = $this->selectAll('bill_product');
        } else {
            $query = $this->getAllraw("SELECT * FROM bill_product WHERE $condition");
        }
        return $query;
    }
    public function getAllProvince()
    {
        $query = $this->selectAll("province");
        return $query;
    }
    public function getAllUser()
    {
        $query = $this->selectAll("user");
        return $query;
    }
    public function getAllShowroom()
    {
        $query = $this->selectAll("showroom");
        return $query;
    }
    public function getAllCar()
    {
        $query = $this->selectAll("car");
        return $query;
    }
    public function getListProduct($condition = '')
    {
        if (empty($condition)) {
            $query = $this->selectAll('product');
        } else {
            $query = $this->getAllraw("SELECT * FROM product WHERE $condition");
        }
        return $query;
    }
    public function deleteBill($id)
    {
        $delete = $this->delete('bill_car', "id='$id'");
        if ($delete) {
            return true;
        }
        return false;
    }
    public function deleteBillProduct($id)
    {
        $delete = $this->delete('bill_product', "id='$id'");
        if ($delete) {
            return true;
        }
        return false;
    }
}
