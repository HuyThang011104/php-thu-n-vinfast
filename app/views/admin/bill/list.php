<style>

</style>
<?php
$value = getFlashdata('value');
$type = getFlashdata('type');
$old = getFlashdata('old');
?>
<div class="col-12">
    <div class="d-flex justify-content-center align-items-center my-3">
        <span class="fs-3">Đơn hàng Ô tô Vinfast</span>
    </div>
    <?php
    if (!empty($value)) {
        setAttribute($value, $type);
    }
    // echo '<pre>';
    // print_r($list_car);
    // echo '</pre>';
    ?>
    <form method="post" action="<?php echo __WEB_ROOT . 'admin/bill/index' ?>">
        <div class="w-50 d-flex">
            <input name="name" class="form-control" type="search" placeholder="Tên khách hàng" value="<?php echo old($old, 'name') ?>">
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
            <th>Tên ô tô</th>
            <th>Tên người mua</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>CCCD</th>
            <th>Tỉnh thành</th>
            <th>Địa chỉ nhận</th>
            <th>Trạng thái</th>
        </thead>
        <tbody>
            <?php
            $count = 0;
            foreach ($list_bill as $keys => $value) {
                $count++;
            ?>
                <tr style="font-size: 15px;position: relative;" class="text-center">
                    <td><?php echo $count ?></td>
                    <td style="text-transform:uppercase;">
                        <?php foreach($list_car as $key_car =>$value_car){
                            if($value['id_car']==$value_car['id']){
                                echo $value_car['name'];
                            }
                        } ?>
                    </td>
                    <td>
                        <?php echo $value['name']?>
                    </td>
                    <td style="padding: 4px;">
                        <div style="height: 40px;">
                            <?php echo $value['phone'] ?>
                        </div>
                    </td>
                    <td style="padding: 4px;">
                        <div style="height: 40px;">
                            <?php
                                echo $value['email']
                             ?>
                        </div>
                    </td>
                    <td style="padding: 4px;">
                        <div style="height: 40px;">
                            <?php
                                echo $value['cccd']
                             ?>
                        </div>
                    </td>
                    <td>
                        <?php
                        foreach($list_province as $key_province=> $value_province){
                            if($value_province['id']==$value['province']){
                                echo $value_province['name'];
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        foreach($list_showroom as $key_showroom=> $value_showroom){
                            if($value_showroom['id']==$value['showroom']){
                                echo $value_showroom['name'];
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <a href="<?php echo __WEB_ROOT.'admin/bill/delete/'.$value['id'] ?>"  class="btn btn-warning" onclick="return confirm('Xác nhận thành công đơn hàng')">Đang giao</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>