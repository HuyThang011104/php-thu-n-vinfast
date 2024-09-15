<style>

</style>
<?php
$value = getFlashdata('value');
$type = getFlashdata('type');
$old = getFlashdata('old');
?>
<div class="col-12">
    <div class="d-flex justify-content-center align-items-center my-3">
        <span class="fs-3">Đơn hàng phụ kiện Vinfast</span>
    </div>
    <?php
    if (!empty($value)) {
        setAttribute($value, $type);
    }
    ?>
    <form method="post" action="<?php echo __WEB_ROOT . 'admin/bill/index' ?>">
        <div class="w-50 d-flex">
            <input name="name" class="form-control" type="search" placeholder="Tên sản phẩm" value="<?php echo old($old, 'name') ?>">
            <button class="mx-2 btn btn-success" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <div class="cover-range form-group" style="display: none;">
            <div style="width: 50%;">
                <input type="range" value="" class="form-range" id="customRange1">
                <input type="range" value="" class="form-range range-position" id="customRange2">
                <input name="price_1" type="hidden" value="" id="hiddenInput">
                <input name="price_2" type="hidden" value="" id="hiddenInput2">
            </div>
            <div id="value-range">Giá: 10.000.000đ</div>
            <div id="value-range2">10.000.000đ</div>
        </div>
    </form>
    <?php error(getFlashdata('find')) ?>

    <table class="table table-bordered mt-3 pb-3 rounded table-hover">
        <thead class="text-center">
            <th style="width: 5%;">STT</th>
            <th>Tên khách hàng</th>
            <th>Tên sản phẩm</th>
            <th>Tỉnh thành</th>
            <th>Showroom</th>
            <th>Số lượng</th>
            <th>Thời gian đặt</th>
        </thead>
        <tbody>
            <?php
            $count = 0;
            foreach ($list_bill_product as $keys => $value) {
                $count++;
            ?>
                <tr style="font-size: 15px;position: relative;" class="text-center">
                    <td><?php echo $count ?></td>
                    <td style="text-transform:uppercase;">
                        <?php foreach ($list_user as $key_user => $value_user) {
                            if ($value['user_id'] == $value_user['id']) {
                                echo $value_user['fullname'];
                            }
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($list_product as $key_product => $value_product) {
                            if ($value['product_id'] == $value_product['id']) {
                                echo $value_product['name'];
                            }
                        } ?>
                    </td>
                    <td style="padding: 4px;">
                        <?php foreach ($list_province as $key_province => $value_province) {
                            if ($value['province_id'] == $value_province['id']) {
                                echo $value_province['name'];
                            }
                        } ?>
                    </td>
                    <td style="padding: 4px;">
                        <?php foreach ($list_showroom as $key_showroom => $value_showroom) {
                            if ($value['showroom_id'] == $value_showroom['id']) {
                                echo $value_showroom['name'];
                            }
                        } ?>
                    </td>
                    <td style="padding: 4px;">
                        <div style="height: 40px;">
                            <?php
                                echo $value['quantity']
                            ?>
                        </div>
                    </td>
                    <td>
                        <?php
                            echo $value['creat_at']
                        ?>
                    </td>
                    <td>
                        <a href="<?php echo __WEB_ROOT.'admin/bill/deleteProduct/'.$value['id'] ?>"  class="btn btn-warning" onclick="return confirm('Bạn có chắc chắn xác nhận thành công đơn hàng')">Đang giao</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>