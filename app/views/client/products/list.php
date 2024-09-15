<style>
</style>
<?php
$value = getFlashdata('value');
$type = getFlashdata('type');
$old = getFlashdata('old');
?>
<form  action="<?php echo __WEB_ROOT . 'client/product/index' ?>" method="post">
    <div class="row p-0">
        <div class="col-2">
            <select name="category_id" id="" class=" form-select form-control border-dark" style="background-color: var(--back-ground);">
                <option class=" form-control" value="">Danh mục</option>
                <?php
                foreach ($get_category as $keys => $value) {
                ?>
                    <option <?php if(old($old,'category_id')==$value['id']) echo 'selected' ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-3">
            <div class="d-flex">
                <input name="name" class="form-control border-dark" type="search" placeholder="Tìm kiếm sản phẩm" value="<?php echo old($old, 'name') ?>" style="background-color: var(--back-ground);">
                <button class="mx-2 btn btn-outline-primary" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
    </div>
</form>
<div class="row p-0">
    <?php
    foreach ($list_product as $keys => $value) {
    ?>
        <div class="col-2 py-3">
            <div class=" hover-col bg-body rounded shadow" style="height: 280px; ">
                <div class="rounded" style="width: 100%;overflow: hidden;">
                    <img class="image-hover" style="width: 100%;" src="<?php echo __WEB_ROOT . '/public/assets/image/' . $value['image'] . ''  ?>" alt="">
                </div>
                <div class="px-2 text-primary ">
                    <?php echo number_format($value['price'], 0, '', '.') . ' VNĐ' ?>
                </div>
                <a href="<?php echo __WEB_ROOT.'client/product/details/'.$value['id'].'' ?>">
                    <div class="px-2 content-product">
                        <?php echo $value['name'] ?>
                    </div>
                </a>
            </div>
        </div>
    <?php
    }
    ?>
</div>