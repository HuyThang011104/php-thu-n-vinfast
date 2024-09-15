<?php 

class car extends controller{
    public $data = [];
    public $car_model;
    public function __construct()
    {
        $this->car_model = $this->model('carModel');
    }
    public function index(){
        setFlashdata('old',filter());
        $condition='';
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
        $getListCar = $this->car_model->getListCar($condition);
        $this->data['sub_content']['list_car'] = $getListCar;
        if(!$getListCar){
            setFlashdata('find','Không tìm thấy xe ô tô nào!');
        }
        $this->data['page_title']="Danh sách ô tô Vinfast";
        $this->data['content'] = 'admin/car/list';
        $this->view('layout/admin_layout',$this->data);
    }
    public function add()
    {
        $this->data['sub_content']['get_category'] = "";
        $this->data['page_title'] = "Thêm ô tô";
        $this->data['content'] = 'admin/car/add';
        $this->view('layout/admin_layout', $this->data);
    }
    public function postAdd()
    {
        $upload = $this->car_model->uploadImage();
        $insertStatus = $this->car_model->insertCar();
        if ($insertStatus && $upload == true) {
            setFlashdata('value', 'Thêm ô tô Vinfast thành công');
            setFlashdata('type', 'success');
        } else {
            setFlashdata('value', 'Thêm ô tô Vinfast thất bại');
            setFlashdata('type', 'danger');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
    public function postUpdate()
    {
        $getId = explode('/', $_SERVER['PATH_INFO'])[4];
        // echo $getId;
        // die();
        $upload = $this->car_model->uploadImage();
        $updateStatus = $this->car_model->updateCar($getId);
        if ($updateStatus && $upload) {
            setFlashdata('value', 'Chỉnh sửa ô tô thành công');
            setFlashdata('type', 'success');
        } else {
            setFlashdata('value', 'Chỉnh sửa ô tô thất bại');
            setFlashdata('type', 'danger');
            // setFlashdata('upload', 'file chưa thể tải lên');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
    public function update()
    {
        $getId = explode('/', $_SERVER['PATH_INFO'])[4];
        $update = $this->car_model->renderCar($getId);
        $this->data['sub_content']['renderCar'] = $update;
        $this->data['content'] = 'admin/car/update';
        $this->data['page_title'] = "Chỉnh sửa xe";
        $this->view('layout/admin_layout', $this->data);
    }
    public function delete()
    {
        $getId = explode('/', $_SERVER['PATH_INFO'])[4];
        $delete = $this->car_model->deleteCar($getId);
        if (!empty($delete)) {
            setFlashdata('value', 'Đã xóa thành công');
            setFlashdata('type', 'success');
        } else {
            setFlashdata('value', 'Xóa thất bại!');
            setFlashdata('type', 'danger');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
}