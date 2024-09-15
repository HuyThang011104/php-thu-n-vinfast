<?php
$getId = explode('/', $_SERVER['PATH_INFO'])[4];
$value = getFlashdata('value');
$type = getFlashdata('type');
$old = getFlashdata('old');
$getQuantity = $_GET['quantity'];
?>
<form action="<?php echo __WEB_ROOT . 'client/product/postBuy' ?>" method="post">
    <div class="row" style="margin-top: 100px;">
        <div class="col-6 pr-3">
            <div class="bg-body p-3 rounded shadow">
                <h4>THÔNG TIN KHÁCH HÀNG</h4>
                <?php
                if (!empty($value)) {
                    setAttribute($value, $type);
                }
                ?>
                <form action="<?php echo __WEB_ROOT . 'client/product/postBuy/' . $getId; ?>" method="post">
                    <div class="form-group mg-form form-control mb-3">
                        <label for="">Tên quý khách</label>
                        <p><?php echo $getUser['fullname'] ?></p>
                    </div>
                    <div class="form-group mg-form form-control mb-3">
                        <label for="">Email</label>
                        <p><?php echo $getUser['email'] ?></p>
                    </div>
                    <div class="form-group mg-form form-control mb-3">
                        <label for="">Số điện thoại</label>
                        <input name="phone" required type="text" class="form-control" 
                        value="<?php if(!empty(old($old,'phone'))){
                            echo old($old,'phone');
                         }else{
                            echo $getUser['phone'];
                         }
                        ?>">
                    </div>
                    <h4>NHẬN HÀNG TẠI</h4>
                    <div class="text-center text-primary">Showroom Vinfast</div>
                    <div class="w-100 bg-primary" style="height:4px"></div>
                    <select name="province" id="" class="form-select mt-3">
                        <option value="">Tỉnh thành</option>
                        <?php foreach ($getProvince as $key => $value) { ?>
                            <option <?php if (old($old, 'province') == $value['id']) echo 'selected' ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                        <?php } ?>
                    </select>
                    <?php error(getFlashdata('province')) ?>
                    <select name="showroom" id="" class="form-select my-3">
                        <option value="">Showroom</option>
                        <?php foreach ($getShowroom as $keys => $value) {
                            foreach ($getProvince as $keyProvince => $valueProvince) {
                                if ($value['province_id'] == $valueProvince['id']) { ?>
                                    <option <?php if (old($old, 'showroom') == $value['id']) echo 'selected' ?> value="<?php echo $value['id']; ?>"><?php echo 'Showroom ' . $value['name'] . ' - ' . $valueProvince['name']; ?></option>
                        <?php }
                            }
                        }
                        ?>
                    </select>
                    <?php error(getFlashdata('showroom')) ?>
                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="bg-body rounded shadow p-3">
                <div>Thanh toán hóa đơn</div>
                <div class="d-flex ">
                    <img style="width:100px" src="<?php echo __WEB_ROOT . 'public/assets/image/' . $renderProduct['image'] ?>" alt="">
                    <div class="d-flex justify-content-between w-100 ms-3">
                        <div><?php echo $renderProduct['name'] ?></div>
                        <input type="hidden" name="product_id" value="<?php echo $getId ?>">
                        <div>
                            <div class="d-flex justify-content-end">
                                <?php
                                    echo 'x '. $getQuantity;
                                ?>
                            </div>
                            <input name="quantity" type="hidden" 
                            value="<?php echo $getQuantity ?>">
                            <div><?php echo number_format($renderProduct['price'], 0, '', '.') . ' VNĐ' ?></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between  ">
                    <div>Tổng giá trị đơn hàng</div>
                    <div class="d-flex justify-content-end">
                        <?php
                            echo number_format($getQuantity * $renderProduct['price'], 0, '', '.') . ' VNĐ';
                        ?>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between  ">
                    <div>Phí vận chuyển</div>
                    <div>Miễn phí</div>
                </div>
                <hr>
                <div class="d-flex justify-content-between ">
                    <div>Tổng thanh toán</div>
                    <div class="d-flex justify-content-end">
                        <?php
                            echo number_format($getQuantity * $renderProduct['price'], 0, '', '.') . ' VNĐ';
                        ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary my-3 w-100">Thanh toán ngay</button>
            </div>
        </div>
    </div>
</form>