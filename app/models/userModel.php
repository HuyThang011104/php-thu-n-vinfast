<?php
class userModel extends model
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
    public function getListBill($condition)
    {
        $query = $this->getAllraw("SELECT * FROM bill_product WHERE $condition");
        return $query;
    }
    public function getListProductASC()
    {
        $query = $this->getAllraw("SELECT * FROM car ORDER BY name ASC");
        return $query;
    }
    public function renderUser($id)
    {
        $query = $this->getRaw("SELECT * FROM user WHERE id = $id");
        if (!empty($query)) {
            return $query;
        }
        return false;
    }
    public function removeLogin($id){
        $remove = $this->delete('logintoken',"user_id = $id ");
        if($remove){
            return true;
        }
        return false;
    }
    public function updateUser($id){
        $data = [
            'fullname' => $_POST['fullname'],
            'phone'=> $_POST['phone'],
        ];
        return $this->update('user',$data,"id = $id");
    }
    public function validateUser()
    {
        $error = [];
        if (isPost()) {
            $filter = filter();
            if (!empty($filter['fullname'])) {
                if (strlen($filter['fullname']) < 5) {
                    $error['fullname'] = 'họ tên tối thiểu phải 5 kí tự';
                    setFlashdata('fullname', $error['fullname']);
                }
            } else {
                $error['fullname'] = 'Họ tên không được bỏ trống';
                setFlashdata('fullname', $error['fullname']);
            }
            if (empty($filter['email'])) {
                $error['email'] = 'Email không được bỏ trống';
                setFlashdata('email', $error['email']);
            } else {
                if ($this->checkEmail($filter['email'])) {
                    $error['email'] = 'Tài khoản Email đã tồn tại!';
                    setFlashdata('email', $error['email']);
                }
            }
            if (empty($filter['phone'])) {
                $error['phone'] = 'Số điện thoại không được bỏ trống';
                setFlashdata('phone', $error['phone']);
            }
            if (!empty($filter['password'])) {
                if (strlen($filter['password']) < 8) {
                    $error['password'] = 'Mật khẩu tối thiểu phải 8 kí tự';
                    setFlashdata('password', $error['password']);
                }
            } else {
                $error['password'] = 'Mật khẩu không được bỏ trống';
                setFlashdata('password', $error['password']);
            }
            if (empty($filter['confirm_pass'])) {
                $error['confirm_pass'] = 'Xác nhận mật khẩu không được bỏ trống';
                setFlashdata('confirm_pass', $error['confirm_pass']);
            } else {
                if ($filter['password'] != $filter['confirm_pass']) {
                    $error['confirm_pass'] = 'Mật khẩu không trùng khớp';
                    setFlashdata('confirm_pass', $error['confirm_pass']);
                }
            }

            setFlashdata('old', $filter);
            if (empty($error)) {
                $activeToken = sha1(uniqid() . time());
                $secretPass = password_hash($filter['password'], PASSWORD_DEFAULT);
                $data = [
                    'fullname' => $filter['fullname'],
                    'email' => $filter['email'],
                    'phone' => $filter['phone'],
                    'password' => $secretPass,
                    'activeToken' => $activeToken,
                    'create_at' => date('Y-m-d H:i:s')
                ];
                $title = 'Kích hoạt tài khoản đăng kí';
                $content = 'Vui lòng ấn vào link để kích hoạt tài khoản' . '<br>';
                $content .= __WEB_ROOT . 'client/user/activeAccount/'; // Truyền đường dẫn kích hoạt vào đây
                $content .= $activeToken;
                sendEmail($filter['email'], $title, $content);
                return $data;
            } else {
                return false;
            }
        }
    }
    public function insertUser()
    {
        $dataInsert = $this->validateUser();
        if ($dataInsert) {
            return $this->insert('user', $dataInsert);
        }
    }
    public function handleRegister($token)
    {
        $getQuery = $this->getRaw("SELECT id FROM user WHERE activeToken = '$token' ");
        if ($getQuery) {
            $data = [
                'status' => 1,
                'activeToken' => null,
            ];
            $queryId = $getQuery['id'];
            $condition = "id = $queryId";
            return $this->update('user', $data, $condition);
        }
        return false;
    }
    public function validateLogin()
    {
        $error = [];
        $filter = filter();
        if (isPost()) {
            if (empty($filter['email'])) {
                $error['email'] = 'Email không được bỏ trống';
                setFlashdata('email', $error['email']);
            } else {
                if (!$this->checkEmail($filter['email'])) {
                    $error['email'] = 'Tài khoản Email không tồn tại!';
                    setFlashdata('email', $error['email']);
                } else {
                    $email = $filter['email'];
                    $queryLogin = $this->getRaw("SELECT * FROM user WHERE email = '$email'");
                    $status = $queryLogin['status']; // lấy trạng thái
                    $loginToken = sha1(uniqid() . time());
                }
            }
            if (empty($filter['password'])) {
                $error['password'] = 'Mật khẩu không được bỏ trống';
                setFlashdata('password', $error['password']);
            } else {
                if (strlen($filter['password']) < 8) {
                    $error['password'] = 'Mật khẩu tối thiểu 8 kí tự';
                    setFlashdata('password', $error['password']);
                } else {
                    $checkLogin = $this->checkLogin($filter['email'], $filter['password']);
                    if ($checkLogin == false) {
                        $error['password'] = 'Mật khẩu không chính xác';
                        setFlashdata('password', $error['password']);
                    } else {
                        if ($status == 0) {
                            $error['password'] = 'Vui lòng vào gmail để kích hoạt tài khoản';
                            setFlashdata('password', $error['password']);
                        }
                    }
                }
            }
            setFlashdata('old', $filter);
            if (empty($error)) {
                $dataInsert = [
                    'user_id' => $queryLogin['id'],
                    'token' => $loginToken,
                    'creat_at' => date('Y-m-d H:i:s'),
                ];
                // nếu đăng nhập thành công, sẽ tạo cookie để giới hạn thời gian đăng nhập
                setcookie('tokenCookie', $loginToken, time() + 86400, '/projectVinfast'); // 1 ngày;
                return $this->insert('logintoken', $dataInsert);
            }
            return false;
        }
    }
    public function StatusLogin()
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
        if (!empty($this->StatusLogin())) {
            $userId = $this->StatusLogin();
            $query = $this->getRaw("SELECT * FROM user WHERE id = '$userId'");
            if (!empty($query)) {
                return $query;
            }
            return false;
        }
        return false;
    }
}
