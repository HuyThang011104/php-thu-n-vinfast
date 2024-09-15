<style>
  .hover-user {
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  a:hover {
    color: var(--text-primary) !important;
  }

  .hover-user:hover {
    background-color: #87b4dd;
  }
</style>
<?php
// echo '<pre>';
// print_r($list_car);
// echo '</pre>';
?>
<header style="position: fixed; min-width:100%; z-index:1000;top:0">
  <nav class="navbar navbar-expand-lg bg-body shadow-sm" aria-label="Eleventh navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="<?php echo __WEB_ROOT; ?>public/assets/admin/image/logo.png" alt="">
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarsExample09">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center" style="font-weight: 500;">
          <li class="nav-item mx-3">
            <a class="<?php if (urlHandle() == 'client/introduce') echo 'text-primary'; ?> p-0" href="<?php echo __WEB_ROOT . 'client/introduce' ?>">Giới thiệu</a>
          </li>
          <li class="nav-item mx-3">
            <div class="<?php if (urlHandle() == 'client/car') echo 'text-primary'; ?> hover-nav-oto p-0" style="cursor: pointer;"> Ô tô
              <div style="width: 100%;height: 200px;" class="bg-body nav-oto d-none shadow">
                <ul class="d-flex justify-content-around p-0 w-100">
                  <?php foreach ($list_asc as $keys => $value) { ?>
                    <li style="list-style: none;">
                      <a href="<?php echo __WEB_ROOT . 'client/car/details/' . $value['id']; ?>">
                        <img style="width: 100%;" src="<?php echo __WEB_ROOT . 'public/assets/image/' . $value['image']; ?>" alt="">
                        <div class="text-center fs-5"><?php echo $value['name'] ?></div>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </li>
          </li>
          <li class="nav-item mx-3">
            <a class="<?php if (urlHandle() == 'client/product') echo 'text-primary '; ?> p-0" href="<?php echo __WEB_ROOT . 'client/product' ?>">Linh kiện ô tô</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link text-dark p-0" href="#">Dịch vụ hậu mãi</a>
          </li>
        </ul>
        <a href="<?php echo __WEB_ROOT . 'client/user/login' ?>">
          <div class="d-flex">
            <div class="hover-user rounded" style="margin-right: 20px;">
              <div style="width: 26px; height:26px; background:#ccc" class="rounded-circle d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-user text-primary"></i>
              </div>
            </div>
            <button class="btn btn-primary m-0 my-1 btn-sm">ĐĂNG KÍ LÁI THỬ</button>
          </div>
        </a>
      </div>
    </div>
  </nav>

</header>

<script>

</script>