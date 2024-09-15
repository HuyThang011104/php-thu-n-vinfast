<!-- <div>Thêm sản phẩm</div> -->
<?php
// foreach ($getCategory as $keys => $value) {
//     echo '<pre>';
//     print_r($getCategory[$value]);
//     echo '</pre>';
// }

?>
<div class="col-10">
    <div class="d-flex justify-content-center align-items-center my-3">
        <span class="fs-3">Thêm sản phẩm</span>
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
    <form action="<?php echo __WEB_ROOT ?>admin/product/postAdd" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-between mb-2">
            <div class="form-group w-50">
                <label for="">Tên sản phẩm</label>
                <input name="name" type="text" class="form-control" placeholder="Tên linh kiện" value="<?php echo old($old, 'name') ?>">
                <?php error(getFlashdata('name')) ?>
            </div>
            <div class="form-group  w-50">
                <label for="">Sản phẩm thuộc loại</label>
                <select name="category" id="" class="form-control form-select">
                    <?php
                    foreach ($get_category as $keys => $value) {
                    ?>
                        <option <?php if(old($old,'category')==$value['id'])echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="form-group  w-50">
                <label for="">Mô tả</label>
                <textarea name="description" id="" placeholder="Mô tả" class="form-control"><?php echo old($old, 'detail') ?></textarea>
                <?php error(getFlashdata('description')) ?>
            </div>
            <div class="form-group  w-50">
                <label for="">Thông tin chi tiết</label>
                <textarea name="detail" id="" placeholder="Thông tin chi tiết" class="form-control"><?php echo old($old, 'detail') ?></textarea>
                <?php error(getFlashdata('detail')) ?>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="form-group  w-50">
                <label for="">Giá (VND)</label>
                <input name="price" type="text" class="form-control" placeholder="giá" value="<?php echo old($old, 'price') ?>">
                <?php error(getFlashdata('price')) ?>
            </div>
            <div class="form-group  w-50">
                <label for="">Số lượng</label>
                <input name="quantity" type="text" class="form-control" placeholder="số lượng" value="<?php echo old($old, 'quantity') ?>">
                <?php error(getFlashdata('quantity')) ?>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="form-group  w-50">
                <label for="">Tải ảnh</label>
                <input name="images" type="file" value="<?php echo old($old, 'images') ?>" class="form-control" multiple>
                <?php error(getFlashdata('images'))  ?>
            </div>
            <div class="form-group  w-50">
                <label for="">Ngày đăng</label>
                <input name="date" type="date" value="<?php if (!empty($old)) {
                                                            echo old($old, 'date');
                                                        } else {
                                                            echo date('Y-m-d');
                                                        } ?>" class="form-control">
                <?php error(getFlashdata('date')) ?>
            </div>
        </div>
        <div class=" d-flex justify-content-between mb-2">
            <a href="" class="btn btn-secondary">Trở lại</a>
            <button type="submit" class="btn btn-primary ">Xác nhận</button>
        </div>
    </form>
</div>