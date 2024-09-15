<?php
class carModel extends model
{
    public function getListCar($condition = '')
    {
        if (empty($condition)) {
            $query = $this->selectAll('car');
        } else {
            $query = $this->getAllraw("SELECT * FROM car WHERE $condition");
        }
        return $query;
    }
    public function getListCarASC()
    {
        $query = $this->getAllraw("SELECT * FROM car ORDER BY name ASC");
        return $query;
    }
    public function renderCar($id)
    {
        $query = $this->getRaw("SELECT * FROM car WHERE id = $id");
        if (!empty($query)) {
            return $query;
        }
        return false;
    }
    public function getAllprovince()
    {
        $query = $this->selectAll("province");
        return $query;
    }
    public function getAllshowroom()
    {
        $query = $this->selectAll("showroom");
        return $query;
    }
    public function validNameCar()
    {
        $name = filter()['name'];
        $query = $this->getRaw("SELECT * FROM car WHERE name ='$name'");
        if (!empty($query)) {
            return $query;
        }
        return false;
    }
    public function validateCar()
    {
        $filter = filter();
        $error = [];
        if (empty(trim($filter['name']))) {
            $error['name'] = "Vui lòng nhập tên ô tô";
            setFlashdata('name', $error['name']);
        }
        if (empty($filter['chair_number'])) {
            $error['chair_number'] = "Vui lòng nhập số ghế trên ô tô";
            setFlashdata('chair_number', $error['chair_number']);
        } else if (!isInt($filter['chair_number'])) {
            $error['chair_number'] = "Vui lòng nhập đúng kiểu số ghế ô tô";
            setFlashdata('chair_number', $error['chair_number']);
        }
        if (empty(trim($filter['consume']))) {
            $error['consume'] = "Vui lòng nhập mức tiêu thụ năng lượng";
            setFlashdata('consume', $error['consume']);
        } else if (!isInt($filter['consume'])) {
            $error['consume'] = "Vui lòng nhập đúng kiểu số tiêu thụ năng lượng";
            setFlashdata('consume', $error['consume']);
        }
        if (empty(trim($filter['max_capacity']))) {
            $error['max_capacity'] = "Vui lòng nhập dung tích tối đa";
            setFlashdata('max_capacity', $error['max_capacity']);
        } else if (!isInt($filter['max_capacity'])) {
            $error['max_capacity'] = "Vui lòng nhập đúng kiểu số dung tích tối đa";
            setFlashdata('max_capacity', $error['max_capacity']);
        }
        if (empty(trim($filter['price']))) {
            $error['price'] = "Vui lòng nhập giá";
            setFlashdata('price', $error['price']);
        } else if (!isFloat($filter['price'])) {
            $error['price'] = "Vui lòng nhập đúng giá";
            setFlashdata('price', $error['price']);
        }
        if (empty($_FILES['image']['tmp_name'])) {
            $error['image'] = "Vui lòng chọn ảnh!";
            setFlashdata('image', $error['image']);
        }
        if (empty($_FILES['image_main']['tmp_name'])) {
            $error['image_main'] = "Vui lòng chọn ảnh xoay chính!";
            setFlashdata('image_main', $error['image_main']);
        }
        if (empty(trim($filter['description']))) {
            $error['description'] = "Vui lòng nhập mô tả";
            setFlashdata('description', $error['description']);
        }
        setFlashdata('old', $filter);
        if (empty($error)) {
            $data = [
                'name' => $filter['name'],
                'kind_of' => $filter['kind_of'],
                'chair_number' => $filter['chair_number'],
                'consume' => $filter['consume'],
                'max_capacity' => $filter['max_capacity'],
                'price' => $filter['price'],
                'description' => $filter['description'],
                'image' => $_FILES['image']['name'],
                'image_main' => $_FILES['image_main']['name']
            ];
            return $data;
        } else {
            return false;
        }
    }
    public function insertCar()
    {
        $dataInsert = $this->validateCar();
        if ($dataInsert) {
            return $this->insert('car', $dataInsert);
        }
    }
    public function updateCar($id)
    {
        $dataUpdate = $this->validateCar();
        if (!empty($dataUpdate)) {
            $condition = "id='$id'";
            $update = $this->update('car', $dataUpdate, $condition);
            if ($update) {
                return $update;
            } else {
                return false;
            }
        }
    }
    public function deleteCar($id)
    {
        $delete = $this->delete('car', "id='$id'");
        // var_dump($delete);
        if ($delete) {
            return true;
        }
        return false;
    }
    public function uploadImage()
    {
        $target_dir = _DIR_ROOT . "/public/assets/image/";
        if (!empty($_FILES['image'])) {
            $target_file = $target_dir . $_FILES["image"]["name"];
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function validateBookCar($id)
    {
        $filter = filter();
        $error = [];
        if (isPost()) { // chưa xong
            if (empty($filter['name'])) {
                $error['name'] = "Vui lòng nhập họ tên";
                setFlashdata('name', $error['name']);
            }
            if (empty($filter['phone'])) {
                $error['phone'] = "Vui lòng nhập số điện thoại";
                setFlashdata('phone', $error['phone']);
            } else {
                if (strlen($filter['phone']) != 10) {
                    $error['phone'] = "Vui lòng nhập đúng 10 số";
                    setFlashdata('phone', $error['phone']);
                }
            }
            if (empty($filter['cccd'])) {
                $error['cccd'] = "Vui lòng nhập căn cước công nhân";
                setFlashdata('cccd', $error['cccd']);
            } else if (strlen($filter['cccd']) != 12) {
                $error['cccd'] = "Vui lòng nhập đúng 12 số";
                setFlashdata('cccd', $error['cccd']);
            }
            if (empty($filter['email'])) {
                $error['email'] = "Vui lòng nhập email";
                setFlashdata('email', $error['email']);
            }
            if (empty($filter['province'])) {
                $error['province'] = "Vui lòng chọn tỉnh thành để nhận xe";
                setFlashdata('province', $error['province']);
            }
            if (empty($filter['showroom'])) {
                $error['showroom'] = "Vui lòng chọn showroom để nhận xe";
                setFlashdata('showroom', $error['showroom']);
            }
            if(empty($filter['pay'])){
                $error['pay'] = "Vui lòng chọn hình thức thanh toán";
                setFlashdata('pay',$error['pay']);
            }
        }
        setFlashdata('old', $filter);
        if($filter['receive_info']==null){
            $filter['receive_info'] = 0;
        }
        if (empty($error)) {
            $data = [
                'id_car' => $id,
                'name' => $filter['name'],
                'phone' => $filter['phone'],
                'cccd' => $filter['cccd'],
                'email' => $filter['email'],
                'status_pay' => 1,
                'province' => $filter['province'],
                'showroom' => $filter['showroom'],
                'receive_info' => $filter['receive_info'],
            ];
            return $this->insert('bill_car',$data);
        } else {
            return false;
        }
    }
}
