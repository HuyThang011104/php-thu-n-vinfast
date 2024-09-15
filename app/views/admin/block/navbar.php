<?php

?>
<div class="d-flex flex-column flex-shrink-0 p-3 rounded" style="background-color: #fff;">
    <a href="/" class="d-flex align-items-center link-dark text-decoration-none justify-content-center">
        <span class="fs-5 ">Quản lý sản phẩm</span>
    </a>
    <hr>
    <ul class="navbar-click nav nav-pills flex-column mb-auto">
        <li>
            <a href="<?php
                        if (urlHandle() == 'admin/product') {
                            echo __WEB_ROOT . 'admin/product/index';
                        } else if (urlHandle() == 'admin/car')
                            echo __WEB_ROOT . 'admin/car/index';
                        else if(urlHandle() == 'admin/bill') 
                            echo __WEB_ROOT . 'admin/bill/index'; ?>" class=" btn 
                            <?php 
                            if (urlWeb('product', 'index') || urlWeb('car', 'index') || urlWeb('bill','index')) { echo 'btn-primary'; } 
                            ?>" style="width: 100%;" aria-current="page">
                <?php 
                if(!empty(urlWeb('bill','index')) || !empty(urlWeb('bill','product'))){
                    echo 'Danh sách ô tô';
                }else{
                    echo 'danh sách';
                }
                 ?>         
            </a>
        </li>
        <li>
            <a href="<?php
                        if (urlHandle() == 'admin/product')
                            echo __WEB_ROOT . 'admin/product/add';
                        else if (urlHandle() == 'admin/car')
                            echo __WEB_ROOT . 'admin/car/add';
                        else if (urlHandle()=='admin/bill')
                            echo __WEB_ROOT.'admin/bill/product' ?>" class="btn <?php if (urlWeb('product', 'add') || urlWeb('car', 'add') ||urlWeb('bill','product')) echo 'btn-primary' ?>" style="width: 100%;">
                <?php 
                if(!empty(urlWeb('bill','index')) || !empty(urlWeb('bill','product'))){
                    echo 'Danh sách phụ kiện';
                }else{
                    echo 'Thêm';
                }
                 ?>   
            </a>
        </li>
    </ul>
</div>
<script>

</script>