<!-- <h1>home</h1> -->
<?php 
class home extends controller{
    // để mặc định thì sẽ phải chạy vào index;
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('homeModel'); // sử dụng phương thức của class controller
    }

    public function index(){
        echo 'Đang chạy index trong home (Trang chủ)'.'<br>';
        $data = $this->model_home->getList(); // đối tượng $this->model trỏ đến phương thức là getList được gán vào biến $data;
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        reload(__WEB_ROOT.'client/introduce');
        // $detail = $this->model_home->detail(0);
        // echo 'xuất';
        // echo '<pre>';
        // print_r($detail);
        // echo '</pre>';
    }
    public function detail($id=0){
        $detail = $this->model_home->detail($id);
        echo '<pre>';
        print_r($detail);
        echo '</pre>';
    }

}