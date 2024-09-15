<h1>Update</h1>
<?php
$getId = explode('/', $_SERVER['PATH_INFO'])[4];
// echo $getId;
?>
<div class="col-10">
    <div class="d-flex justify-content-center align-items-center my-3">
        <span class="fs-3">Sửa ô tô Vinfast</span>
    </div>
    <?php
    $value = getFlashdata('value');
    $type = getFlashdata('type');
    $old = getFlashdata('old');
    // $old_image = getFlashdata('old_image');
    // print_r($old_image);
    // die();
    // echo 'ghế:'. getFlashdata('chair_number');
    if (!empty($value)) {
        setAttribute($value, $type);
    }
    ?>
    <hr>
    <form action="<?php echo __WEB_ROOT ?>admin/car/postUpdate/<?php echo $getId ?>" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-between mb-2">
            <div class="form-group w-50">
                <label for="">Tên ô tô</label>
                <input name="name" type="text" class="form-control" placeholder="Tên ô tô" value="<?php
                                                                                                    if (!empty($old)) {
                                                                                                        echo old($old, 'name');
                                                                                                    } else {
                                                                                                        echo $renderCar['name'];
                                                                                                    }
                                                                                                    ?>">
                <?php error(getFlashdata('name')) ?>
            </div>
            <div class="form-group  w-50">
                <label for="">Loại động cơ</label>
                <select name="kind_of" id="" class="form-control form-select">
                    <option value="0">Động cơ điện</option>
                    <option value="1">Động cơ xăng</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="form-group  w-50">
                <label for="">Số ghế</label>
                <input type="number" name="chair_number" id="" placeholder="Số ghế" class="form-control" value="<?php if (!empty($old)) {
                                                                                                                    echo old($old, 'chair_number');
                                                                                                                } else {
                                                                                                                    echo $renderCar['chair_number'];
                                                                                                                } ?>"></input>
                <?php error(getFlashdata('chair_number')) ?>
            </div>
            <div class="form-group  w-50">
                <label for="">Mức tiêu thụ năng lượng</label>
                <input type="number" name="consume" id="" placeholder="Mức tiêu thụ năng lượng" class="form-control" value="<?php if (!empty($old)) {
                                                                                                                                echo old($old, 'consume');
                                                                                                                            } else {
                                                                                                                                echo $renderCar['consume'];
                                                                                                                            } ?>"></input>
                <?php error(getFlashdata('consume')) ?>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="form-group  w-50">
                <label for="">Dung tích tối đa(HP)</label>
                <input name="max_capacity" type="number" class="form-control" placeholder="Dung tích đối đa" value="<?php if (!empty($old)) {
                                                                                                                        echo old($old, 'max_capacity');
                                                                                                                    } else {
                                                                                                                        echo $renderCar['max_capacity'];
                                                                                                                    } ?>">
                <?php error(getFlashdata('max_capacity')) ?>
            </div>
            <div class="form-group  w-50">
                <label for="">Giá</label>
                <input name="price" type="number" class="form-control" placeholder="Giá" value="<?php if (!empty($old)) {
                                                                                                    echo old($old, 'price');
                                                                                                } else {
                                                                                                    echo $renderCar['price'];
                                                                                                } ?>">
                <?php error(getFlashdata('price')) ?>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="form-group w-50">
                <label for="">Tải ảnh</label>
                <input name="image" type="file" value="" class="form-control" multiple>
                <?php error(getFlashdata('image'))  ?>
            </div>
            <div class="form-group">
                <img width="100px" src="<?php echo __WEB_ROOT . 'public/assets/image/' . $renderCar['image'] ?>" alt="">
            </div>
        </div>
        <div class="form-group ">
            <label for="">Mô tả</label>
            <Textarea name="description" placeholder="Mô tả" class="form-control"><?php if (!empty($old)) {
                                                                                        echo old($old, 'description');
                                                                                    } else {
                                                                                        echo $renderCar['description'];
                                                                                    } ?></Textarea>
            <?php error(getFlashdata('description')) ?>
        </div>
        <div class=" d-flex justify-content-between my-2">
            <a href="" class="btn btn-secondary">Trở lại</a>
            <button type="submit" class="btn btn-primary ">Xác nhận</button>
        </div>
    </form>
</div>