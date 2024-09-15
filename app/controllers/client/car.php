<?php 
class car extends controller{
    public $data = [];
    public $car_model;
    public function __construct()
    {
        $this->car_model = $this->model('carModel');
    }
    public function details(){
        $getId = explode('/',$_SERVER['PATH_INFO'])[4];
        $getListCarASC = $this->car_model->getListCarASC();
        $this->data['sub_header']['list_asc'] = $getListCarASC;
        $this->data['header'] = 'client/block/header';
        $renderCar = $this->car_model->renderCar($getId);
        $this->data['sub_main_content']['renderCar']=$renderCar;
        $getAllprovince = $this->car_model->getAllprovince();
        $this->data['sub_main_content']['getAllprovince']=$getAllprovince;
        $getAllshowroom = $this->car_model->getAllshowroom();
        $this->data['sub_main_content']['getAllshowroom']=$getAllshowroom;
        $this->data['page_title']='VinFast-'.$renderCar['name'];
        $this->data['main_content'] = 'client/car/details';
        $this->data['content']='';
        $this->view('layout/client_layout', $this->data);
    }
    public function postBookCar(){
        $getId = explode('/',$_SERVER['PATH_INFO'])[4];
        $validateBookCar = $this->car_model->validateBookCar($getId);
        if($validateBookCar){
            setFlashdata('value','Đã gửi thông tin thành công');
            setFlashdata('type','success');
        }else{
            setFlashdata('value','Đặt cọc thất bại, vui lòng thử lại');
            setFlashdata('type','danger');
        }
        reload($_SERVER['HTTP_REFERER']);
    }
}
?>