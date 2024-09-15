<div class="rounded shadow bg-body" style="margin-top: 100px;">
    <?php if (count($getListBill) > 0) { ?>
        <table class="table table-bordered mt-3 pb-3  table-hover">
            <thead class="text-center">
                <th style="width: 5%;">STT</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Chi phí</th>
                <th>Thời gian giao dịch</th>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($getListBill as $keys => $value) {
                    $count++;
                ?>
                    <tr style="font-size: 15px;position: relative;" class="text-center">
                        <td><?php echo $count ?></td>
                        <td>
                            <?php foreach ($getListProduct as $keyProduct => $valueProduct) {
                                if ($value['product_id'] == $valueProduct['id']) { ?>
                                    <img width="100px" src="<?php echo __WEB_ROOT . 'public/assets/image/' . $valueProduct['image']; ?>" alt="">
                            <?php
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($getListProduct as $keyProduct => $valueProduct) {
                                if ($value['product_id'] == $valueProduct['id']) {
                                    echo $valueProduct['name'];
                                }
                            }
                            ?>
                        </td>
                        <td style="padding: 4px;">
                            <div style="height: 40px;">
                                <?php
                                foreach ($getListProduct as $keyProduct => $valueProduct) {
                                    if ($value['product_id'] == $valueProduct['id']) {
                                        echo formatVnd($valueProduct['price']);
                                    }
                                }
                                ?>
                            </div>
                        </td>
                        <td style="padding: 4px;">
                            <div style="height: 40px;">
                                <?php
                                echo $value['quantity'];
                                ?>
                            </div>
                        </td>
                        <td style="padding: 4px;">
                            <div style="height: 40px;">
                                <?php
                                foreach ($getListProduct as $keyProduct => $valueProduct) {
                                    if ($value['product_id'] == $valueProduct['id']) {
                                        echo formatVnd($valueProduct['price'] * $value['quantity']);
                                    }
                                }
                                ?>
                            </div>
                        </td>
                        <td>
                            <?php
                            echo $value['creat_at'];
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="text-center" style="height: 500px; padding-top: 100px;">
            <img class=" align-items-center" src="<?php echo __WEB_ROOT . 'public/assets/image/empty_cart.png' ?>" alt="">
            <div>Chưa có đơn hàng</div>
            <p>Tham khảo các mẫu xe mới nhất của VinFast và đặt cọc ngay để nhận các ưu đãi hấp dẫn</p>
            <a href="<?php echo __WEB_ROOT.'client/car/details/4' ?>" class="btn btn-primary">Đặt cọc xe</a>
        </div>
    <?php } ?>
</div>