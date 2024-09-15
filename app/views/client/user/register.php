<div class="row d-flex justify-content-center align-items-center" style="margin-top: 100px;">
    <div class="col-4">
        <form action="<?php echo __WEB_ROOT . 'client/user/postRegister' ?>" method="post">
            <h3 class="text-center ">ĐĂNG KÝ</h3>
            <?php
            $value = getFlashdata('value');
            $type = getFlashdata('type');
            $old = getFlashdata('old');
            if (!empty($value)) {
                setAttribute($value, $type);
            }
            ?>
            <div class="form-group mg-form">
                <label for="">Họ Tên</label>
                <input name="fullname" type="fullname" class="form-control mb-2" placeholder="Họ tên" value="<?php echo old($old,'fullname') ?>">
                <?php error(getFlashdata('fullname')) ?>
            </div>
            <div class="form-group mg-form">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control mb-2" placeholder="Email" value="<?php echo old($old,'email') ?>">
                <?php error(getFlashdata('email')) ?>
            </div>
            <div class="form-group mg-form">
                <label for="">Phone</label>
                <input name="phone" type="phone" class="form-control mb-2" placeholder="Phone" value="<?php echo old($old,'phone') ?>">
                <?php error(getFlashdata('phone'))?>
            </div>
            <div class="form-group mg-form">
                <label for="">Mật khẩu</label>
                <input name="password" type="password" class="form-control mb-2" placeholder="Mật khẩu" value="<?php echo old($old,'password')  ?>">
                <?php error(getFlashdata('password'))?>
            </div>
            <div class="form-group mg-form">
                <label for="">Nhập lại mật khẩu</label>
                <input name="confirm_pass" type="password" class="form-control mb-2" placeholder="Nhập lại mật khẩu" >
                <?php error(getFlashdata('confirm_pass'))?>
            </div>
            <button type="submit" class="mg-form btn btn-primary btn-block">Đăng ký</button>
            <p class="text-center">
                <a class="cardA btn btn-primary btn-block" href="<?php echo __WEB_ROOT.'client/user/login' ?>">Đăng nhập</a>
            </p>
        </form>
    </div>
</div>