<?php 

class introduce extends controller{
    public $data = [];
    public $introduce_model;
    public function __construct()
    {
        $this->introduce_model = $this->model('introduceModel');
    }
    public function index(){
        $getListCarASC = $this->introduce_model->getListCarASC();
        $this->data['sub_header']['list_asc'] = $getListCarASC;
        $this->data['header'] = 'client/block/header';
        $this->data['sub_main_content']['']='';
        $this->data['page_title']="Giới thiệu-Vinfast";
        $this->data['main_content']='client/introduce/index';
        $this->view('layout/client_layout', $this->data);
    }
}