<?php

?>
<header class="shadow-sm" style="position: fixed; min-width:100%; z-index:1000;">
  <nav class="navbar navbar-expand-lg bg-body " aria-label="Eleventh navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="<?php echo __WEB_ROOT; ?>public/assets/admin/image/logo.png" alt="">
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarsExample09">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="<?php if(urlHandle()=='admin/product') echo 'text-primary'?> nav-link" href="<?php echo __WEB_ROOT . 'admin/product/index' ?>">
              Sản phẩm
            </a>
          </li>
          <li class="nav-item">
            <a class="<?php if(urlHandle()=='admin/car') echo 'text-primary' ?> nav-link" href="<?php echo __WEB_ROOT . 'admin/car' ?>">
              Ô tô
            </a>
          </li>
          <li class="nav-item">
            <a class="<?php if(urlHandle()=='admin/bill') echo 'text-primary' ?> nav-link" href="<?php echo __WEB_ROOT . 'admin/bill' ?>">
              Đơn hàng 
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>