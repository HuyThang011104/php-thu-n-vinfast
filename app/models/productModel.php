<?php
class productModel extends model
{
    public function getListProduct($condition = '')
    {
        if (empty($condition)) {
            $query = $this->selectAll('product');
        } else {
            $query = $this->getAllraw("SELECT * FROM product WHERE $condition");
        }
        return $query;
    }
    public function getListProductASC()
    {
        $query = $this->getAllraw("SELECT * FROM car ORDER BY name ASC");
        return $query;
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
    public function renderProduct($id)
    {
        $query = $this->getRaw("SELECT * FROM product WHERE id = $id");
        if (!empty($query)) {
            return $query;
        }
        return false;
    }

    public function renderUser($id)
    {
        $query = $this->getRaw("SELECT * FROM user WHERE id = $id");
        if (!empty($query)) {
            return $query;
        }
        return false;
    }
    public function getUpdate($id = [])
    {
        $data = [
            'sản phẩm 1',
            'sản phẩm 2',
        ];
        return $data[$id];
    }
    public function getCategory()
    {
        $query = $this->selectAll('category');
        return $query;
    }
    public function validateProduct()
    {
        $filter = filter();
        $error = [];
        if (empty(trim($filter['name']))) {
            $error['name'] = "Vui lòng nhập tên sản phẩm";
            setFlashdata('name', $error['name']);
        }
        if (empty(trim($filter['description']))) {
            $error['description'] = "Vui lòng nhập mô tả sản phẩm";
            setFlashdata('description', $error['description']);
        }
        if (empty(trim($filter['detail']))) {
            $error['detail'] = "Vui lòng nhập thông tin chi tiết";
            setFlashdata('detail', $error['detail']);
        }
        if (empty(trim($filter['price']))) {
            $error['price'] = "Vui lòng nhập giá sản phẩm";
            setFlashdata('price', $error['price']);
        } else if (!isFloat($filter['price'])) {
            $error['price'] = "Vui lòng nhập đúng giá sản phẩm";
            setFlashdata('price', $error['price']);
        }
        if (empty(trim($filter['quantity']))) {
            $error['quantity'] = "Vui lòng nhập số lượng sản phẩm";
            setFlashdata('quantity', $error['quantity']);
        } else if (!isInt($filter['quantity'])) {
            $error['quantity'] = "Vui lòng nhập đúng số lượng sản phẩm";
            setFlashdata('quantity', $error['quantity']);
        }
        if (empty($_FILES['images']['tmp_name'])) {
            $error['images'] = "Vui lòng chọn ảnh";
            setFlashdata('images', $error['images']);
        }
        if (empty($filter['date'])) {
            $error['date'] = "Vui lòng chọn ngày đăng sản phẩm";
            setFlashdata('date', $error['date']);
        } else {
            if ($filter['date'] < date('Y-m-d')) {
                $error['date'] = "Vui lòng chọn ngày thích hợp";
                setFlashdata('date', $error['date']);
            }
        }
        setFlashdata('old', $filter);
        if (empty($error)) {
            $data = [
                'category_id' => $filter['category'],
                'name' => $filter['name'],
                'description' => $filter['description'],
                'detail' => $filter['detail'],
                'price' => $filter['price'],
                'quantity' => $filter['quantity'],
                'image' => $_FILES['images']['name'],
                'creat_at' => $filter['date'],
            ];
            return $data;
        } else {
            return false;
        }
    }
    public function insertProduct()
    {
        $dataInsert = $this->validateProduct();
        if ($dataInsert) {
            return $this->insert('product', $dataInsert);
        }
    }
    public function updateProduct($id = [])
    {
        $dataUpdate = $this->validateProduct();
        if (!empty($dataUpdate)) {
            $condition = "id='$id'";
            $update = $this->update('product', $dataUpdate, $condition);
            if (!empty($update)) {
                return $update;
            } else {
                return false;
            }
        }
    }
    public function deleteProduct($id)
    {
        $delete = $this->delete('product', "id='$id'");
        var_dump($delete);
        if ($delete) {
            return true;
        }
        return false;
    }
    public function uploadImage()
    {
        $target_dir = _DIR_ROOT . "/public/assets/image/";
        if (!empty($_FILES['images'])) {
            $target_file = $target_dir . $_FILES["images"]["name"];
            if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function getStatusLogin()
    {
        $tokenCookie = $_COOKIE['tokenCookie'];
        $query = $this->getRaw("SELECT * FROM logintoken WHERE token = '$tokenCookie' LIMIT 1");
        if (!empty($query)) {
            return $query['user_id'];
        }
        return false;
    }
    public function getUser()
    {
        if (!empty($this->getStatusLogin())) {
            $userId = $this->getStatusLogin();
            $query = $this->getRaw("SELECT * FROM user WHERE id = '$userId'");
            if (!empty($query)) {
                return $query;
            }
            return false;
        }
        return false;
    }
    public function validateBuy()
    {
        $filter = filter();
        $error = [];
        if (empty($filter['province'])) {
            $error['province'] = "Vui lòng nhập chọn tỉnh thành";
            setFlashdata('province', $error['province']);
        }
        if (empty($filter['showroom'])) {
            $error['showroom'] = "Vui lòng nhập chọn showroom";
            setFlashdata('showroom', $error['showroom']);
        }
        setFlashdata('old', $filter);
        if (empty($error)) {
            if (!empty($this->getStatusLogin())) {
                $userId = $this->getStatusLogin();
                $queryUser = $this->renderUser($userId);
                // echo $filter['phone'];
                // die();
                if (!empty($queryUser)) {
                    $data_user = [
                        'phone' => $filter['phone']
                    ];
                    $email = $queryUser['email'];
                    $statusUser = $this->update('user', $data_user, "id= $userId");
                }
                $idProduct = $filter['product_id'];
                // giảm số lượng trong sản phẩm
                $queryProduct = $this->renderProduct($idProduct);
                if (!empty($queryProduct)) {
                    $quantityProduct = $queryProduct['quantity'];
                    $updateQuantity = $quantityProduct - $filter['quantity'];
                    $data_product = [
                        'quantity' => $updateQuantity
                    ];
                    $statusProduct = $this->update('product', $data_product, "id= $idProduct");
                }
                if ($statusUser && $statusProduct) { // nếu thành công thì insert vào bill;
                    $data_bill_product = [
                        'user_id' => $userId,
                        'province_id' => $filter['province'],
                        'showroom_id' => $filter['showroom'],
                        'product_id' => $filter['product_id'],
                        'quantity' => $filter['quantity'],
                        'creat_at' => date('Y-m-d H:i:s')
                    ];
                    $statusBill = $this->insert('bill_product', $data_bill_product);
                    if ($statusBill) { // insert thành công thì gửi mail;
                        $title = 'Đơn hàng thành công';
                        $content = 'Cảm ơn bạn đã thanh toán thành công đơn hàng';
                        sendEmail($email, $title, $content);
                        return true;
                    }
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
