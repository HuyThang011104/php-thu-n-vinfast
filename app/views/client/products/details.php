<?php
$getId = explode('/', $_SERVER['PATH_INFO'])[4];
?>
<div class="row" style="margin-top: 100px;">
    <div class="col-8">
        <h4><?php echo $renderProduct['name'] ?></h4>
        <div class="text-primary fs-5"><?php echo number_format($renderProduct['price'], 0, '', '.')  ?></div>
        <div style="font-weight: 500;">Mô tả sản phẩm</div>
        <p><?php echo $renderProduct['description'] ?></p>
        <div style="font-weight: 500;">Thông tin chi tiết</div>
        <p><?php echo $renderProduct['detail'] ?></p>
    </div>
    <div class="col-4 bg-body rounded">
        <form action="<?php echo __WEB_ROOT . 'client/product/buy/' . $getId  ?>" method="get">
            <div class="p-3">
                <div style="font-weight: 500;">Đặt sản phẩm</div>
                <hr>
                <img style="width: 100px;" src="<?php echo __WEB_ROOT . 'public/assets/image/' . $renderProduct['image'] . '' ?>" alt="">
                <div class="d-flex justify-content-between align-items-center">
                    <div>Chọn số lượng</div>
                    <div class="d-flex border p-2 rounded my-3">
                        <button type="button" style="border: 0;" class="minus rounded"><i class="fa-solid fa-minus"></i></button>
                        <input name="quantity" value="1" id="product-quantity" type="number" style="color: rgb(60, 60, 60); ">
                        <button type="button" style="border: 0;" class="plus rounded"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>Tổng tiền: </div>
                    <div style="font-size: 16px; font-weight: 500;" class="text-primary details-price"><?php echo number_format($renderProduct['price'], 0, '', '.') . ' VNĐ'  ?></div>
                </div>
                <button type="submit" value="buy" class="btn btn-primary w-100 mt-3">Mua ngay</button>
                <!-- <button name="cart" value="cart" class="btn border-primary w-100 mt-3 d-flex justify-content-center align-items-center text-primary  ">
                    <div>Thêm vào giỏ hàng</div>
                    <i class="fa-solid fa-cart-plus mx-2"></i>
                </button> -->
            </div>
        </form>
    </div>
</div>