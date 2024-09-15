<style>

</style>
<?php
$value = getFlashdata('value');
$type = getFlashdata('type');
$old = getFlashdata('old');
?>
<div class="col-12">
    <div class="d-flex justify-content-center align-items-center my-3">
        <span class="fs-3">Danh sách Ô tô Vinfast</span>
    </div>
    <?php
    if (!empty($value)) {
        setAttribute($value, $type);
    }
    // echo '<pre>';
    // print_r($list_car);
    // echo '</pre>';
    ?>
    <form method="post" action="<?php echo __WEB_ROOT . 'admin/car/index' ?>">
        <div class="w-50 d-flex">
            <select name="kind_of" id="" class=" form-select form-control">
                <option class=" form-control" value="">Danh mục</option>
                <option value="1" <?php if(old($old,'kind_of')==1)echo 'selected'; ?>>Động cơ điện</option>
                <option value="2" <?php if(old($old,'kind_of')==2)echo 'selected'; ?>>Động cơ xăng</option>
            </select>
            <input name="name" class="form-control mx-2" type="search" placeholder="Tên sản phẩm" value="<?php echo old($old, 'name') ?>">
            <button class="btn btn-success" type="submit">
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
            <th>Danh mục</th>
            <th>Số ghế</th>
            <th>Năng lg tiêu thụ</th>
            <th>Công suất tối đa</th>
            <th style="width: 7%;">Giá</th>
            <th style="width: 10%;">Ảnh</th>
            <th style="width: 5%;">Xem</th>
            <th style="width: 5%;">Sửa</th>
            <th style="width: 5%;">Xóa</th>
        </thead>
        <tbody>
            <?php
            // if(!empty($find_product)){
            //     $list_product=$findProduct;
            // }
            // echo '<pre>';
            // print_r($findProduct);
            // echo '</pre>';
            $count = 0;
            foreach ($list_car as $keys => $value) {
                $count++;
            ?>
                <tr style="font-size: 15px;position: relative;" class="text-center">
                    <td><?php echo $count ?></td>
                    <td style="text-transform:uppercase;"><?php echo $value['name'] ?></td>
                    <td>
                        <?php
                        if ($value['kind_of'] == 1) {
                            echo "Động cơ điện";
                        } else {
                            echo "Động cơ xăng";
                        }
                        ?>
                    </td>
                    <td style="padding: 4px;">
                        <div style="height: 80px;">
                            <?php echo $value['chair_number'] ?>
                        </div>
                    </td>
                    <td style="padding: 4px;">
                        <div style="height: 80px;">
                            <?php
                            if($value['kind_of']==1){
                                echo $value['consume'].' km/1 lần sặc đầy';
                            }else{
                                echo $value['consume'].' lít/100km';
                            }
                             ?>
                        </div>
                    </td>
                    <td>
                        <?php
                        echo $value['max_capacity'] . ' HP';
                        ?>
                    </td>
                    <td><?php echo number_format($value['price'], 0, '', '.') . ' VNĐ' ?></td>
                    <td>
                        <img class="rounded" style="width:100%" src="<?php echo __WEB_ROOT . '/public/assets/image/' . $value['image'] . '' ?>" alt="">
                    </td>
                    <td>
                        <div class="display_desc rounded d-none"></div>
                        <div class="btn btn-sm btn-success hover_eye">
                            <i class="fa-solid fa-eye"></i>
                            <input type="hidden" class="value_description" value="<?php echo $value['description'] ?>">
                        </div>
                    </td>
                    <td>
                        <a href="<?php echo __WEB_ROOT . 'admin/car/update/' . $value['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo __WEB_ROOT . 'admin/car/delete/' . $value['id'];  ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không')" class="btn btn-danger btn-sm" style="list-style: none;">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>