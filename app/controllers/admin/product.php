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
        setFlashdata('old', filter());
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
        $get_category = $this->product_model->getCategory();
        $this->data['sub_content']['get_category'] = $get_category;
        $get_listProduct = $this->product_model->getListProduct($condition);
        $this->data['sub_content']['list_product'] = $get_listProduct;
        if(!$get_listProduct){
            setFlashdata('find','Không tìm thấy sản phẩm');
        }
        $this->data['page_title'] = "Danh sách sản phẩm";
        $this->data['content'] = 'admin/products/list';
        $this->view('layout/admin_layout', $this->data);
    }
    public function add()
    {
        $get_category = $this->product_model->getCategory();
        $this->data['sub_content']['get_category'] = $get_category;
        $this->data['page_title'] = "Thêm sản phẩm";
        $this->data['content'] = 'admin/products/add';
        $this->view('layout/admin_layout', $this->data);
    }

    public function postAdd()
    {
        $upload = $this->product_model->uploadImage();
        $insertStatus = $this->product_model->insertProduct();
        if ($insertStatus && $upload == true) {
            setFlashdata('value', 'Thêm sản phẩm thành công');
            setFlashdata('type', 'success');
        } else {
            setFlashdata('value', 'Thêm sản phẩm thất bại');
            setFlashdata('type', 'danger');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
    public function update($id = 0)
    {
        $get_category = $this->product_model->getCategory();
        $this->data['sub_content']['getCategory'] = $get_category;
        $renderUpdate = $this->product_model->renderProduct($id);
        $this->data['sub_content']['renderUpdate'] = $renderUpdate;
        $update = $this->product_model->getListProduct();
        $this->data['sub_content']['query_update'] = $update;
        $this->data['content'] = 'admin/products/update';
        $this->data['page_title'] = "Chỉnh sửa sản phẩm";
        $this->view('layout/admin_layout', $this->data);
    }
    public function postUpdate()
    {
        $getId = explode('/', $_SERVER['PATH_INFO'])[4];
        $upload = $this->product_model->uploadImage();
        $updateStatus = $this->product_model->updateProduct($getId);
        if ($updateStatus && $upload) {
            setFlashdata('value', 'Chỉnh sửa sản phẩm thành công');
            setFlashdata('type', 'success');
        } else {
            setFlashdata('value', 'Chỉnh sửa sản phẩm thất bại');
            setFlashdata('type', 'danger');
            // setFlashdata('upload', 'file chưa thể tải lên');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
    public function delete()
    {
        $getId = explode('/', $_SERVER['PATH_INFO'])[4];
        $delete = $this->product_model->deleteProduct($getId);
        if (!empty($delete)) {
            setFlashdata('value', 'Đã xóa thành công');
            setFlashdata('type', 'success');
        } else {
            setFlashdata('value', 'Xóa sản phẩm thất bại');
            setFlashdata('type', 'danger');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
}
