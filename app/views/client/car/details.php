<div style="margin-top: 60px;">

</div>
<?php
$getId = explode('/', $_SERVER['PATH_INFO'])[4];
$value = getFlashdata('value');
$type = getFlashdata('type');
$old = getFlashdata('old');
?>

<div class="container-xxl py-3 rounded px-4">
    <div class="row">
        <div class="col-6">
            <div class="d-flex align-items-center justify-content-center">
                <img style="width: 800px;" src="<?php echo __WEB_ROOT . "public/assets/image/" . $renderCar['image_main'] ?>" alt="">
            </div>
            <div class="d-flex justify-content-around">
                <div>
                    <div>
                        Công suất tối đa:
                    </div>
                    <div style="font-size: 22px;" class="text-center">
                        <?php echo $renderCar['max_capacity'] . 'HP' ?>
                    </div>
                </div>
                <div>
                    <div>
                        Tiêu thụ điện năng:
                    </div>
                    <div style="font-size: 22px;" class="text-center">
                        <?php
                        if ($renderCar['kind_of'] == 1) {
                            echo $renderCar['consume'] . ' km/1 lần sặc đầy';
                        } else {
                            echo $renderCar['consume'] . ' lít/100km';
                        } 
                        ?>
                    </div>
                </div>
                <div>
                    <div>
                        Số ghế ngồi:
                    </div>
                    <div style="font-size: 22px;" class="text-center">
                        <?php echo $renderCar['chair_number'] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 rounded bg-body">
            <h3 class="text-center">Thông tin đơn hàng</h3>
            <?php
            if (!empty($value)) {
                setAttribute($value, $type);
            }
            ?>
            <form action="<?php echo __WEB_ROOT . "client/car/postBookCar/" . $getId;  ?>" method="post">
                <div class="row rounded">
                    <div class="col-6 ">
                        <h4 class="my-3">Thông tin chủ xe</h2>
                            <div class="form-group mb-4">
                                <input name="name" class="form-control" type="text" placeholder="Họ và tên" value="<?php echo old($old, 'name') ?>">
                                <?php error(getFlashdata('name')) ?>
                            </div>
                            <div class="form-group mb-4">
                                <input name="phone" class="form-control" type="number" placeholder="Số điện thoại" value="<?php echo old($old, 'phone') ?>">
                                <?php error(getFlashdata('phone')) ?>
                            </div>
                            <div class="form-group mb-4">
                                <input name="cccd" class="form-control" type="number" placeholder="Số CMT/CCCD" value="<?php echo old($old, 'cccd') ?>">
                                <?php error(getFlashdata('cccd')) ?>
                            </div>
                            <div class="form-group mb-4">
                                <input name="email" class="form-control" type="email" placeholder="Email" value="<?php echo old($old, 'email') ?>">
                                <?php error(getFlashdata('email')) ?>
                            </div>
                            <div class="form-group mb-4">
                                <select name="province" class="form-select ">
                                    <option value="">Tỉnh thành</option>
                                    <?php foreach ($getAllprovince as $keys => $value) { ?>
                                        <option <?php if (old($old, 'province') == $value['id']) echo 'selected' ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php } ?>
                                </select>
                                <?php error(getFlashdata('province')) ?>
                            </div>
                            <div class="form-group mb-4">
                                <select name="showroom" class="form-select ">
                                    <option value="">Showroom nhận xe</option>
                                    <?php foreach ($getAllshowroom as $keys => $value) {
                                        foreach ($getAllprovince as $keyProvince => $valueProvince) {
                                            if ($value['province_id'] == $valueProvince['id']) { ?>
                                                <option <?php if (old($old, 'showroom') == $value['id']) echo 'selected' ?> value="<?php echo $value['id']; ?>"><?php echo 'Showroom ' . $value['name'] . ' - ' . $valueProvince['name']; ?></option>
                                    <?php }
                                        }
                                    }
                                    ?>
                                </select>
                                <?php error(getFlashdata('showroom')) ?>
                            </div>
                    </div>
                    <div class="col-6">
                        <h4 class="my-3">Thông tin xe</h4>
                        <div class="d-flex justify-content-between">
                            <div>
                                <?php echo $renderCar['name'] ?>
                                <div style="font-size: 12px; font-style:italic">Giá đã bao gồm VAT</div>
                            </div>
                            <div><?php echo number_format($renderCar['price'], 0, '', '.') . ' VNĐ' ?></< /div>
                            </div>
                        </div>
                        <div>
                            <div class="mt-3">Phương thức thanh toán</div>
                            <div>
                                <input <?php if (old($old, 'receive_info') == '1') echo 'checked' ?> type="checkbox" name="receive_info" class="mt-3 checkbox-form" value="1">
                                Nhận thông báo về đơn hàng <?php echo $renderCar['name'] ?> tới Email
                            </div>
                            <div>
                                <input <?php if (old($old, 'pay') == 'bank') echo "checked" ?> type="radio" name="pay" id="" value="bank" class="mt-3 checkbox-form">
                                Chuyển khoản ngân hàng
                            </div>
                            <div>
                                <input <?php if (old($old, 'pay') == 'momo') echo "checked" ?> type="radio" name="pay" id="" value="momo" class="mt-3 checkbox-form">
                                Thanh toán qua ví điện tử MOMO;
                            </div>
                            <div>
                                <input <?php if (old($old, 'pay') == 'international') echo "checked" ?> type="radio" name="pay" id="" value="international" class="mt-3 checkbox-form">
                                Sử dụng thẻ thanh toán quốc tế
                            </div>
                            <?php error(getFlashdata('pay')) ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Đặt hàng</button>
            </form>
        </div>
    </div>
</div>