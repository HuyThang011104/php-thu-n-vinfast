<?php
class product extends controller
{
    public $data = [];
    public $product_model;
    public function __construct()
    {
        $this->product_model = $this->model('productModel');
        // var_dump($this->product_model);
    }
    public function index()
    {
        $condition = '';
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
        $getListProductASC = $this->product_model->getListProductASC();
        $this->data['sub_header']['list_asc'] = $getListProductASC;
        $this->data['header'] = 'client/block/header';
        $get_category = $this->product_model->getCategory();
        $this->data['sub_content']['get_category'] = $get_category;
        $get_listProduct = $this->product_model->getListProduct($condition);
        $this->data['sub_content']['list_product'] = $get_listProduct;
        $this->data['page_title'] = "Sản phẩm Vinfast";
        $this->data['sidebar'] = 'client/block/navbar';
        $this->data['content_product'] = 'client/products/slider';
        $this->data['content'] = 'client/products/list';
        $this->view('layout/client_layout', $this->data);
    }
    public function details()
    {
        $getId = explode('/', $_SERVER['PATH_INFO'])[4];
        $getListProductASC = $this->product_model->getListProductASC();
        $this->data['sub_header']['list_asc'] = $getListProductASC;
        $this->data['header'] = 'client/block/header';
        $renderUpdate = $this->product_model->renderProduct($getId);
        $this->data['sub_sidebar']['renderProduct'] = $renderUpdate;
        $this->data['sub_content']['list_product'] = "";
        $this->data['page_title'] = $renderUpdate['name'];
        $this->data['slider'] = '';
        $this->data['sidebar'] = 'client/products/navbar';
        $this->data['content_product'] = 'client/products/details';
        $this->data['content'] = '';
        $this->view('layout/client_layout', $this->data);
    }
    public function buy()
    {
        $getId = explode('/', $_SERVER['PATH_INFO'])[4];
        $getListProductASC = $this->product_model->getListProductASC();
        $this->data['sub_header']['list_asc'] = $getListProductASC;
        $this->data['header'] = 'client/block/header';
        $renderProduct = $this->product_model->renderProduct($getId);
        $getUser = $this->product_model->getUser();
        $getProvince = $this->product_model->getAllprovince();
        $getShowroom = $this->product_model->getAllshowroom();
        $this->data['page_title'] = $renderProduct['name'];
        $this->data['sub_content']['getUser'] = $getUser;
        $this->data['sub_content']['getShowroom'] = $getShowroom;
        $this->data['sub_content']['getProvince'] = $getProvince;
        $this->data['sub_content']['renderProduct'] = $renderProduct;
        $this->data['content'] = 'client/products/buy';
        $this->view('layout/client_layout', $this->data);
    }
    public function postBuy()
    {
        $statusBuy = $this->product_model->validateBuy();
        if ($statusBuy) {
            setFlashdata('value', 'Thanh toán đơn hàng thành công');
            setFlashdata('type', 'success');
            // reload(__WEB_ROOT .'client/user/history');
        } else {
            setFlashdata('value', 'Thanh toán thất bại, vui lòng thử lại');
            setFlashdata('type', 'danger');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
}
