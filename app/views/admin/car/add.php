<!-- <div>Thêm sản phẩm</div> -->
<?php

?>
<div class="col-10">
    <div class="d-flex justify-content-center align-items-center my-3">
        <span class="fs-3">Thêm ô tô Vinfast</span>
    </div>
    <?php
    $value = getFlashdata('value');
    $type = getFlashdata('type');
    $old = getFlashdata('old');
    if (!empty($value)) {
        setAttribute($value, $type);
    }
    ?>
    <hr>
    <form action="<?php echo __WEB_ROOT ?>admin/car/postAdd" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-between mb-2">
            <div class="form-group w-50">
                <label for="">Tên ô tô</label>
                <input name="name" type="text" class="form-control" placeholder="Tên ô tô" value="<?php echo old($old, 'name') ?>">
                <?php error(getFlashdata('name')) ?>
            </div>
            <div class="form-group  w-50">
                <label for="">Loại động cơ</label>
                <select name="kind_of" id="" class="form-control form-select">
                    <option value="1">Động cơ điện</option>
                    <option value="2">Động cơ xăng</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="form-group  w-50">
                <label for="">Số ghế</label>
                <input type="number" name="chair_number" id="" placeholder="Số ghế" class="form-control" value="<?php echo old($old, 'chair_number') ?>"></input>
                <?php error(getFlashdata('chair_number')) ?>
            </div>
            <div class="form-group  w-50">
                <label for="">Mức tiêu thụ năng lượng</label>
                <input type="number" name="consume" id="" placeholder="Mức tiêu thụ năng lượng" class="form-control" value="<?php echo old($old, 'consume') ?>"></input>
                <?php error(getFlashdata('consume')) ?>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="form-group  w-50">
                <label for="">Dung tích tối đa(HP)</label>
                <input name="max_capacity" type="number" class="form-control" placeholder="Dung tích đối đa" value="<?php echo old($old, 'max_capacity') ?>">
                <?php error(getFlashdata('max_capacity')) ?>
            </div>
            <div class="form-group  w-50">
                <label for="">Giá</label>
                <input name="price" type="number" class="form-control" placeholder="Giá" value="<?php echo old($old, 'price') ?>">
                <?php error(getFlashdata('price')) ?>
            </div>
        </div>
        <div class="form-group ">
            <label for="">Tải ảnh</label>
            <input name="image" type="file" value="<?php echo old($old, 'image') ?>" class="form-control" multiple>
            <?php error(getFlashdata('image'))  ?>
        </div>
        <div class="form-group ">
            <label for="">Ảnh xoay chính</label>
            <input name="image_main" type="file" value="<?php echo old($old, 'image_main') ?>" class="form-control" multiple>
            <?php error(getFlashdata('image_main'))  ?>
        </div>
        <div class="form-group ">
            <label for="">Mô tả</label>
            <Textarea name="description" placeholder="Mô tả" class="form-control"><?php echo old($old,'description') ?></Textarea>
            <?php error(getFlashdata('description')) ?>
        </div>
        <div class=" d-flex justify-content-between my-2">
            <a href="" class="btn btn-secondary">Trở lại</a>
            <button type="submit" class="btn btn-primary ">Xác nhận</button>
        </div>
    </form>
</div>