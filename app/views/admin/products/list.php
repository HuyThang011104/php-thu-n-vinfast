<style>
    td {
        overflow-y: scroll;
    }

    td::-webkit-scrollbar {
        display: none;
    }

    .cover-ranger {
        position: relative;
    }

    #value-range {
        position: absolute;
        top: 227px;
    }

    #value-range2 {
        position: absolute;
        top: 227px;
        right: 42%;
    }
</style>
<?php
$value = getFlashdata('value');
$type = getFlashdata('type');
$old = getFlashdata('old');
?>
<div class="col-12">
    <div class="d-flex justify-content-center align-items-center my-3">
        <span class="fs-3">Danh sách sản phẩm</span>
    </div>
    <?php
    if (!empty($value)) {
        setAttribute($value, $type);
    }
    ?>
    <form method="post" action="<?php echo __WEB_ROOT . 'admin/product/index' ?>">
        <div class="w-50 d-flex">
            <select name="category_id" id="" class=" form-select form-control">
                <option class=" form-control" value="">Danh mục</option>
                <?php
                foreach ($get_category as $keys => $value) {
                ?>
                    <option <?php if (old($old, 'category_id') == $value['id']) echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                <?php
                }
                ?>
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

    <table class="table table-bordered mt-3 pb-3 rounded">
        <thead class="text-center">
            <th style="width: 5%;">STT</th>
            <th style="width: 15%;">Tên sản phẩm</th>
            <th style="width: 8%;">Danh mục</th>
            <th style="width: 15%">Mô tả</th>
            <th style="width: 15%;">Chi tiết</th>
            <th style="width: 5%">Giá</th>
            <th style="width: 7%;">Số lg</th>
            <th style="width: 10%;">Ảnh</th>
            <th style="width: 5%;">sửa</th>
            <th style="width: 5%;">xóa</th>
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
            foreach ($list_product as $keys => $value) {
                $count++;
            ?>
                <tr style="font-size: 15px;">
                    <td><?php echo $count ?></td>
                    <td style="text-transform:uppercase;padding: 4px;">
                        <div style="height: 80px;">
                            <?php echo $value['name'] ?>
                        </div>
                    </td>
                    <td>
                        <?php
                        foreach ($get_category as $key => $valuef) {
                            if ($valuef['id'] == $value['category_id']) {
                                echo $valuef['name'];
                            }
                        }
                        ?>
                    </td>
                    <td style="padding: 4px;">
                        <div style="height: 80px;">
                            <?php echo $value['description'] ?>
                        </div>
                    </td>
                    <td style="padding: 4px;">
                        <div style="height: 80px;">
                            <?php echo $value['detail'] ?>
                        </div>
                    </td>
                    <td><?php echo $value['price'] . ' VNĐ' ?></td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td>
                        <img class="rounded" style="width:100%" src="<?php echo __WEB_ROOT . '/public/assets/image/' . $value['image'] . '' ?>" alt="">
                    </td>
                    <td>
                        <a href="<?php echo __WEB_ROOT . 'admin/product/update/' . $value['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo __WEB_ROOT . 'admin/product/delete/' . $value['id'];  ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không')" class="btn btn-danger btn-sm" style="list-style: none;">
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
<script>
    var rangeInput = document.getElementById('customRange1');
    var rangeInput2 = document.getElementById('customRange2');
    var rangeValue = document.getElementById('value-range');
    var rangeValue2 = document.getElementById('value-range2');
    var hiddenInput = document.getElementById('hiddenInput');
    var hiddenInput2 = document.getElementById('hiddenInput2');

    function rangeMoney(rangeInput, rangeValue, hiddenInput, text = "") {
        rangeInput.addEventListener('input', function() {
            textContent = this.value;
            textContent = textContent * 20000000 * 0.01;
            formatNumber = textContent.toLocaleString('vi-VN');
            rangeValue.innerHTML = text + formatNumber + 'đ';
            // this.value = textContent;
            hiddenInput.value = textContent;
        })
    }
    rangeMoney(rangeInput, rangeValue, hiddenInput, "Giá: ");
    rangeMoney(rangeInput2, rangeValue2, hiddenInput2, "");
</script>