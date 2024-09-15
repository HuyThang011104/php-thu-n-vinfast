<?php
// sẽ kế thừa class Model(viết ở trong core)
class homeModel extends model{
    // protected $_table = 'products';
    public function getList(){
        $data =[
            'item-1',
            'item-2',
            'item-3'
        ];
        return $data;
    }
    public function detail($id=[]){
        $data =[
            'item-1',
            'item-2',
            'item-3'
        ];
        return $data[$id];
    }
}