<?php
$value = getFlashdata('value');
$type = getFlashdata('type');
$old = getFlashdata('old');
?>
<style>
    .form_edit_user{
        display: none;
    }
</style>
<div class="row" style="margin-top: 100px;">
    <div class="bg-body rounded shadow p-3">
        <?php
        if (!empty($value)) {
            setAttribute($value, $type);
        }
        ?>
        <div class="d-flex justify-content-between ">
            <div>Thông tin cá nhân</div>
            <div class="text-primary edit_user" style="cursor: pointer;">
                Chỉnh sửa thông tin
            </div>
        </div>
        <div class="my-5">
            <div class="d-flex justify-content-between mb-2" style="width: 70%;">
                <div>Họ tên</div>
                <div><?php echo $getUser['fullname'] ?></div>
            </div>
            <div class="d-flex justify-content-between mb-2" style="width: 70%;">
                <div>Email</div>
                <div><?php echo $getUser['email'] ?></div>
            </div>
            <div class="d-flex justify-content-between mb-2" style="width: 70%;">
                <div>Số điện thoại</div>
                <div><?php echo $getUser['phone'] ?></< /div>
                </div>
            </div>

        </div>
        <hr>
        <div class="d-flex justify-content-between" style="width: 70%;">
            <div>Mật khẩu</div>
            <div>
                <a class="text-primary" href="">Đổi mật khẩu</a>
            </div>
        </div>
        <hr>
        <form action="<?php echo __WEB_ROOT.'client/user/postEdit' ?>" method="post" style="width: 70%;" class="form_edit_user">
            <div class="d-flex">
                <div class="form-group mg-form w-50">
                    <label for="">Họ Tên</label>
                    <input name="fullname" type="fullname" class="form-control mb-2" placeholder="Họ tên" 
                    value="<?php if(!empty(old($old,'fullname'))){echo old($old, 'fullname');}else{
                        echo $getUser['fullname'];
                    } ?>">
                    <?php error(getFlashdata('fullname')) ?>
                </div>
                <div class="form-group mg-form w-50">
                    <label for="">Phone</label>
                    <input name="phone" type="phone" class="form-control mb-2" placeholder="Phone"
                     value="<?php if(!empty(old($old,'phone'))){echo old($old, 'phone');}else{
                        echo $getUser['phone'];
                     }
                       ?>">
                    <?php error(getFlashdata('phone')) ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Xác nhận thay đổi</button>

        </form>
    </div>
</div>
<script>
    var editUser = document.querySelector('.edit_user');
    var formEditUser = document.querySelector('.form_edit_user');
    editUser.addEventListener('click', function() {
        Object.assign(formEditUser.style,{
            display: 'block',
        })
        console.log(formEditUser);
    });
</script>