<div style="margin-top: 100px;">
    <div class="bg-body rounded shadow mb-2 p-3">
        <div class="d-flex">
            <img width="50px" src="<?php echo __WEB_ROOT . 'public/assets/image/áo.png' ?>" alt="">
            <div>
                <div>Xin chào</div>
                <div><?php echo $getUser['fullname'] ?></div>
            </div>
        </div>
        <hr style="margin-bottom: 40px;">
        <hr>
    </div>
    <div class="bg-body rounded shadow p-3">
        <div class="fs-5 mb-3">Đặt hàng và dịch vụ</div>
        <a href="<?php echo __WEB_ROOT . 'client/user/history' ?>" class="<?php if (urlWebClient('user', 'history')) echo 'text-primary' ?>">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-clock-rotate-left me-2"></i>
                <div>Lịch sử giao dịch</div>
            </div>
        </a>
        <a href="">
            <div class="d-flex my-3 align-items-center">
                <i class="fa-solid fa-screwdriver-wrench me-2"></i>
                <div>Bảo dưỡng - sửa chữa</div>
            </div>
        </a>
        <a href="">
            <div class="d-flex my-3 align-items-center">
                <i class="fa-solid fa-battery-half me-2"></i>
                <div>Thuê pin</div>
            </div>
        </a>
        <a href="">
            <div class="d-flex my-3 align-items-center">
                <i class="fa-solid fa-charging-station me-2 "></i>
                <div>Lịch sử sạc pin</div>
            </div>
        </a>
        <a href="">
            <div class="d-flex my-3 align-items-center">
                <i class="fa-solid fa-car-side me-2"></i>
                <div>Đăng kí lái thử</div>
            </div>
        </a>
        <div class="fs-5">Tài khoản</div>
        <a href="<?php echo __WEB_ROOT . 'client/user/profile ' ?>" class="<?php if (urlWebClient('user', 'profile')) echo 'text-primary' ?>">
            <div class="d-flex my-3 align-items-center">
                <i class="fa-solid fa-user me-2"></i>
                <div>Thông tin cá nhân</div>
            </div>
        </a>
        <a href="">
            <div class="d-flex my-3 align-items-center">
            <i class="fa-solid fa-file-invoice me-2"></i>
                <div>Thông tin xuất hóa đơn</div>
            </div>
        </a>
        <a href="">
            <div class="d-flex my-3 align-items-center">
            <i class="fa-solid fa-circle-info me-2"></i>
                <div>Yêu cầu hỗ trợ</div>
            </div>
        </a>
        <a href="">
            <div class="d-flex my-3 align-items-center">
            <i class="fa-solid fa-headphones-simple me-2"></i>
                <div>Liên hệ</div>
            </div>
        </a>
        <hr>
        <a onclick="return confirm('Bạn có muốn đăng xuất không')" href="<?php echo __WEB_ROOT . 'client/user/logout' ?>">
            <div class="d-flex my-3 align-items-center">
            <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                <div>Đăng xuất</div>
            </div>
        </a>
    </div>
</div>