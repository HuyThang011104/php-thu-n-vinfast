<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="<?php echo __WEB_ROOT ?>public/assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo __WEB_ROOT ?>public/assets/admin/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        body {
            background-color: #e5e5e5;
        }
    </style>
</head>

<body>
    <?php
    $this->view('admin/block/header');
    ?>
    <main style="padding-top: 100px;">
        <div class="container main">
            <div class="row" data-select2-id="4">
                <div class="col-12 col-lg-3" style="width: 20%;">
                    <?php
                    
                    $this->view('admin/block/navbar');
                    ?>
                </div>
                <div class="col-lg-9 px-3" style="width: 80%;">
                    <div class="row rounded d-flex justify-content-center" style="background: #fff;">
                        <?php
                        $this->view($content, $sub_content);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    $this->view('admin/block/footer');
    ?>
    <script src="<?php echo __WEB_ROOT; ?>public/assets/admin/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>