<?php
class user extends controller
{
    public $data = [];
    public $user_model;
    public function __construct()
    {
        $this->user_model = $this->model('userModel');
    }
    public function register()
    {
        $this->data['sub_content']['list_product'] = "";
        $this->data['page_title'] = "Đăng ký";
        $this->data['content'] = 'client/user/register';
        $this->view('layout/client_layout', $this->data);
    }
    public function postRegister()
    {
        $insertStatus = $this->user_model->insertUser();
        if ($insertStatus) {
            setFlashdata('value', 'Đăng ký tài khoản thành công, vui lòng vào gmail để kích hoạt tài khoản');
            setFlashdata('type', 'success');
        } else {
            setFlashdata('value', 'Đăng ký tài khoản thất bại');
            setFlashdata('type', 'danger');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
    public function activeAccount($token)
    {
        $handleRegister = $this->user_model->handleRegister($token);
        if ($handleRegister) {
            setFlashdata('value', 'Đăng ký tài khoản thành công, hãy đăng nhập');
            setFlashdata('type', 'success');
            reload(__WEB_ROOT . 'client/user/login');
        } else {
            setFlashdata('value', 'Đăng ký tài khoản thất bại');
            setFlashdata('type', 'danger');
        }
    }
    public function login()
    {
        $statusLogin = $this->user_model->StatusLogin();
        if ($statusLogin) {
            reload(__WEB_ROOT . 'client/user/profile');
        }
        $this->data['sub_content']['list_product'] = "";
        $this->data['page_title'] = "Đăng nhập";
        $this->data['content'] = 'client/user/login';
        $this->view('layout/client_layout', $this->data);
    }
    public function postLogin()
    {
        $statusLogin = $this->user_model->validateLogin();
        if ($statusLogin) {
            setFlashdata('value', 'Đăng nhập thành công');
            setFlashdata('type', 'success');
        } else {
            setFlashdata('value', 'Đăng nhập tài khoản thất bại, vui lòng kiểm tra lại');
            setFlashdata('type', 'danger');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
    public function profile()
    {
        $statusLogin = $this->user_model->StatusLogin(); // ở đây là lấy id người dùng đăng nhập 
        if (!$statusLogin) {
            reload(__WEB_ROOT . 'client/user/login');
        } else {
            $getListProductASC = $this->user_model->getListProductASC();
            $this->data['sub_header']['list_asc'] = $getListProductASC;
            $this->data['header'] = 'client/block/header';

            $getUser = $this->user_model->getUser();
            $this->data['sub_sidebar_user']['getUser'] = $getUser;

            $this->data['sidebar_user'] = 'client/user/sidebar';
            $this->data['sub_content_user']['getUser'] = $getUser;
            $this->data['page_title'] = "Thông tin cá nhân";
            $this->data['content_user'] = 'client/user/profile';
            $this->view('layout/client_layout', $this->data);
        }
    }

    public function history()
    {
        $statusLogin = $this->user_model->StatusLogin(); // ở đây là lấy id người dùng đăng nhập 
        if (!$statusLogin) { // nếu chưa đăng nhập;
            reload(__WEB_ROOT . 'client/user/login');
        } else {
            $getListProductASC = $this->user_model->getListProductASC();
            $this->data['sub_header']['list_asc'] = $getListProductASC;
            $this->data['header'] = 'client/block/header';

            $getUser = $this->user_model->getUser();
            $this->data['sub_sidebar_user']['getUser'] = $getUser;

            $conditionBill = "user_id = '$statusLogin'";
            $getListBill = $this->user_model->getListBill($conditionBill);
            $this->data['sub_content_user']['getListBill'] = $getListBill;

            $getListProduct = $this->user_model->getListProduct();
            $this->data['sub_content_user']['getListProduct'] = $getListProduct;

            $this->data['sidebar_user'] = 'client/user/sidebar';
            $this->data['page_title'] = "Lịch sử giao dịch";
            $this->data['content_user'] = 'client/user/history';
            $this->view('layout/client_layout', $this->data);
        }
    }
    public function logout(){
        $statusLogin = $this->user_model->StatusLogin(); 
        if ($statusLogin) {
            $statusDelete = $this->user_model->removeLogin($statusLogin);
            if($statusDelete){
                setFlashdata('value','Đăng xuất thành công');
                setFlashdata('type','success');
            }else{
                setFlashdata('value','Đăng xuất thất bại');
                setFlashdata('type','error');
            }
        }
        reload($_SERVER['HTTP_REFERER']);
    }
    public function postEdit(){
        $statusLogin = $this->user_model->StatusLogin(); 
        if($statusLogin){
            $statusUpdate = $this->user_model->updateUser($statusLogin);
            if($statusUpdate){
                setFlashdata('value','Chỉnh sửa thông tin thành công');
                setFlashdata('type','success');
            }else{
                setFlashdata('value','Chỉnh sửa thông tin thất bại');
                setFlashdata('type','error');
            }
        }
        reload($_SERVER['HTTP_REFERER']);
    }
}
