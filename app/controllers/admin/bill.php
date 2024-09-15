<?php
class bill extends controller{
    public $data =[];
    public $bill_model;
    public function __construct()
    {
        $this->bill_model = $this->model('billModel');
    }
    public function index(){
        $getListBill = $this->bill_model->getListBill();
        $this->data['sub_content']['list_bill'] = $getListBill;
        $getListCar = $this->bill_model->getAllCar();
        $this->data['sub_content']['list_car'] = $getListCar;
        $getListShowroom = $this->bill_model->getAllShowroom();
        $this->data['sub_content']['list_showroom'] = $getListShowroom;
        $getListProvince = $this->bill_model->getAllprovince();
        $this->data['sub_content']['list_province'] = $getListProvince;
        $this->data['page_title'] = "Danh sách đơn hàng";
        $this->data['content'] = 'admin/bill/list';
        $this->view('layout/admin_layout', $this->data);
    }
    public function product(){
        $condition ='';
        if (!empty($_POST)) {
            foreach ($_POST as $keys => $value) {
                if (!empty(trim($value))) {
                    if ($condition != '') {
                        $condition .= " OR ";
                    }
                    $condition .= $keys . "='" . $value . "'";
                }
            }
        }
        $getBillProduct = $this->bill_model->getListBillProduct(); // lấy bill phụ kiện
        $this->data['sub_content']['list_bill_product']= $getBillProduct;
        $getListUser = $this->bill_model->getAllUser(); // lấy người dùng
        $this->data['sub_content']['list_user']=$getListUser;
        $getListProduct = $this->bill_model->getListProduct(); // lấy sản phẩm
        $this->data['sub_content']['list_product']=$getListProduct;
        $getListProvince = $this->bill_model->getAllprovince(); // lấy tỉnh thành
        $this->data['sub_content']['list_province'] = $getListProvince;
        $getListShowroom = $this->bill_model->getAllShowroom(); // lấy showroom
        $this->data['sub_content']['list_showroom'] = $getListShowroom;
        $this->data['page_title'] = "đơn hàng sản phẩm";
        $this->data['content'] = 'admin/bill/list_product';
        $this->view('layout/admin_layout', $this->data);
    }
    public function delete(){
        $getId = explode('/', $_SERVER['PATH_INFO'])[4];
        $statusDelete = $this->bill_model->deleteBill($getId);
        if ($statusDelete) {
            setFlashdata('value', 'Xác nhận đơn hàng thành công');
            setFlashdata('type', 'success');
        } else {
            setFlashdata('value', 'Xác nhận đơn hàng thất bại');
            setFlashdata('type', 'danger');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
    public function deleteProduct(){
        $getId = explode('/', $_SERVER['PATH_INFO'])[4];
        $statusDelete = $this->bill_model->deleteBillProduct($getId);
        if ($statusDelete) {
            setFlashdata('value', 'Xác nhận đơn hàng thành công');
            setFlashdata('type', 'success');
        } else {
            setFlashdata('value', 'Xác nhận đơn thất bại');
            setFlashdata('type', 'danger');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
}

?>