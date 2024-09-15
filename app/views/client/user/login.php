<div class="row d-flex justify-content-center align-items-center" style="margin-top: 100px;">
    <div class="col-4">
        <form action="<?php echo __WEB_ROOT.'client/user/postLogin'; ?>" method="post">
            <h3 class="text-center ">ĐĂNG NHẬP</h3>
            <?php
            $value = getFlashdata('value');
            $type = getFlashdata('type');
            $old = getFlashdata('old');
            if(!empty($value)){
                setAttribute($value, $type);
            }
            if(!empty($registerValue)){
                setAttribute($registerValue,$registerType);
            }
            if(!empty($activeValue)){
                setAttribute($activeValue,$activeType);
            }
            ?>
            <div class="form-group mg-form">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control mb-2" value="<?php echo old($old,'email') ?>" placeholder="Địa chỉ Email">
                <?php
                error(getFlashdata('email'));
                ?>
            </div>
            <div class="form-group mg-form">
                <label for="">Mật khẩu</label>
                <input name="password" type="password" class="form-control mb-2" value="" placeholder="Mật khẩu">
                <?php
                error(getFlashdata('password'));
                ?>
            </div>
            <button type="submit" class="mg-form btn btn-primary btn-block">Đăng nhập</button>
            <hr>
            <p class="text-center">
                <a href="?modules=auth_xacthuc&action=forgot_pass">Quên mật khẩu</a>
            </p>
            <p class="text-center">
                <a href="<?php echo __WEB_ROOT.'client/user/register' ?>">Đăng ký tài khoản</a>
            </p>
        </form>
    </div>
</div>